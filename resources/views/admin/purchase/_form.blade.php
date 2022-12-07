<div class="form-group">
    <label for="product_id">Producto</label>
    <select class="form-control" name="product_id" id="product_id">
        @foreach ($products as $product)
        <option value="{{$product->id}}">{{$product->name}}</option>
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
<div class="form-group">
    <label for="tax">Impuesto </label>
    <input type="number" name="tax" id="tax" class="form-control" placeholder="Impuesto al %18">
</div>

<div class="form-group">
    <label for="quantity">Cantidad </label>
    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Cantidad">
</div>
<div class="form-group">
    <label for="price">Precio de compra</label>
    <input type="number" name="price" id="price" class="form-control" placeholder="Precio">
</div>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>
<div class="form-group">
    <h4>Detalles de compras</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(MXM)</th>
                    <th>Cantidad</th>
                    <th>Subtotal(MXM)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">Total: </p>
                    </th>
                    <th colspan="4">
                        <p align="right"><span id="total">MXM 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">Total del impuesto (18%): </p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">MXM 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">Total a pagar: </p>
                    </th>
                    <th colspan="4">
                        <p align="right"><span id="total_pagar_html">MXM 0.00</span><input type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
