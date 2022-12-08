@extends("layouts.admin")
@section("title","Detalles de compra")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Detalles de compra {{$purchase->id}}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="/products">Compra</a></li>
                <li class="breadcrumb-item" aria-current="page">Detalles de compra {{$purchase->id}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6 text-center">
                            <label class="form-control-label" for="ombre">Proveedor</label>
                            <p>{{$purchase->provider->name}}</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <label class="form-control-label" for="ombre">Numero de compra</label>
                            <p>{{$purchase->id}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group row">
                        <h4 class="card-title ml-3">Detalle de compra</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio(MXM)</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal(MXM)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">Subtotal: </p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($subtotal,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">Total del impuesto ({{$purchase->tax}}%): </p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($subtotal*$purchase->tax/100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">Total a pagar: </p>
                                        </th>
                                        <th colspan="4">
                                            <p align="right">{{number_format($purchase->total,2)}}</p>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($purchaseDetails as $purchaseDetail)
                                        <tr>
                                            <td>{{$purchaseDetail->product->name}}</td>
                                            <td>{{$purchaseDetail->price}}</td>
                                            <td>{{$purchaseDetail->quantity}}</td>
                                            <td>{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <a href="{{route("purchases.index")}}" class="btn btn-primary float-right">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/data-table.js") !!}
@endsection
