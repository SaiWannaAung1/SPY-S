<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{

    public function daily_sale()
    {
        $id =1;
        $supplier_id=0;
        if (Auth::check()){
            $supplier_id = Auth::user()->id;
        }
        $datas = DB::table('payment_details')
                    ->select('date',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
                    ->where('supplier_id',$supplier_id)
                    ->groupBy('date')
                    ->get();

        return view('supplier.daily_sales',compact('datas','id'));

    }
    public function monthly_sale()
    {
        $id =1;
        $supplier_id=0;
        if (Auth::check()){
            $supplier_id = Auth::user()->id;
        }
        $datas = DB::table('payment_details')
                    ->select('Month','Year',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
                    ->where('supplier_id',$supplier_id)
                    ->groupBy('Month','Year')
                    ->get();
        return view('supplier.monthly_sales',compact('datas','id'));

    }

    public function yearly_sale()
    {
        $id =1;
        $supplier_id=0;
        if (Auth::check()){
            $supplier_id = Auth::user()->id;
        }
        $datas = DB::table('payment_details')
                    ->select('Year',DB::raw('SUM(qty) as quantity'),DB::raw('SUM(total_price) as total_price') )
                    ->where('supplier_id',$supplier_id)
                    ->groupBy('Year')
                    ->get();

        return view('supplier.yearly_sales',compact('datas','id'));

    }

    public function view_monthly_sale_chart(){


    }

      public function view_yearly_sale_chart(){

    }




}
