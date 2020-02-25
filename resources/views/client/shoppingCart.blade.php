@extends('layout.client')
@section('title','SPY\'S | Home Page')

@section('content')

    @include('layout.message')
    <!--================Cart Area =================-->
   <div class="container" style="margin-top: 100px;">
       <section class="cart_area">
           <div class="container">
               <div class="cart_inner">
                   <div class="table-responsive">

                       <table class="table">
                           <thead>
                           <tr>
                               <th scope="col">Product</th>
                               <th scope="col">Name</th>
                               <th scope="col">Price</th>
                               <th scope="col">Quantity</th>
                               <th scope="col">Total</th>
                               <th scope="col">Delete</th>
                           </tr>
                           </thead>
                           <tbody id="tablebody">


                           </tbody>
                           <tfooter>
                               <tr class="bottom_button">
                                   <td colspan="5">
                                       <a class="warncan_btn" href="/shoppingCart" onclick="clearCart()">Clear Cart</a>
                                   </td>
                                   @if(\Illuminate\Support\Facades\Auth::check())
                                        <form action="/payment/stripe" method="post" style="display: none;" id="stripeForm" >
                                           <script
                                               src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                               data-key="pk_test_NyQgIgdn3LrhUFe3xN8yHFrE009lbtBzPb"
                                               data-name="Myan Shop"
                                               data-description="Need to wait a few day!"
                                               data-image="https://plibmm.online/img/core-img/logo.png"
                                               data-email="saiwannaaung@gmail.com"
                                               data-zip-code="true">
                                           </script>
                                       </form>
                                   @else
                                       <td>
                                           <a class="main_btn" href="#">Apply</a>
                                       </td>
                                   @endif
                               </tr>
                           </tfooter>
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
        console.log(getCartItem());
        $.ajax({
            type:'POST',
            url: "/shoppingCart",
            data :{

                "cart": getCartItem(),
                _token: '{!! csrf_token() !!}'
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
    function saveProducts(res) {
        localStorage.setItem("products",res);
        results = JSON.parse(localStorage.getItem("products"));
        showProducts(results)
    }
    function addProductQty(id) {
        var results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result)=>{
            if (result.id === id){
                result.qty = result.qty+1;
            }
        });
        saveProducts(JSON.stringify(results));
    }
    function deduceProductQty(id) {
        var results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result)=>{
            if (result.id === id){
                if(result.qty >1 ){
                    result.qty = result.qty-1;
                }
            }
        });
        saveProducts(JSON.stringify(results));
    }
    function showProducts(results) {


        var str = "";
        var  total =0;
        results.forEach((result)=>{

            total += result.qty * result.price;
            str += "<tr scope='row'>";
            str +=  `

      <td>
                                   <div class="media">
                                       <div class="d-flex">
                                           <img src="{{asset('uploads/')}}/${result.single_image}" >
                                       </div>
                                       <div class="media-body">
                                            <td>${result.name}</td>
                                       </div>
                                   </div>
                               </td>


       <td>${result.price}</td>

       <td>
                                   <div class="product_count">
                                       <input type="text" name="qty" id="sst" maxlength="12" value="${result.qty}" title="Quantity:" class="input-text qty">
                                       <button onclick="addProductQty(${result.id})"
                                               class="increase items-count" type="button">
                                           <i class="lnr lnr-chevron-up"></i>
                                       </button>
                                       <button onclick="deduceProductQty(${result.id})"
                                               class="reduced items-count" type="button">
                                           <i class="lnr lnr-chevron-down"></i>
                                       </button>
                                   </div>
                               </td>



<td>${(result.qty * result.price).toFixed(2)}</td>
  <td>
      <span class="bg-danger px-2 py-1 rounded text-white" style="cursor: pointer;" onclick="deleteProduct(${result.id})">
      <i class="fa fa-trash"> </i>
      </span>
        </td>

       `;
            str += "</tr>";


        });
        str +=  `
      <tr>
<td colspan="5">Grand Total</td>
<td >${total.toFixed(2)}</td>
 </tr>

       `;
        $('#tablebody').html(str);
    }
    function payOut() {

        var results = JSON.parse(localStorage.getItem("products"));
        $.ajax({
            type:"post",
            url: "/payout",
            data :{
                "items": results,
                "token": $("#token").val()
            },
            success:function (results) {
                console.log(results)
                $('#checkOutBtn').css("display","none");
                $('#stripeTR').css("visibility","visible");
                $('#stripeForm').css("display","block");
                clearCart();
                clearProduct();
                showCartItem();
                showProducts([]);

            },
            error:function (response) {
                console.log(response.responseText);
            }
        });
    }
    function deleteProduct(id) {
        var results = JSON.parse(localStorage.getItem("products"));
        results.forEach((result)=>{
            if (result.id === id)
            {
                var ind = results.indexOf(result);
                results.splice(ind,1);
            }
        });
        deleteItem(id);
        saveProducts(JSON.stringify(results));
    }
</script>

@endsection
