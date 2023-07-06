<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Contacts</title>
  </head>


<body>
@if($errors->any())
    <div class="alert alert-danger">
    @foreach($errors->all() as $key => $value)
        <p class="text-center">{{$value}}</p>
    @endforeach
    </div>
    @endif
    
    @if($success=session('success'))
<div class="alert alert-success">
<p class="text-center">{{$success}}</p>
</div>
@endif
@if($error=session('error'))
<div class="alert alert-danger">
<p class="text-center">{{$error}}</p>
</div>
@endif

<div class="jumbotron container">

<div class="panel panel-default">
  <div class="panel-heading"><h3 class="text-center">Contacts</h3></div>
  <div class="panel-body">



<form action ="contacts" method = "POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control"  name="name" value="{{old('first_name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control"  name="address" id="exampleInputPassword1">
  </div>  
  <div class="form-group">
    <label for="exampleInputPassword1">Mob. No.</label>
    <input type="text" class="form-control" name="mob_no" value="{{old('mob_no')}}" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" name="image" id="exampleInputPassword1">
  </div>

    <input type="hidden" name="_token" value="{{csrf_token()}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>


</div>


</body>
</html>