{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body> --}}
    @extends('userlayout.master')
    @section('content')
    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

              <ol>
                <li><a href="#">Create Account</a></li>
               {{-- MESSAGE --}}
               @if (Session::get('success'))
               <div class="alert alert-success alert-block">
                   <button type="button" class="close" data-dismiss="alert">×</button>

                      {{ Session::get('success') }}
               </div>
               @endif


               @if (Session::get('fail'))
               <div class="alert alert-danger alert-block">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('fail') }}
               </div>
               @endif
              </ol>


            </div>
          </section>
<div class="container">
  <h2></h2>



   <form class="was-validated" method="post" action="{{ url('create')}}">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" checked="checked" id="inlineRadio1" value="0" name="status">
      <label class="form-check-label"   for="inlineRadio1">I Am a Student</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio"  id="inlineRadio2" value="1" name="status">
      <label class="form-check-label" for="inlineRadio2">I Have An Agency </label>
    </div>

    <div class="form-group">
      <label for="uname">Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" required>

    </div>

    <div class="form-group">
      <label for="uname">Email:</label>
      <input type="email" class="form-control" id="uname" placeholder="Enter username" name="email" required>

    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>

    </div>


    <button type="submit" name="reg" class="btn btn-primary">Create</button>
  </form>
</div>
</main><!-- End #main -->



@stop
{{--
</body>
</html> --}}
