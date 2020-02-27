<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminReportsController extends Controller
{

    public function supplier_daily_sale()
    {

        $products = DB::table('payment_details')
            ->select('Month',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
            ->groupBy('Month')
            ->get();

        dd($products);
    }

    public function supplier_monthly_sale()
    {
        $products = DB::table('payment_details')
            ->select('Month',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
            ->groupBy('Month')
            ->get();

        dd($products);
    }

    public function supplier_yearly_sale()
    {
        $products = DB::table('payment_details')
            ->select('Month',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
            ->groupBy('Month')
            ->get();

        dd($products);
    }


}
