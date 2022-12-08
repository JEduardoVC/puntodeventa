@extends("layouts.admin")
@section("title","Editar roles")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edicion de roles</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("roles.index")}}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edicion de roles</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Edicion de roles</h4>
                    </div>
                    {!! Form::model($role,["route"=>["roles.update",$role], "method"=>"PUT"]) !!}
                        <div class="form-group">
                            <label for="name">Nombre </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required value="{{$role->name}}">
                        </div>
                        <div class="form-group">
                            <label for="guard_name">Nombre a guardar </label>
                            <input type="text" name="guard_name" id="guard_name" class="form-control" placeholder="Nombre a guardar" required value="{{$role->guard_name}}">
                        </div>

                        <h3>Permisos especiales</h3>
                        <div class="form-group">
                            <label>{!! Form::radio("special","all-access") !!}Acceso total</label>
                            <label>{!! Form::radio("special","no-access") !!}Sin acceso</label>
                        </div>

                        <h3>Listado de permisos</h3>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                @foreach ($permissions as $permission)
                                <li>
                                    <label>
                                        {!! Form::checkbox("permissions[]",$permission->id, null) !!}
                                        {{$permission->description}}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route("roles.index")}}" class="btn btn-light">Cancelar</a>
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
