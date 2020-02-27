@extends('layout.admin')
@section('title','SPY\'S | Home Page')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Manage User</li>
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
                                <th class="text-center">User Name</th>
                                <th class="text-center">User Email</th>
                                <th class="text-center">User Address</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr class="text-center">

                                    <td style="padding-top: 20px;">{{$id++}}</td>
                                    <td style="padding-top: 20px;">{{$user->name}}</td>
                                    <td style="padding-top: 20px;">{{$user->email}}</td>
                                    <td style="padding-top: 20px;">{{$user->address}}</td>
                                    <td style="padding-top: 20px;">{{$user->role}}</td>
                                    <td style="padding-top: 20px;">{{$user->status}}</td>
                                    <td style="padding-top: 20px;">
                                        @if($user->status!='active')
                                        <form method="post" action="{{action('UsersManagementController@update_user', [$user->slug,$user->status])}}" class="pull-center">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background-color: blue; border-radius: 3px">&nbsp;<i class="fa fa-unlock" style="color: white"> </i></button>
                                        </form>
                                            @else
                                            <form method="post" action="{{action('UsersManagementController@update_user', [$user->slug,$user->status])}}" class="pull-center">
                                                @csrf
                                                <button type="submit" class="btn btn-sm" style="background-color: red; border-radius: 3px">&nbsp;<i class="fa fa-lock" style="color: white"> </i></button>
                                            </form>
                                        @endif
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

