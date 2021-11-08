@extends('userlayout.master')
@section('content')
  <!-- ======= Hero Section ======= -->
 
<main id="main">
  <section  id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.html">Home</a></li>
        <li>HomeRent</li>
      </ol>
      <h2>Rental Home List</h2> 

<table style="margin-top: 200xp;" class="table align-middle">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Location</th>
        <th scope="col">Price</th>
        <th scope="col">Room/person</th>
        <th scope="col">About Rent</th>
        <th scope="col">Upload At</th>
        <th scope="col">image1</th>
        <th scope="col">image2</th>
        <th scope="col">image3</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($homerent as $item)
 

      <tr>
        <th scope="row">1</th>
        <td>{{ $item->location }}</td>
        <td>{{ $item->price }}</td>
        <td>Room:{{ $item->room }} /Person: {{ $item->person }}</td>
        
        <td>{{ $item->details }}</td>
        <td>{{ $item->created_at }}</td>
        <td><img style="height: 50px; width: 50px; border-radius: 25%" src="{{ url('images/'.$item->image_one) }}" alt=""></td>
        <td><img style="height: 50px; width: 50px; border-radius: 25%" src="{{ url('images/'.$item->image_two) }}" alt=""></td>
        <td><img style="height: 50px; width: 50px; border-radius: 25%" src="{{ url('images/'.$item->image_three) }}" alt=""></td>
      
        <td>
            <form action="{{ url('remove/homerent')}}" method="post">
                @csrf
                <input type="hidden" name="rent_id" value=" {{ $item->rent_id }}">
                <button type="submit" name="rrent" class="btn btn-danger btn-sm px-3"> 
                Remove
                </button>
            </form>
        </td>
      </tr>
      @endforeach
     
    </tbody>
  </table>
    </div>
  </section>
</main>
 @stop
                 
 
      
 

       
  