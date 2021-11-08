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
    

              <div class="col-md-6 d-flex align-items-stretch">        <form action="{{ url('remove/owntrentpost')}}" method="post">
                    @csrf
                    
                    <input type="hidden" name="post_id" value=" {{ $item->post_id }}">
                    <button type="submit" name="post" class="btn btn-danger btn-sm px-3"> 
                      <i class="fas fa-trash"></i>
                    </button>
                </form>
                <article class="entry">
 
          
                 
                         
          
 
                  <div class="entry-img">
                    <img src="{{ url('images/'.$item->image_one) }}" alt="" class="img-fluid">
                  </div>

                  <h2 class="entry-title">
                    <a href="{{ url('homerent/'.$item->post_id) }}">{{ $item->title }}</a>
                  </h2>

                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="{{ url('homerent/'.$item->post_id )}}">{{ $item->location }}</a></li>
                      <li class="d-flex align-items-center"><i class="icofont-price"></i> <a href="{{ url('homerent/'.$item->post_id )}}"><time >{{ $item->price }}</time></a></li>
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

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('university') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->

            
 
 
     
  
 
      
 

       
 

              </div><!-- End sidebar recent posts-->

  

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

   
  @stop