@extends('layout.admin')
@section('title','SPY\'S | Home Page')

@section('content')
    @include('layout.message')
    <form action="/supplier/profile" class="form-horizontal" enctype="multipart/form-data" method="post">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Supplier Profile</strong></h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Shop Name</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="hidden"  class="form-control" name="shop_slug" value="{{$user->slug}}"/>
                            <input type="text" class="form-control" name="shop_name" value="{{$user->shop_name}}"/>
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Shopkeeper Name</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Address</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="address" value="{{$user->address}}"/>
                        </div>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Email Address</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Stripe Publishable Key</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="publishable_key" required/>
                        </div>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Stripe Secret Key</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="secret_key" required/>
                        </div>
                    </div>
                </div>



            </div>






            <div class="panel-footer">
                <button class="btn btn-default" type="reset">Clear Form</button>
                <button class="btn btn-primary pull-right" type="submit">Update Profile</button>
            </div>
        </div>
    </form>



@endsection

@section('script')


@endsection
