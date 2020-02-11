@extends('layout.supplier')
@section('title','SPY\'S | Home Page')

@section('content')
    <!-- PAGE CONTENT -->


    <form action="/supplier/create_product" class="form-horizontal" enctype="multipart/form-data" method="post">
        @csrf
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Insert Product</strong></h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Product Name</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Price</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                            <input type="text" class="form-control" name="price"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Quality</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil-square"></span></span>
                            <input type="number" min="0" class="form-control" name="quality"/>
                        </div>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Main Category</label>
                    <div class="col-md-6 col-xs-12">
                        <select class="form-control " name="maincategory" id="category">
                            <option value="0" disabled="true" selected="true">Select Main Category</option>
                            @foreach($mCats as $mCat)
                                <option value="{{$mCat->id}}">{{$mCat->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Sub Category</label>
                    <div class="col-md-6 col-xs-12">
                        <select class="form-control " name="subcategory" id="subcategory">
                            <option value="0" disabled="true" selected="true">Sub Category</option>

                        </select>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">About Product</label>
                    <div class="col-md-6 col-xs-12">
                        <textarea class="summernote" name="content"></textarea>

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Choice Product Images</label>
                    <div class="col-md-6 col-xs-12">
                        <input name="file[]" id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false">
                    </div>

                </div>


            </div>

            <div class="panel-footer">
                <button class="btn btn-default" type="reset">Clear Form</button>
                <button class="btn btn-primary pull-right" type="submit">Submit</button>
            </div>
        </div>
    </form>

    <!-- END PAGE CONTENT -->
@endsection

@section('script')
    <script>
        $("#file-1").fileinput({
            theme: 'fa',
            'showCancel':false,
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileCount: 3,

        });
        $('#category').on('change',function(e){

            var cat_id = e.target.value;
            var token = $("#_token").val();
            $.ajax({
                type:'get',
                url: "{!! \Illuminate\Support\Facades\URL::to('catSelete') !!}",
                data: {
                    'cat_id': cat_id
                },
                success: function( data ) {

                    $('#subcategory').empty();
                    $.each(data,function (index,subcatObj) {
                        $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>')
                    });
                },
                error:function () {
                    $('#subcategory').empty();
                }
            });


        });




    </script>
@endsection
