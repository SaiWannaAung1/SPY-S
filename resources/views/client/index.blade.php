@extends('layout.client')
@section('title','SPY\'S | Home Page')



@section('content')

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
                                        <i class="lnr lnr-cart"></i>
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
