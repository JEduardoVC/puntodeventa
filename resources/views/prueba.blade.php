<div class="form-group row">
    <div class="fol-md-6 text-center">
        <label class="form-control-label" for="ombre">Proveedor</label>
        <p>{{$purchase->provider->name}}</p>
    </div>
    <div class="fol-md-6 text-center">
        <label class="form-control-label" for="ombre">Numero de compra</label>
        <p>{{$purchase->id}}</p>
    </div>
</div>
<br /><br />
<div class="form-group row">
    <h4 class="card-title ml-3">Detalle de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio(MXM)</th>
                    <th>Cantidad</th>
                    <th>Subtotal(MXM)</th>
                </tr>
            </thead>
            <tfoot>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">Total del impuesto ({{$purchase->tax}}%): </p>
                    </th>
                    <th>
                        <p align="right">{{number_format($subtotal*$purchase->tax/100,2)}}</p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">Total a pagar: </p>
                    </th>
                    <th colspan="4">
                        <p align="right">{{number_format($purchase->total,2)}}</p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($purchaseDetails as $purchaseDetail)
                    <tr>
                        <td>{{$purchaseDetail->product->name}}</td>
                        <td>{{$purchaseDetail->price}}</td>
                        <td>{{$purchaseDetail->quantity}}</td>
                        <td>{{number_format($purchaseDetail->quantity*$purchaseDetail->price,2)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
