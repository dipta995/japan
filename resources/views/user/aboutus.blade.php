@extends('userlayout.master')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="#">Home</a></li>
          <li><a href="#">{{  $aboutus->menu_title}}</a></li>
        </ol>


      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">



              <h2 class="entry-title">
                <a href="blog-single.html">{{ $aboutus->title}}</a>
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
echo $aboutus->overview
@endphp


              </div>


            </article><!-- End blog entry -->



          </div><!-- End blog entries list -->


        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  @stop
