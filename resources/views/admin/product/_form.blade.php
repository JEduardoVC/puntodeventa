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
<div class="row">
    <div class="card-body">
        <h6 class="card-title d-flex">Imagen del producto</h6>
        <input type="file" name="picture" id="picture" class="dropify">
    </div>
</div>
