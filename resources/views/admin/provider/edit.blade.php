@extends("layouts.admin")
@section("title","Actualizar Proveedor")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Actualizar de Proveedores</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("providers.index")}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Actualizar de Proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Actualizar de Proveedores</h4>
                    </div>
                    {!! Form::model($provider, ["route"=>["providers.update", $provider], "method"=>"PUT"]) !!}
                        <div class="form-group">
                            <label for="name">Nombre: </label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required value="{{$provider->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" required placeholder="ejemplo@gmail.com" value="{{$provider->email}}">
                        </div>
                        <div class="form-group">
                            <label for="ruc_name">Número de RUC: </label>
                            <input type="number" class="form-control" name="ruc_name" id="ruc_name" aria-describedby="helpId" required value="{{$provider->ruc_name}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección: </label>
                            <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId" required value="{{$provider->address}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">teléfono: </label>
                            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" required value="{{$provider->phone}}">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route("providers.index")}}" class="btn btn-light">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/data-table.js") !!}
@endsection
