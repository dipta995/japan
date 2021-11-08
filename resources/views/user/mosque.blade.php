@extends('userlayout.master')
@section('content')
  <!-- ======= Hero Section ======= -->
 
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section  id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="#">Home</a></li>
          <li>Mosque</li>
        </ol>
        <h2>Mosque List</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <div class="row">
@foreach ($mosque as $item)
    

              <div class="col-md-6 d-flex align-items-stretch">
                <article class="entry">

                  <div class="entry-img">
                    <img src="{{ url('images/'.$item->image) }}" alt="" class="img-fluid">
                  </div>

                  <h2 class="entry-title">
                    <a href="{{ url('halalfood/'.$item->id )}}">{{ $item->mosque_name }}</a>
                  </h2>

                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="icofont-location"></i> <a href="{{ url('mosque/'.$item->id) }}">{{ $item->location }}</a></li>
                   
                    </ul>
                  </div>

                  <div class="entry-content">
                    <p>
                         {{-- university details --}}
                    </p>
                    <div class="read-more">
                      <a href="{{ url('mosque') }}/{{ $item->id }}">Read More</a>
                    </div>
                  </div>

                </article><!-- End blog entry -->
              </div>
@endforeach

               

            </div>

            <div class="blog-pagination">
              <ul class="justify-content-center">
            
               
                {{-- <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li> --}}
 
                
                {{ $mosque->links('pagination.custom') }}
             
              </ul>
            </div>
 
            <style>.w-5 {
              width: 10px;
            }
            .pl-4{
              display: none;
            }
             
             
            
            </style>
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('mosque') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Division</h3>
              <div class="sidebar-item categories">
                <ul>
                    @foreach ($division as $data)
                    
                 
                  <li><a href="{{ url('mosque/division/'.$data->id) }}">{{ $data->div_name }} <span></span></a></li>
                    @endforeach
                </ul>

              </div><!-- End sidebar categories-->

     
              <h3 class="sidebar-title">Sub Division</h3>
              <div class="sidebar-item recent-posts">
               
                <ul>
                    @foreach ($subdiv as $data)
                    
                 
                  <li><a href="{{ url('mosque/subdiv/'.$data->id) }}">{{ $data->subdiv }} <span></span></a></li>
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