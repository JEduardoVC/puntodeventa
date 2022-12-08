<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $comprasMes=DB::select("SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status='VALID' group by monthname(c.purchase_date) order by monthname(c.purchase_date) desc limit 12;");

        $ventasMes=DB::select("SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes, month(v.sale_date) as mes_numero, year(v.sale_date) from sales v where v.status='VALID' group by monthname(v.sale_date),month(v.sale_date), year(v.sale_date) order by year(v.sale_date), month(v.sale_date) asc limit 12");

        $ventasDia=DB::select("SELECT DATE_FORMAT(v.sale_date,'%d/%m/%Y') as dia, sum(v.total) as totaldia from sales v where v.status='VALID' group by DATE_FORMAT(v.sale_date,'%d/%m/%Y') desc limit 12");

        $totales=DB::select("SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date) and c.status='VALID') as totalcompra,(select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date) and v.status='VALID') as totalventa;");

        $productosVendidos = DB::select("SELECT p.code as code, sum(sd.quantity), p.name as name, p.id as id, p.stock as stock from products p inner join sale_details sd ON p.id = sd.id inner join sales s on sd.sale_id = s.id where s.status = 'VALID' and year(s.sale_date) = year(curdate()) group by p.code, p.name, p.id, p.stock order by sum(sd.quantity) desc limit 10;");

        return view('dashboard', compact("totales", "comprasMes", "ventasMes", "ventasDia", "productosVendidos"));
    }
}
