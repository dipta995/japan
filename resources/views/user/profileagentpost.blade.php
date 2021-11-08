@extends('userlayout.master')
@section('content')
 
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
 
 
      <div class="modal-content">
        <div style="margin-top:130px;" class="contact-form">
       
          <form action="{{ url('add/agentpost')}}" method="post" enctype="multipart/form-data">
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
                <input class="fname" type="hidden" name="agent_id" value='{{ session('agentid')  }}'>
                <input type="text" name="title" placeholder="Add Title">
                <input type="text" name="price" placeholder="Price">
              <input class="fname" type="text" name="location" placeholder="Enter Location">
       
              
            
              <input type="file" name="image_one" placeholder="Selling Price">
              <input type="file" name="image_two" placeholder="Selling Price">
              <input type="file" name="image_three" placeholder="Selling Price">
            </div>
            
         
           <div style="margin-left: 30px;">
              <textarea name="overview" rows="4" placeholder="Details"></textarea>
            </div>  
            <button type="submit" name="adagpost" >Submit</button>
          </form>
          
 
      </div>
    </div>
  </div><!-- End sidebar recent posts-->

  

</div><!-- End sidebar -->

</div><!-- End blog sidebar -->

</div>

</div>
 

</main><!-- End #main -->
 
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