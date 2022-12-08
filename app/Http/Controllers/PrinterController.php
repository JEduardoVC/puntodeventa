<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Http\Requests\Printer\UpdateRequest;
use Illuminate\Http\Request;

class PrinterController extends Controller
{
        public function index() {
        $printers = Printer::where("id",1)->firstOrFail();
        return view("admin.printer.index", compact("printers"));
    }
    public function update(UpdateRequest $request, Printer $printer) {
        $printer->update($request->all());
        return redirect()->route("printers.index");
    }
}
