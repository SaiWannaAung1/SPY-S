@extends('layout.admin')
@section('title','SPY\'S | Home Page')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sub Category</li>
    </ul>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
            @include('layout.message')
                <!-- START SIMPLE DATATABLE -->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sub Category for {{$main_CatName}}</h3>
                        <ul class="panel-controls">

                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <table class="table datatable_simple">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Sub Category Name</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Updated Date</th>
                                <th class="text-center">Edit Main Category</th>
                                <th class="text-center">Delete Main Category</th>

                            </tr>
                            </thead>
                  <tbody>

                  @foreach($sub_cats as $sub_cat)
                  <tr class="text-center">

                      <td>{{$id++}}</td>
                      <td>{{$sub_cat->name}}</td>
                      <td>{{$sub_cat->created_at}}</td>
                      <td>{{$sub_cat->updated_at}}</td>

                      <td>
                          <button class="btn btn-sm " style="background-color: #ff9728; border-radius: 3px" onclick="editSCat('{{$main_id}}','{{$main_CatName}}','{{$sub_cat->slug}}','{{$sub_cat->name}}')">&nbsp;<i class="fa fa-edit" style="color: white" > </i></button>
                      </td>
                      <td >



                          <form method="post" action="/admin/sub_category_delete/{{$main_id}}/{{$main_CatName}}/{{$sub_cat->slug}}/delete" class="pull-center">
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



{{-- -------------------------Start edit Main Categories  Modal-------------------------------------------}}
    <div class="modal fade" id="editSCat" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Sub Category</h4>
                </div>
                <div class="modal-body">



                    <form action="{{action('SubCategoriesController@update')}}" method="POST" >
        @csrf

                        <div class="row">
                            <div class="col-md-12">


                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden"  id="sCat_slug" name="sCat_slug" class="form-control" />
                                            <input type="hidden"  id="main_id" name="main_id" class="form-control" />
                                            <input type="hidden"  id="main_CatName" name="main_CatName" class="form-control" />
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" name="sCat_name" id="sCat_name" class="form-control" placeholder="Enter Main Category Name"/>

                                                </div>

                                        </div>
                                        <button type="reset" class="btn btn-warning float-left " style="border-radius: 3px; ">Rest</button>
                                        <button type="submit" class="btn btn-info float-right" style="border-radius: 3px;">Update</button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>


                </div>

            </div>

        </div>
    </div>

{{--    -------------------------end of Modal----------------------------------------}}

@endsection

@section('script')
<script>
    function editSCat(main_id,main_CatName,slug, name) {
        $("#editSCat").modal("show");
        $("#main_id").val(main_id);
        $("#main_CatName").val(main_CatName);

        $("#sCat_slug").val(slug);
        $("#sCat_name").val(name);

    }



</script>

@endsection
