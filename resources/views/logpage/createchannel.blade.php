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
            <li><a href="#">Crete Channel</a></li>
            {{-- <li><a href="#"></a></li> --}}
          </ol>


        </div>
      </section>

<div class="container">
  <h2>Create Your Channel</h2>

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

   <form class="was-validated" method="post" action="{{ url('channel')}}" enctype="multipart/form-data">
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
    <select class="select" name="div_id" id="">
      @foreach ($division as $item)
      <option value="{{ $item->id }}">{{ $item->div_name }}</option>
      @endforeach
  </select>

    <div class="form-group">
      <label for="uname">Company Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="company_name" required>

    </div>

    <div class="form-group">
      <label for="uname">address_office:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="address_office" required>

    </div>

    <div class="form-group">
        <label for="uname">Phone:</label>
        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="phone" required>

      </div>



      <div class="form-group">
        <label for="uname">image:</label>
        <input type="file" class="form-control" id="uname" placeholder="Enter username" name="image" required>

        <div class="form-group">
            <label for="uname">Brif:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="brif" required>

          </div>


    <button type="submit" name="channel" class="btn btn-primary">Create</button>
  </form>
</div>
</main><!-- End #main -->



@stop
{{-- </body>
</html> --}}
