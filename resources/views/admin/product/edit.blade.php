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
        <h3 class="page-title">Edicion de productos</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("products.index")}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edicion de productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Edicion de productos</h4>
                    </div>
                    {!! Form::model($product, ["route"=>["products.update",$product], "method"=>"PUT", 'files' => true]) !!}
                        <div class="form-group">
                            <label for="name">Nombre </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{$product->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="sell_price">Precio de venta </label>
                            <input type="number" name="sell_price" id="sell_price" class="form-control" placeholder="Precio de venta" value="{{$product->sell_price}}" required>
                        </div>
                        <div class="form-group">
                                <label for="category_id">Categoria</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if ($category->id == $product->category_id)
                                            selected
                                        @endif> {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="provider_id">Provedor</label>
                                <select class="form-control" name="provider_id" id="provider_id">
                                    @foreach ($providers as $provider)
                                        <option value="{{$provider->id}}" @if ($provider->id == $product->provider_id)
                                            selected
                                        @endif>{{$provider->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="card-body">
                                    <h6 class="card-title d-flex">Imagen del producto</h6>
                                    <input type="file" name="picture" id="picture" class="dropify">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{route("products.index")}}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/dropify.js") !!}
@endsection
