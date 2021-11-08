@extends('userlayout.master')
@section('content')
  <!-- ======= Hero Section ======= -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section  id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="#">Home</a></li>
          <li>Foods</li>
        </ol>
        <h2>Resturent List</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <h2>{{  $food->resturent_name}}</h2>
            <h6>{{ $food->location}}</h6>

          </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
          <div class="container">

            <div class="row">

              <div class="col-lg-8 entries">

                <article class="entry entry-single">

                  <div class="entry-img">
                    <img src="{{ url('images') }}/{{ $food->image}}" alt="" class="img-fluid">
                  </div>

                  <h2 class="entry-title">
                    <a href="#">{{ $food->location}}</a>
                  </h2>

                  {{-- <div class="entry-meta">
                    <ul>resturent_name
                      <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">John Doe</a></li>
                      <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                      <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12</a></li>
                    </ul>
                  </div> --}}

                  <div class="entry-content">

  <a href="{{ $food->link }}">{{ $food->link }}</a>



                  </div>



                </article><!-- End blog entry -->



              </div><!-- End blog entries list -->
              <div class="col-lg-4">

                <div class="sidebar">
              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('halal/food') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Division</h3>
              <div class="sidebar-item categories">
                <ul>
                    @foreach ($division as $data)


                  <li><a href="{{ url('halalfood/division/') }}/{{ $data->id }}">{{ $data->div_name }} <span></span></a></li>
                    @endforeach
                </ul>

              </div><!-- End sidebar categories-->


              <h3 class="sidebar-title">Sub Division</h3>
              <div class="sidebar-item recent-posts">

                <ul>
                    @foreach ($subdiv as $data)


                  <li><a href="{{ url('halalfood/subdiv')}}/{{ $data->id }}">{{ $data->subdiv }} <span></span></a></li>
                    @endforeach
                </ul>











              </div><!-- End sidebar recent posts-->



            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->



  @stop
