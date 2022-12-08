<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Printer;
use App\Models\Product;
use App\Models\Provider;

class SaleController extends Controller{
    public function __construct(){
        $this->middleware("auth");

        $this->middleware("can:sales.create")->only(["create","store"]);
        $this->middleware("can:sales.index")->only(["index"]);
        $this->middleware("can:sales.edit")->only(["edit","update"]);
        $this->middleware("can:sales.show")->only(["show"]);
        $this->middleware("can:sales.destroy")->only(["destroy"]);
        $this->middleware("can:sales.pdf")->only(["pdf"]);
        $this->middleware("can:change.status.sales")->only(["change_status"]);
        $this->middleware("can:sales.print")->only(["print"]);

    }
    public function index() {
        $sales = Sale::get();
        return view("admin.Sale.index", compact("sales"));
    }
    public function create() {
        $products = Product::get();
        $providers = Provider::get();
        $clients = Client::get();
        return view("admin.Sale.create", compact("clients", "products", "providers"));
    }
    public function store(StoreRequest $request) {
        $sale = Sale::create($request->all() + [
            "user_id"=>Auth::user()->id,
            "sale_date"=>Carbon::now("America/Mexico_City")
        ]);
        foreach($request->product_id as $key => $product){
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key],"price"=>$request->price[$key],"discount"=>$request->discount[$key]);
        }
        $sale->saleDetails()->createMany($results);
        return redirect()->route("sales.index");
    }
    public function show(Sale $sale) {
        $saleDetails = $sale->saleDetails;
        $subtotal = 0;
        foreach($saleDetails as $saleDet){
            $subtotal += $saleDet->quantity * $saleDet->price - $saleDet->quantity * $saleDet->price * $saleDet->discount / 100;
        }
        return view("admin.Sale.show", compact("sale", "saleDetails", "subtotal"));
    }
    public function change_status(Sale $sale) {
        if($sale->status == "VALID"){
            $sale->update(["status"=>"CANCELED"]);
            return redirect()->back();

        } else {
            $sale->update(["status"=>"VALID"]);
            return redirect()->back();
        }
    }
    public function pdf(Sale $sale){
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
    }
    public function print(Sale $sale){
        try{
            /*$subtotal = 0 ;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
            }
            $print_name = "TM20"; // Impresora
            $connector = new WindowsPrintConnector($print_name);
            $printer = new Printer($connector);

            $printer->text("$80.00");
            $printer->cut();
            $printer->close();

            return redirect()->back();*/
        } catch(\Throwable $th){
            return redirect()->back();
        }
    }
}
