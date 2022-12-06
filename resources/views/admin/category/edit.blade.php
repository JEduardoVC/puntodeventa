@extends("layouts.admin")
@section("title","Editar categorias")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edicion de categorias</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("categories.index")}}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edicion de categorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Edicion de categorias</h4>
                    </div>
                    {!! Form::model($category,["route"=>["categories.update",$category], "method"=>"PUT"]) !!}
                        <div class="form-group">
                            <label for="name">Nombre </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{$category->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion </label>
                            <textarea name="description" id="description" class="form-control" placeholder="Descripcion" rows="3">{{$category->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route("categories.index")}}" class="btn btn-light">Cancelar</a>
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
