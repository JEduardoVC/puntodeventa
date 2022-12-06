<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller {
    public function index() {
        $products = Product::get();
        return view("admin.product.index", compact("products"));
    }
    public function create() {
        $categories = Category::get();
        $providers = Provider::get();
        return view("admin.product.create", compact("categories", "providers"));
    }
    public function store(StoreRequest $request) {
        if($request->hasFile("image")){
            $file = $request->file("image");
            $image_name = time()."_".$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        $product = Product::create($request->all()+[
            "image"=>$image_name
        ]);
        $product->update(["code"=>$product->id."_".$product->name]);
        return redirect()->route("products.index");
    }
    public function show(Product $product) {
        return view("admin.product.show", compact("product"));
    }
    public function edit(Product $product) {
        $categories = Category::get();
        $providers = Provider::get();
        return view("admin.product.edit", compact("product","categories", "providers"));
    }
    public function update(UpdateRequest $request, Product $product) {
        $product->update($request->all());
        return redirect()->route("products.index");
    }
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route("products.index");
    }
}
