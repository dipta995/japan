@extends('userlayout.master')
@section('content')
  <!-- ======= Hero Section ======= -->
 
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section  id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="#">Home</a></li>
          <li>Agent</li>
        </ol>
        <h2>Agent offices</h2> 
   
 



      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <div class="row">
@foreach ($agentpost as $item)
    

              <div class="col-md-6 d-flex align-items-stretch">
                <article class="entry">
 
          
      
 
                  <div class="entry-img">
                    <img src="{{ url('images') }}/{{ $item->image_one }}" alt="" class="img-fluid">
                  </div>

                  <h2 class="entry-title">
                    <a href="{{ url('homerent') }}/{{ $item->post_id }}">{{ $item->title }}</a>
                  </h2>

                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="{{ url('homerent/'.$item->post_id) }}">{{ $item->location }}</a></li>
                      <li class="d-flex align-items-center"><i class="icofont-price"></i> <a href="{{ url('homerent/'.$item->post_id) }}"><time >{{ $item->price }}</time></a></li>
                    </ul>
                  </div>

                  <div class="entry-content">
                    <p>
                        
                    </p>
                    <div class="read-more">
                      <a href="{{ url('rentpost') }}/{{ $item->post_id }}">details view</a>
                    </div>
                  </div>

                </article> 
              </div>
@endforeach

               

            </div>

            <div class="blog-pagination">
              <ul class="justify-content-center">
            
               
                {{-- <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li> --}}
 
                
                {{ $agentpost->links('pagination.custom') }}
             
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

              {{-- <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('homerent') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn--> --}}

              <h3 class="sidebar-title">Rent Office</h3>
 
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
                  <img src="{{ url('images') }}/{{ $datas->image_one }}" alt="">
                  <h4><a href="{{ url('rentpost') }}/{{ $datas->post_id }}">{{ $datas->location }}</a></h4>
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