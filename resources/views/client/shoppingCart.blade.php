@extends('layout.client')
@section('title','SPY\'S | Home Page')

@section('content')

    @include('layout.message')
    <!--================Cart Area =================-->
   <div class="container" style="margin-top: 50px;">
       <section class="cart_area">
           <div class="container">
               <div class="cart_inner">
                   <div class="table-responsive">
                       <table class="table">
                           <thead>
                           <tr>
                               <th scope="col">Product</th>
                               <th scope="col">Name</th>
                               <th scope="col">Quantity</th>
                               <th scope="col">Total</th>
{{--                               <th scope="col">Delete</th>--}}
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td>
                                   <div class="media">
                                       <div class="d-flex">
                                           <img src="{{asset('client/img/product/single-product/cart-1.jpg')}}" alt="">
                                       </div>
                                       <div class="media-body">
                                           <p>Minimalistic shop for multipurpose use</p>
                                       </div>
                                   </div>
                               </td>
                               <td>
                                   <h5>$360.00</h5>
                               </td>
                               <td>
                                   <div class="product_count">
                                       <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                       <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                               class="increase items-count" type="button">
                                           <i class="lnr lnr-chevron-up"></i>
                                       </button>
                                       <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                               class="reduced items-count" type="button">
                                           <i class="lnr lnr-chevron-down"></i>
                                       </button>
                                   </div>
                               </td>
                               <td>
                                   <h5>$720.00</h5>
                               </td>
                           </tr>

                           <tr class="bottom_button">
                               <td>
                                   <a class="warncan_btn" href="#">Clear Cart</a>
                               </td>
                               <td>

                               </td>
                               <td>

                               </td>
                               <td>
                                   <a class="main_btn" href="#">Apply</a>
                               </td>
                           </tr>


                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </section>
   </div>
    <!--================End Cart Area =================-->




@endsection

@section('script')
<script>
    function loadProduct() {
        $.ajax({
            type:"post",
            url: "/shoppingCart",
            data :{
                "cart": getCartItem(),
                "token": $("#token").val()
            },
            success:function (results) {
                saveProducts(results);
                console.log(results);
            },
            error:function (response) {
                console.log(response);
            }
        });
    }


    loadProduct();
</script>
@endsection
