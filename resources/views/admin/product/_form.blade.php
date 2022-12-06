<div class="form-group">
    <label for="name">Nombre </label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
</div>
<div class="form-group">
    <label for="precio">Precio de venta </label>
    <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio de venta" required>
</div>
<div class="form-group">
    <label for="category_id">Categoria </label>
    <select class="form-control" name="category_id" id="category_id">
        @foreach ($categories as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="provider_id">Provedor </label>
    <select class="form-control" name="provider_id" id="provider_id">
        @foreach ($providers as $provider)
        <option value="{{$provider->id}}">{{$provider->name}}</option>
        @endforeach
    </select>
</div>
<div class="custom-file mb-4">
    <input type="file" name="imagen" id="imagen" class="custom-file-input">
    <label class="custom-file-label" for="imagen">Seleccionar archivos</label>
</div>
