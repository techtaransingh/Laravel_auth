<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Edit Page</title>
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
  <div class="panel-heading"><h3 class="text-center">Edit the entry</h3></div>
  <div class="panel-body">



<form action ="/contacts/list/edit/{{$contact['id']}}" method = "POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control"  name="name" value="{{$contact['name']}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control"  value="{{$contact['email']}}" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control"  name="address" value="{{$contact['address']}}" id="exampleInputPassword1">
  </div>  
  <div class="form-group">
    <label for="exampleInputPassword1">Mob. No.</label>
    <input type="text" class="form-control" name="mob_no" value="{{$contact['mob_no']}}" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image<img src="<?php echo url('images/' . $contact['image']); ?>" style="width:100px;height:50px"/></label>
    <input type="file" class="form-control" name="image" value ="<?php echo $contact['image']; ?>" id="exampleInputPassword1">
  </div>
  <input type="hidden" name="image_value" value="{{ $contact['image'] }}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
  <button type="submit" class="btn btn-primary">EDIT</button>
</form>
</div>
</div>


</div>


</body>
</html>