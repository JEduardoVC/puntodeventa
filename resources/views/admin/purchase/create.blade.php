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
        <h3 class="page-title">Registro de compras</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route("purchases.index")}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(["route"=>"purchases.store", "method"=>"POST"]) !!}
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Registro de compras</h4>
                    </div>
                        @include("admin.purchase._form")
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary mr-2 float-right" id="guardar">Registrar</button>
                        <a href="{{route("purchases.index")}}" class="btn btn-light">Cancelar</a>
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
function agregar(){
    product_id = $("#product_id").val();
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    price = $("#price").val();
    impuesto = $("#tax").val();
    if(product_id != "" && quantity != "" && quantity > 0 && price != ""){
        subtotal[cont] = quantity*price;
        total = total + subtotal[cont];
        var fila =
            '<tr class="selected" id="fila' + cont + '">' +
                '<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ')"><i class="fa fa-times"></i></button></td>' +
                '<td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td>' +
                '<td><input type="hidden" name="price[]" value="' + price + '">$' + price + '</td> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled></td>' +
                '<td><input type="hidden" name="quantity[]" value="' + quantity + '">' + quantity + '</td> <input class="form-control" type="number" id="quantity[]" value="' + quantity + '" disabled></td>' +
                '<td align="right"> $' + subtotal[cont] + '</td>' +
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
            text: 'Rellene todos los campos del detalle de la compra',
        })
    }
}
function limpiar(){
    $("#quantity").val("");
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

