@extends('layout.admin')
@section('title','SPY\'S | Home Page')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Main View Product</li>
    </ul>

    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
            @include('layout.message')
            <!-- START SIMPLE DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Main Category</h3>
                        <ul class="panel-controls">

                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <table class="table datatable_simple">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">OnHand</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Updated Date</th>
                                <th class="text-center">Edit Main Category</th>
                                <th class="text-center">Delete Main Category</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr class="text-center">

                                    <td style="padding-top: 30px;">{{$id++}}</td>
                                    <td ><img src="{{asset('/uploads/'.unserialize($product->image)[0] )}}" width="70px" height="70px"></td>
                                    <td style="padding-top: 30px;">{{$product->name}}</td>
                                    <td style="padding-top: 30px;">{{$product->price}}</td>
                                    <td style="padding-top: 30px;">{{$product->on_hand}}</td>
                                    <td style="padding-top: 30px;">{{$product->created_at}}</td>
                                    <td style="padding-top: 30px;">{{$product->updated_at}}</td>
                                    <td style="padding-top: 30px;">
                                        <a href="/supplier/product/{{$product->slug}}/edit" class="btn btn-sm " style="background-color: #ff9728; border-radius: 3px" >&nbsp;<i class="fa fa-edit" style="color: white" > </i></a>
                                    </td>
                                    <td style="padding-top: 30px;">
                                        <form method="post" action="{{action('ProductsController@delete_product', $product->slug)}}" class="pull-center">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background-color: red; border-radius: 3px">&nbsp;<i class="fa fa-trash-o" style="color: white"> </i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END SIMPLE DATATABLE -->

            </div>
        </div>

    </div>


@endsection

@section('script')
    <script>

    </script>

@endsection

