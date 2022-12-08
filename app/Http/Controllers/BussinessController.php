<?php

namespace App\Http\Controllers;

use App\Models\Bussiness;
use Illuminate\Http\Request;
use App\Http\Requests\Bussiness\UpdateRequest;

class BussinessController extends Controller
{
    public function __construct(){
        $this->middleware("auth");

        $this->middleware("can:bussinesses.index")->only(["index"]);
        $this->middleware("can:bussinesses.edit")->only(["update"]);

    }

    public function index() {
        $bussinesses = Bussiness::where("id",1)->firstOrFail();
        return view("admin.bussiness.index", compact("bussinesses"));
    }
    public function update(UpdateRequest $request, Bussiness $bussiness) {
        $bussiness->update($request->all());
        return redirect()->route("bussinesses.index");
    }
}
