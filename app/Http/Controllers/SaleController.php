<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Models\Client;

class SaleController extends Controller{
    public function index() {
        $sales = Sale::get();
        return view("admin.Sale.index", compact("sales"));
    }
    public function create() {
        $clients = Client::get();
        return view("admin.Sale.create", compact("clients"));
    }
    public function store(StoreRequest $request) {
        $sale = Sale::create($request->all());
        foreach($request->product_id as $key => $product){
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key],"price"=>$request->price[$key],"discount"=>$request->discount[$key]);
        }
        $sale->saleDetails()->createMany($results);
        return redirect()->route("sales.index");
    }
    public function show(Sale $sale) {
        return view("admin.Sale.show", compact("Sale"));
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
}
