@extends("layouts.admin")
@section("title","Actualizar Cliente")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Actualizar Cliente</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("clients.index")}}">Cliente</a></li>
                <li class="breadcrumb-item active" aria-current="page">Actualizar Cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Actualizar Cliente</h4>
                    </div>
                    {!! Form::model($client, ["route"=>["clients.update", $client], "method"=>"PUT"]) !!}
                        <div class="form-group">
                            <label for="name">Nombre: </label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required value="{{$client->name}}">
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI: </label>
                            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" required value="{{$client->dni}}">
                        </div>
                        <div class="form-group">
                            <label for="ruc">Número de RUC: </label>
                            <input type="number" class="form-control" name="ruc" id="ruc" aria-describedby="helpId" value="{{$client->ruc}}">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección: </label>
                            <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId" value="{{$client->address}}">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono: </label>
                            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" required value="{{$client->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="ejemplo@gmail.com" value="{{$client->email}}">
                            <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route("clients.index")}}" class="btn btn-light">Cancelar</a>
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
