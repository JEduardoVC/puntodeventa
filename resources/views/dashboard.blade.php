@extends("layouts.admin")
@section("title","Panel Administrador")
@section("styles")
<style type="text/css">
    .unstyled-button{
        border: none;
        padding: 0;
        background-color: none
    }
</style>
@endsection
@section("options")
@endsection
@section("preference")
@endsection
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Panel Administrador</h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @foreach ($totales as $total)
                        <div class="row">
                            <div class="col-lg-6 col-xs-6">
                                <div class="card text-white bg-success">
                                    <div class="card-body pb-0">
                                        <div class="float-right">
                                            <i class="fas fa-cart-arrow-down fa-4x"></i>
                                        </div>
                                        <div class="text-value h4">
                                            <strong>${{$total->totalcompra}} (MES ACTUAL)</strong>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper mt-3 mx-3" style="height: 35px">
                                        <a href="{{route("purchases.index")}}" class="small-box-footer h4">Compras<i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-6">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <div class="float-right">
                                            <i class="fas fa-shopping-cart fa-4x"></i>
                                        </div>
                                        <div class="text-value h4">
                                            <strong>${{$total->totalventa}} (MES ACTUAL)</strong>
                                        </div>
                                    </div>
                                    <div class="chart-wrapper mt-3 mx-3" style="height: 35px">
                                        <a href="{{route("sales.index")}}" class="small-box-footer h4">Ventas<i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center">Compras - Mes</h4>
                                </div>
                                <div class="card-contents">
                                    <div class="ct-chart">
                                        <canvas id="compras"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center">Ventas - Mes</h4>
                                </div>
                                <div class="card-contents">
                                    <div class="ct-chart">
                                        <canvas id="ventas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center">Ventas Diarias</h4>
                                </div>
                                <div class="card-contents">
                                    <div class="ct-chart">
                                        <canvas id="ventas_diarias"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
{!! Html::script("melody/js/data-table.js") !!}
{!! Html::script("melody/js/chart.js") !!}
<script>
    $(function() {
        var varCompra = document.getElementById('compras').getContext("2d");
        var charCompra = new Chart(varCompra, {
            type: "line",
            data: {
                labels: [
                    <?php foreach ($comprasMes as $reg) {
                        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido = strftime('%B', strtotime($reg->mes));
                        echo '"' . $mes_traducido . '",';
                    }?>],
                    datasets:[{
                        label: 'Compras',
                        data: [
                            <?php foreach($comprasMes as $reg) {
                                echo '' . $reg->totalmes.',';
                            }?>],
                        borderColor: 'rgba(255, 99, 132,1)',
                        borderwidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        })

        var varVentas = document.getElementById('ventas').getContext("2d");
        var charCompra = new Chart(varVentas, {
            type: "line",
            data: {
                labels: [
                    <?php foreach ($ventasMes as $reg) {
                        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                        $mes_traducido = strftime('%B', strtotime($reg->mes));
                        echo '"' . $mes_traducido . '",';
                    }?>],
                    datasets:[{
                        label: 'Ventas',
                        data: [
                            <?php foreach($ventasMes as $reg) {
                                echo '' . $reg->totalmes.',';
                            }?>],
                        borderColor: 'rgba(20, 204, 20, 1)',
                        borderwidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        })

        var varVentasDiarias = document.getElementById('ventas_diarias').getContext("2d");
        var charCompra = new Chart(varVentasDiarias, {
            type: "bar",
            data: {
                labels: [
                    <?php foreach ($ventasDia as $reg) {
                        echo '"' . $reg->dia . '",';
                    }?>],
                    datasets:[{
                        label: 'Ventas',
                        data: [
                            <?php foreach($ventasDia as $reg) {
                                echo '' . $reg->totaldia.',';
                            }?>],
                        backgroundColor: 'rgba(83, 18, 196, 0.5)',
                        borderColor: 'rgba(83, 18, 196, 1)',
                        borderWidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        })
    })
</script>
@endsection