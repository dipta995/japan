@extends('userlayout.master')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="#">{{  $varsity->uni_name}}</a></li>
        </ol>
        <h2>{{ $varsity->uni_location}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{ url('images/'.$varsity->uni_image)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#">{{ $varsity->uni_name}}</a>
              </h2>

              {{-- <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12</a></li>
                </ul>
              </div> --}}

              <div class="entry-content">
@php
echo $varsity->uni_details
@endphp
             

              </div>
 
            </article><!-- End blog entry -->

 
   
          </div><!-- End blog entries list -->
          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('university') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                    @foreach ($ucat as $data)
                    
                 
                  <li><a href="{{ url('university/cat/'.$data->id) }}">{{ $data->name_uni }} <span></span></a></li>
                    @endforeach
                </ul>

              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
               
                      
                 
                @foreach ($varsitylimit as $datas)
                      
                 
                <div class="post-item clearfix">
                  <img src="{{ url('images/'.$datas->uni_image) }}" alt="">
                  <h4><a href="{{ url('university/'.$datas->uni_id) }}">{{ $datas->uni_name }}</a></h4>
                  <time datetime="2020-01-01">{{ $datas->created_at }}</time>
                </div>
 @endforeach
                
 
      
 

       
 

              </div><!-- End sidebar recent posts-->

  

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  @stop