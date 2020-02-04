@foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{$error}}
    </div>
@endforeach
@if(session('status'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session('status')}}
    </div>

@endif
