@extends("layouts.admin")
@section("title","Editar users")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edicion de users</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("users.index")}}">users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edicion de users</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Edicion de users</h4>
                    </div>
                    {!! Form::model($user,["route"=>["users.update",$user], "method"=>"PUT"]) !!}
                        <div class="form-group">
                            <label for="name">Nombre </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="passwprd">Contraseña </label>
                            <input type="password" name="passwprd" id="passwprd" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <h3>Listado de roles</h3>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($roles as $role)
                                <li>
                                    <label>
                                        {!! Form::checkbox("roles[]",$role->id, null) !!}
                                        {{$role->name}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route("users.index")}}" class="btn btn-light">Cancelar</a>
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
