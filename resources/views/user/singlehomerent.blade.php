@extends('userlayout.master')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        
        <ol>
          <li><a href="#">Home</a></li>
          <li><a href="#">{{  $homerent->location}}</a></li>
        </ol>
        <h2>{{ $homerent->location}}</h2>

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
                        <img class="d-block w-100" src="{{ url('images/'.$homerent->image_one)}}" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('images/'.$homerent->image_two)}}" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{ url('images/'.$homerent->image_three)}}" alt="Third slide">
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
                <a href="#">{{ $homerent->price}} Taka</a>

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
echo $homerent->details 
@endphp
             

              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="#">dsfsd</a></li>
                  </ul>

                  <i class="icofont-tags"></i>
                  <ul class="tags">
                    
                    <li>Total Room/seat:<a style="color:green; font-size:14px;" href="#">{{ $homerent->room}}</a></li>
                    <li>Total Person:<a style="color:green; font-size:14px;" href="#">{{ $homerent->person}}</a></li>
                    <li>Contact No:<a style="color:green; font-size:14px;" href="#">{{ $homerent->phone}}</a></li>
                     
                  </ul>
                </div>

              
              </div>
              <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://bdto-japan.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            </article><!-- End blog entry -->

 
   
          </div><!-- End blog entries list -->
          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('homerent') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>
                    <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
               
                      
                 
                @foreach ($rentlimit as $datas)
                      
                 
                <div class="post-item clearfix">
                  <img src="{{ url('images/'.$datas->image_one) }}" alt="">
                  <h4><a href="{{ url('hoemrent/'.$datas->rent_id) }}">{{ $datas->location }}</a></h4>
                  <time datetime="2020-01-01">{{ $datas->created_at }}</time>
                </div>
 @endforeach

              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                    @foreach ($division as $data)
                    
                 
                  <li><a href="{{ url('/homerent/division/'.$data->id) }}">{{ $data->div_name }} <span></span></a></li>
                    @endforeach
                </ul>

              </div><!-- End sidebar categories-->

          
                
 
      
 

       
 

              </div><!-- End sidebar recent posts-->

  

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  @stop