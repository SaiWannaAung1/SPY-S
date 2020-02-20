@extends('layout.client')
@section('title','SPY\'S | Home Page')



@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="overlay"></div>
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="offset-lg-2 col-lg-8">
                        <h3>Fashion for
                            <br />Upcoming Winter</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        <a class="white_bg_btn" href="#">View Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Feature Product Area =================-->
    <section class="feature_product_area section_gap">
        <div class="main_box">
            <div class="container-fluid">
                <div class="row">
                    <div class="main_title">
                        <h2>Featured Products</h2>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
                <div class="row">

@foreach($products as $product)
                    <div class="col col1">
                        <div class="f_p_item">
                            <div class="f_p_img">

                                <img class="img-fluid" src="{{asset('/uploads/'.unserialize($product->image)[0] )}}" alt="">


                                <div class="p_icon">
                                    <a href="/products/{{$product->slug}}">
                                        <i class="lnr lnr-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="lnr lnr-cart" onclick="addToCart('{{$product->id}}')"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="#">
                                <h4>{{$product->name}}</h4>
                            </a>
                            <h5>${{$product->price}}</h5>
                        </div>
                    </div>

@endforeach




                </div>

            </div>
        </div>
    </section>
    <!--================End Feature Product Area =================-->


@endsection

