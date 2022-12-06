@extends("layouts.admin")
@section("title","Gestion de categorias")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Categorias</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item" aria-current="page">Categorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Categorias</h4>
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>
                                        <a href="{{route("categories.show",$category)}}">{{$category->name}}</a></td>
                                        <td>{{$category->description}}</td>
                                        <td style="width: 50px">
                                            {!! Form::open(["route"=>["categories.destroy",$category],"method"=>"DELETE"]) !!}
                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route("categories.edit",$category)}}" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a class="jsgrid-button js-grid-delete-button" href="{{route("categories.destroy",$category)}}" title="Eliminar">
                                                <i class="far fa-trahs-alt"></i>
                                            </a>
                                            {!! Form::close() !!}
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
