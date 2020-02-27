<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use App\PaymentDetails;
use App\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Customer;

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

    public function saveItemsToDatabase(){
        session_start();
        date_default_timezone_set("Asia/Yangon");
        $items =  \App\Http\Controllers\Session::get('items');


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


            $total += $item ['qty'] * $item ['price'];

                PaymentDetails::create([
                    'customer_id' => $customer_id,
                    'supplier_id' => $item ['supplier_id'],
                    'qty' => $item ['qty'],
                    'product_name' => $item ['name'],
                    'unit_price' => $item ['price'],
                    'total_price' => $total,
                    'payment_id' => 1,
                    'Month' => $month,
                    'Year' => $month,
                    'order_no' => $order_number
                ]);


        }
        Payments::create([
            'customer_id' => $customer_id,
            'order_no' => $order_number,
            'date' => $c_date
        ]);

    }

    public function payout(Request $request)
    {
        session_start();
        $post = $request->get('items');
        \App\Http\Controllers\Session::replace("items",$post);
//        session_start();
//        $_SESSION["items"] = $items;

    }

    public function stripePayment(Request $request){
        $post =$request->all();

        $index =  new ShoppingCartController();
        $index->saveItemsToDatabase();
        $con = true;
        if ($con) {
            \App\Http\Controllers\Session::remove('items');
            echo "<script>

alert('Payment Successfully')
</script>";

            header("Refresh:0; url=/");
        }else{
            echo "<script>alert('Payment Not Successfully')</script>";
            header("Refresh:0; url=/");
        }

    }


}
