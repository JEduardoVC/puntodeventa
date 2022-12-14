@extends("layouts.admin")
@section("title","Gestion de Ventas")
@section("styles")
<style type="text/css">
    .unstyled-button{
        border: none;
        padding: 0;
        background-color: none
    }
</style>
@endsection
@section("create")
<li class="nav-item-d-none d-lg-flex">
    <a class="nav-link" href="{{route("sales.create")}}">
        <span class="btn btn-primary">+ Crear nuevo</span>
    </a>
</li>
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Ventas</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item" aria-current="page">Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Ventas</h4>
                        {{-- <div class="btn-group">
                            <h4 class="card-title">
                                <a href="#">
                                    <i class="fas fa-download"></i>
                                    Exportar
                                </a>
                            </h4>
                        </div> --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route("sales.create")}}" class="dropdown-item">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Fecha de venta</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                <tr>
                                    <td>{{$sale->sale_date}}</td>
                                    <td>{{$sale->total}}</td>
                                    @if($sale->status == "VALID")
                                        <td>
                                            <a class="jsgrid-button btn btn-success" href="{{route("change.status.sales", $sale)}}">{{$sale->status}} <i class="fas fa-check"></i></a>
                                        </td>
                                    @else
                                        <td>
                                            <a class="jsgrid-button btn btn-danger" href="{{route("change.status.sales", $sale)}}">{{$sale->status}} <i class="fas fa-times"></i></a>
                                        </td>
                                    @endif
                                    <td style="width: 50px">
                                        <a href="{{route("sales.pdf", $sale)}}" class="jsgrid-button js-grid-delete-button unstyled-button" title="Generar PDF"><i class="far fa-file-pdf"></i></a>
                                        <a class="jsgrid-button js-grid-delete-button unstyled-button" title="Imprimir"><i class="fas fa-print"></i></a>
                                        <a href="{{route("sales.show",$sale)}}" class="jsgrid-button js-grid-delete-button unstyled-button" title="Ver detalles"><i class="far fa-eye"></i></a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/data-table.js") !!}
@endsection
