@extends("layouts.admin")
@section("title","Registrar categorias")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Registro de productos</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("products.index")}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Registro de productos</h4>
                    </div>
                    {!! Form::open(["route"=>"products.store", "method"=>"POST", 'files' => true]) !!}
                    <div class="form-group">
                        <label for="name">Nombre </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="sell_price">Precio de venta </label>
                        <input type="number" name="sell_price" id="sell_price" class="form-control" placeholder="Precio de venta" required>
                    </div>
                    <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provider_id">Provedor</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-file mb-4">
                            <input type="file" name="image" id="image" class="custom-file-input">
                            <label class="custom-file-label" for="image">Seleccionar archivos</label>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route("products.index")}}" class="btn btn-light">Cancelar</a>
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
