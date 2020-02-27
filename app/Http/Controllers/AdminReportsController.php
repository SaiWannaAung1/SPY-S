<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminReportsController extends Controller
{

    public function supplier_daily_sale()
    {
        $id =1;
        $datas = DB::table('payment_details')
            ->select('date',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
            ->groupBy('date')
            ->get();

        return view('admin.daily_supplier_sales',compact('datas','id'));
    }

    public function supplier_monthly_sale()
    {
        $id =1;
        $datas = DB::table('payment_details')
            ->select('Month','Year',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
            ->groupBy('Month','Year')
            ->get();

        return view('admin.monthly_supplier_sales',compact('datas','id'));
    }

    public function supplier_yearly_sale()
    {
        $id =1;
        $datas = DB::table('payment_details')
            ->select('Year',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
            ->groupBy('Year')
            ->get();

        return view('admin.yearly_supplier_sales',compact('datas','id'));
    }


}
