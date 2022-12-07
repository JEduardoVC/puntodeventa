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
            '<td><input type="hidden" name="price[]" value="' + price + '">' + producto + '</td> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled></td>' +
            '<td><input type="hidden" name="quantity[]" value="' + quantity + '">' + quantity + '</td> <input class="form-control" type="number" id="quantity[]" value="' + quantity + '" disabled></td>' +
            '<td align="right">s/' + subtotal[cont] + '</td>' +
        '</tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $("#detalles").append(fila);
    } else {
        Swal.fire({
            type: "error",
            text: "Rellene todos los campos del detalle de la compra"
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
