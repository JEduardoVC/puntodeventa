@extends("layouts.admin")
@section("title","Información de proveedor")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Basic Tables</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route("providers.index")}}">Proveedores</a></li>
                <li class="breadcrumb-item" aria-current="page">{{$provider->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$provider->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">Sobre Proveedor</button>
                                    <button type="button" class="list-group-item list-group-item-action">Productos</button>
                                    <button type="button" class="list-group-item list-group-item-action">Registrar Producto</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <h4>Información de Proveedor</h4>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i>Nombre</strong>
                                        <p class="text-muted">{{$provider->name}}</p><hr>
                                        <strong><i class="fas fa-address-card mr-1"></i>Numero de Documento</strong>
                                        <p class="text-muted">{{$provider->ruc_name}}</p><hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-mobile-alt mr-1"></i>Teléfono</strong>
                                        <p class="text-muted">{{$provider->phone}}</p><hr>
                                        <strong><i class="fas fa-envelope mr-1"></i>Email</strong>
                                        <p class="text-muted">{{$provider->email}}</p><hr>
                                        <strong><i class="fas fa-map-marked-alt mr-1"></i>Dirección</strong>
                                        <p class="text-muted">{{$provider->address}}</p><hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route("providers.index")}}" class="btn btn-primary float-right">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/data-table.js") !!}
@endsection
