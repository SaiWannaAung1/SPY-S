<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\PaymentDetails;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{

    public function index()
    {
            return view("client.shoppingCart");
    }

    public function cart(Request $request){
//        $post = $request->all();
        $items = $request->get('cart');
        $carts = [];
        foreach ($items as $item){
//            $product = Product::where("id",$item)->first();
            $product = DB::table('products')->where('id',$item)->first();
            $product->qty =1;
            array_push($carts,$product);
        }

        echo json_encode($carts);

    }


    public function payout(Request $request)
    {
        date_default_timezone_set("Asia/Yangon");
        $items = $request->all();
        $c_date =  date("Y-m-d");
        $order_number = uniqid();
        $total = 0;
        $month = date('F');
        $customer_id=1;
        if (Auth::check())
        {
            $customer_id =   Auth::user()->id;
        }

        foreach ($items as $item){
            $total += $item->quality * $item->price;
            PaymentDetails::create([
                'customer_id' => $customer_id,
                'supplier_id' => $item->supplier_id,
                'supplier_id' => $item->supplier_id,
                'qty' => $item->quality,
                'product_name' => $item->name,
                'unit_price' => $item->price,
                'total_price' => $total,
                'Month' => $month,
                'Month' => $month

            ]);
        }
        Payments::create([
            'customer_id' => $customer_id,
            'order_no' => $order_number,
            'date' => $c_date
        ]);



    }

}
