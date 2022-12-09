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
use App\Models\Product;
use App\Models\Provider;

class SaleController extends Controller{

    public function __construct() {
        $this->middleware("auth");
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
        echo $results;
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
    public function edit(Sale $sale) {
        $client = Client::get();
        return view("admin.Sale.show", compact("Sale"));
    }
    public function update(UpdateRequest $request, Sale $sale) {
        //$sale->update($request->all());
        //return redirect()->route("sales.index");
    }
    public function destroy(Sale $sale) {
        //$sale->delete();
        //return redirect()->route("sales.index");
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
    public function pdf(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
    }
}
