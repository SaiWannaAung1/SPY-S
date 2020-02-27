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
                                <th class="text-center">Total Quantity</th>
                                <th class="text-center">Total Sales Amount</th>
                                <th class="text-center">Month</th>
                                <th class="text-center">Year</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($datas as $data)
                                <tr class="text-center">

                                    <td style="padding-top: 20px;">{{$id++}}</td>
                                    <td style="padding-top: 20px;">{{$data->quantity}}</td>
                                    <td style="padding-top: 20px;">{{$data->total_price}}</td>
                                    <td style="padding-top: 20px;">{{$data->Month}}</td>
                                    <td style="padding-top: 20px;">{{$data->Year}}</td>

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

