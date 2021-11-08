{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In</title>
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
            <li><a href="#">Login</a></li>
            {{-- <li><a href="#"></a></li> --}}
          </ol>


        </div>
      </section>

<div class="container">
  <h2>Welcome Back</h2>

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

   <form class="was-validated" method="post" action="{{ url('/customerlogin')}}">
    @csrf
    <div class="form-group">
      <label for="uname">Email:</label>
      <input type="email" class="form-control" id="uname" placeholder="Enter username" name="email" required>

    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" minlength="6" placeholder="Enter password" name="password" required>

    </div>

    <button type="submit" name="loginpage" class="btn btn-primary">Login</button>
  </form>
  <a href="{{ url('create') }}">create new account</a>
</div>

</main><!-- End #main -->



@stop
{{-- </body>
</html> --}}
