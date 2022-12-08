@extends("layouts.admin")
@section("title","Detalles de Ventas")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Detalles de Venta {{$sale->id}}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("sales.index")}}">Ventas</a></li>
                <li class="breadcrumb-item" aria-current="page">Detalles de Venta {{$sale->id}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6 text-center">
                            <label class="form-control-label" for="ombre">Cliente</label>
                            <p>{{$sale->client->name}}</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <label class="form-control-label" for="ombre">Vendedor</label>
                            <p>{{$sale->user->name}}</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <label class="form-control-label" for="ombre">Numero de Venta</label>
                            <p>{{$sale->id}}</p>
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
                                        <th>Descuento(%)</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal(MXM)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">Total del impuesto ({{$sale->tax}}%): </p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($subtotal * $sale->tax / 100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">Total a pagar: </p>
                                        </th>
                                        <th colspan="4">
                                            <p align="right">{{number_format($sale->total,2)}}</p>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($saleDetails as $saleDetail)
                                        <tr>
                                            <td>{{$saleDetail->product->name}}</td>
                                            <td>{{$saleDetail->price}}</td>
                                            <td>{{$saleDetail->discount}}</td>
                                            <td>{{$saleDetail->quantity}}</td>
                                            <td>{{number_format($saleDetail->quantity*$saleDetail->price,2)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route("sales.index")}}" class="btn btn-primary float-right">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/data-table.js") !!}
@endsection
