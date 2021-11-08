@extends('userlayout.master')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        
        <ol>
          <li><a href="#">Home</a></li>
          <li><a href="#">{{  $agentpost->title }}</a></li>
        </ol>
        <h2>{{ $agentpost->title}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ url('images/'.$agentpost->image_one)}}" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src=".{{ url('images/'.$agentpost->image_two)}}" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('images/'.$agentpost->image_three)}}" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>




              
              </div>

              <h2 class="entry-title">
                <a href="#">{{ $agentpost->location}}</a>
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
echo $agentpost->overview
@endphp
             

              </div>

            

            </article><!-- End blog entry -->

 
   
          </div><!-- End blog entries list -->
          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('/rent/agent') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Agency Name</h3>
              <div class="sidebar-item categories">
                <ul>
                    @foreach ($agent as $data)
                    
                 
                  <li><a href="{{ url('rent/agent') }}/{{ $data->agent_id }}">{{ $data->company_name }} <span></span></a></li>
                    @endforeach
                </ul>

              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
               
                      
                 
                @foreach ($postlimit as $datas)
                      
                 
                <div class="post-item clearfix">
                  <img src="{{ url('images/'.$datas->image_one) }}" alt="">
                  <h4><a href="{{ url('hoemrent/'.$datas->post_id) }}">{{ $datas->location }}</a></h4>
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