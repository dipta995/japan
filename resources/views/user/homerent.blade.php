@extends('userlayout.master')
@section('content')
  <!-- ======= Hero Section ======= -->
 
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section  id="breadcrumbs" class="breadcrumbs">
      <div class="container">
 
        <ol>
          <li><a href="#">Home</a></li>
          <li>HomeRent</li>
        </ol>
        <h2>Rental Home List</h2> 
        @if (session('active')==true)
        <button id="addbtn" class="btn btn-outline-danger" data-modal="modalOne">Add To Let</button>
        <a class="btn btn-outline-danger" href="{{ url('my/rent') }}">My Tolet</a>
         @endif
         <a class="btn btn-outline-danger" href="{{ url('rent/agent') }}">Contact Rant Agent</a>
        <div  id="modalOne" class="modal">
          <div class="modal-content">
            <div style="margin-top:130px;" class="contact-form">
              <a class="close">&times;</a>
              <form action="{{ url('add/homerent')}}" method="post" enctype="multipart/form-data">
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
                <h2 style="margin-left: 30px;">Add New Addvertesment</h2>
                <div style="margin-left: 30px;">
                    <select class="select" name="div_id" id="">
                        @foreach ($division as $item)
                        <option value="{{ $item->id }}">{{ $item->div_name }}</option>
                        @endforeach
                    </select>
                    <br>
                  
                      <select class="select" name="muslim" id="">
                        <option>--Choose--</option>
                        <option value="0">For All</option>
                        <option value="1">For Muslim</option>
                      </select>
                    
                  <input class="fname" type="text" name="location" placeholder="Enter Location">
                  <input type="text" name="price" placeholder="Price">
                  <input type="text" name="phone" placeholder="Contact No">
                  <input type="text" name="room" placeholder="Enter Your Seat/Room ">
                  <input type="text" name="person" placeholder="Roommate Person">
                  
                  
                  <input type="file" name="image_one" placeholder="Selling Price">
                  <input type="file" name="image_two" placeholder="Selling Price">
                  <input type="file" name="image_three" placeholder="Selling Price">
                </div>
                
             
               <div style="margin-left: 30px;">
                  <textarea name="details" rows="4" placeholder="Home Details"></textarea>
                </div>  
                <button onclick=" $('#txtEditor').val($('.Editor-editor').text());" type="submit" name="adrent" >Submit</button>
              </form>
              
            </div>
          </div>
        </div>





      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <div class="row">
@foreach ($homerent as $item)
    

              <div class="col-md-6 d-flex align-items-stretch">
                <article class="entry">

                  <div class="entry-img">
                    <img src="{{ url('images/'.$item->image_one) }}" alt="" class="img-fluid">
                  </div>

                  <h2 class="entry-title">
                    <a href="{{ url('homerent/'.$item->rent_id) }}">{{ $item->location }}</a>
                  </h2>

                  {{-- <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="homerent/{{ $item->rent_id }}">{{ $item->uni_location }}</a></li>
                      <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="homerent/{{ $item->rent_id }}"><time datetime="2020-01-01">{{ $item->created_at }}</time></a></li>
                    </ul>
                  </div> --}}

                  <div class="entry-content">
                    <p>
                        
                    </p>
                    <div class="read-more">
                      <a href="{{ url('homerent/'.$item->rent_id) }}">Read More</a>
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
 
                
                {{ $homerent->links('pagination.custom') }}
             
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
                <form action="{{ url('homerent') }}" method="GET">
                  <input type="text" name="search" >
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->
                <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
               
                      
                 
                @foreach ($recentadd as $datas)
                      
                 
                <div class="post-item clearfix">
                  <img src="{{ url('images/'.$datas->image_one )}}" alt="">
                  <h4><a href="{{ url('homerent/'.$datas->rent_id) }}">{{ $datas->location }}</a></h4>
                  <time datetime="2020-01-01">{{ $datas->created_at }}</time>
                </div>
 @endforeach

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

  <script>
    let modalBtns = [...document.querySelectorAll("#addbtn")];
    modalBtns.forEach(function(btn) {
      btn.onclick = function() {
        let modal = btn.getAttribute('data-modal');
        document.getElementById(modal)
          .style.display = "block";
      }
    });
    let closeBtns = [...document.querySelectorAll(".close")];
    closeBtns.forEach(function(btn) {
      btn.onclick = function() {
        let modal = btn.closest('.modal');
        modal.style.display = "none";
      }
    });
    window.onclick = function(event) {
      if(event.target.className === "modal") {
        event.target.style.display = "none";
      }
    }
  </script>
     <style>
      .modal {
        display: none;
        position: fixed;
        z-index: 8;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
      }
      .modal-content {
        margin: 50px auto;
        border: 1px solid #999;
        width: 60%;
      }
      h2,p {
        margin: 0 0 20px;
        font-weight: 400;
        color: #999;
      }      span {
        color: #666;
        display: block;
        padding: 0 0 5px;
      }
     
      input,
      textarea {
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #1c87c9;
        outline: none;
      }
      .select{
    width: 90%;
    padding: 10px;
    border: 1px solid #1c87c9;
    margin-bottom: 20px;
      }
      .contact-form button {
        width: 100%;
        padding: 10px;
        border: none;
        background: #1c87c9;
        font-size: 16px;
        font-weight: 400;
        color: #fff;
      }
      button:hover {
        background: #2371a0;
      }
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
      }
      button.button {
        background: none;
        border-top: none;
        outline: none;
        border-right: none;
        border-left: none;
        border-bottom: #02274a 1px solid;
        padding: 0 0 3px 0;
        font-size: 16px;
        cursor: pointer;
      }
      button.button:hover {
        border-bottom: #a99567 1px solid;
        color: #a99567;
      }
    </style>

  @stop