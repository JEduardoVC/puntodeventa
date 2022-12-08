@extends("layouts.admin")
@section("title","Registrar Ventas")
@section("styles")
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Registro de Ventas</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("sales.index")}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(["route"=>"sales.store", "method"=>"POST"]) !!}
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Registro de Ventas</h4>
                    </div>
                    <div class="form-group">
                        <label for="client_id">Proveedor</label>
                        <select class="form-control" name="client_id" id="client_id">
                            @foreach ($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_id">Producto</label>
                        <select class="form-control" name="product_id" id="product_id">
                            <option disabled selected>Seleccione un producto</option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Código de Barras: </label>
                        <input type="number" name="code" id="code" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="tax">Ganancia: </label>
                        <input type="number" name="tax" id="tax" class="form-control" placeholder="Impuesto al %18" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock Actual: </label>
                        <input type="number" name="tastockx" id="stock" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Cantidad: </label>
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Cantidad">
                    </div>
                    <div class="form-group">
                        <label for="price">Precio de venta: </label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Precio" disabled>
                    </div>
                    <div class="form-group">
                        <label for="discount">Descuento: </label>
                        <input type="number" name="discount" id="discount" class="form-control" aria-describedby="helpId" value="0">
                    </div>
                    <div class="form-group">
                        <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
                    </div>
                    <div class="form-group">
                        <h4>Detalles de venta</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Eliminar</th>
                                        <th>Producto</th>
                                        <th>Precio de Venta(MXM)</th>
                                        <th>Descuento</th>
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
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">Total del impuesto (18%): </p>
                                        </th>
                                        <th colspan="4">
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
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-2 float-right" id="guardar">Registrar</button>
                        <a href="{{route("sales.index")}}" class="btn btn-light">Cancelar</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/alerts.js") !!}
{!! Html::script("melody/js/avgrund.js") !!}
<script>
    $(document).ready(function (){
    $("#agregar").click(function (){
        agregar();
    })
})

var cont = 0;
total = 0;
subtotal = [];

$("#guardar").hide();
$("#product_id").change(mostrarValores);

function mostrarValores() {
    datos = document.getElementById("product_id").value.split("_");
    $("#price").val(datos[2]);
    $("#stock").val(datos[1]);
}

var product_id = $('#product_id')
product_id.change(function() {
    $.ajax({
        url: "{{route('get_products_by_id')}}",
        method: 'GET',
        data: {
            product_id: product_id.val(),
        },
        success: function(data) {
            $("#price").val(data.sell_price);
            $("#stock").val(data.stock);
            $("#code").val(data.code);
        }
    });
});

$(obtener_registro());
function obtener_registro(code) {
    $.ajax({
        url:"{{route('get_products_by_barcode')}}",
        type: "GET",
        data: {
            code: code
        },
        success: function(data) {
            $("#price").val(data.sell_price);
            $("#stock").val(data.stock);
        },
    })
}
$(document).on("keyup", "#code", function() {
    var valorResultado = $(this).val();
    if(valorResultado != "") obtener_registro(valorResultado);
    else obtener_registro();
})

function agregar(){
    datos = document.getElementById("product_id").value.split("_");
    product_id = datos[0];
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    discount = $("#discount").val();
    price = $("#price").val();
    impuesto = $("#tax").val();
    stock = $("#stock").val();
    if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
        if(parseInt(stock) >= parseInt(quantity)) {
            subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
            total = total + subtotal[cont];
        } else {
            subtotal[cont] = quantity*price;
            total = total + subtotal[cont];
        }
        var fila =
            '<tr class="selected" id="fila' + cont +'">' +
                '<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"> ' + '<i class="fa fa-times fa-2x"></i></button></td>' +
                '<td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td>' +
                '<td> <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled> </td> '+
                '<td> <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled> </td>' +
                '<td> <input type="hidden" name="quantity[]" value="' + quantity +'"> <input type="number" value="' + quantity +'" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) +'</td>' +
            '</tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $("#detalles").append(fila);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Rellene todos los campos del detalle de la venta',
        })
    }
}
function limpiar(){
    $("#quantity").val("");
    $("#discount").val("");
    $("#price").val("");
}
function totales(){
    $("#total").html("MXM " + total.toFixed(2));
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html("MXM " + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("MXM " + total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
}
function evaluar(){
    if(total>0){
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}
function eliminar(index){
    total=total-subtotal[index];
    total_impuesto = total * impuesto / 100;
    total_pagar_html = total + total_impuesto;
    $("#total").html("MXM " + total);
    $("#total_impuesto").html("MXM " + total_impuesto);
    $("#total_pagar_html").html("MXM " + total_pagar_html);
    $("#total_pagar").val(total_pagar_html);
    $("#fila" + index).remove();
    evaluar();
}
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

