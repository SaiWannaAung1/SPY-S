<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{

    public function daily_sale()
    {
        $supplier_id=0;
        if (Auth::check()){
            $supplier_id = Auth::user()->id;
        }
        $products = DB::table('payment_details')
                    ->select('Month',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
                    ->where('supplier_id',$supplier_id)
                    ->groupBy('Month')
                    ->get();

        dd($products);

    }
    public function monthly_sale()
    {
        $supplier_id=0;
        if (Auth::check()){
            $supplier_id = Auth::user()->id;
        }
        $products = DB::table('payment_details')
                    ->select('Month',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
                    ->where('supplier_id',$supplier_id)
                    ->groupBy('Month')
                    ->get();

        dd($products);

    }

    public function yearly_sale()
    {
        $supplier_id=0;
        if (Auth::check()){
            $supplier_id = Auth::user()->id;
        }
        $products = DB::table('payment_details')
                    ->select('Month',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
                    ->where('supplier_id',$supplier_id)
                    ->groupBy('Year')
                    ->get();

        dd($products);

    }


}
