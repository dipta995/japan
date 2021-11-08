@extends('adminlayout.master')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                                <div class="row">
                                   <div class="col-md-6">
                                       <form action="{{ url('/admin/subdiv') }}" method="post">
                                        {{-- MESSAGE --}}
                                        @if (Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                             
                                               {{ Session::get('success') }}
                                        </div>
                                        @endif
                                        
                                        
                                        @if (Session::get('fail'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                         {{ Session::get('fail') }}
                                        </div>
                                        @endif
                                                  
                                        {{-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif --}}
                                    @csrf
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Categorie sub division</label>
                                            <input name="subdiv" class="form-control" style="width:auto;" id="inputEmailAddress" type="text" placeholder="Enter email address" >
                                            <span style="color:red;">@error('div_name'){{ $message }} @enderror</span>
                                            <div>
                                                <button class="btn btn-success">submit</button>
                                            </div>
                                        </div>
                                      
                                       </form>
                                   </div>
                                   <div class="col-md-6">
                                       <table class="table">
                                           <tr>
                                               <th>Cat Name</th>
                                               <th>Action</th>
                                           </tr>
                                           @foreach ($subdiv as $item)
                                               
                                          
                                           <tr>
                                               <td>{{ $item->subdiv }}</td>
                                            <td>
                                                <form action="{{ url('remove/subdiv')}}/{{ $item->id }}" method="post">
                                                    @csrf
                                                  <button type="submit" name="divremove" data-id="" class="btn btn-outline-danger btn-md px-3"><i style="font-size: 22px;" class="fas fa-trash"></i></button> 
                                                  </form>

                                            </td>
                                           </tr> 
                                           @endforeach
                                       </table>
                                   </div>
                               </div>

                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                
                                <button id="addbtn" class="btn btn-success" data-modal="modalOne">Add Restaurant</button>
         
        
                                <div id="modalOne" class="modal">
                                  <div class="modal-content">
                                    <div class="contact-form">
                                      <a class="close">&times;</a>
                                      <form action="{{ url('/admin/add/food')}}" method="post" enctype="multipart/form-data">
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
                                        <h2 style="margin-left: 30px;">Add New University</h2>
                                        <div style="margin-left: 30px;">
                                            <select class="select" name="div_id" id="">
                                                @foreach ($division as $item)
                                                <option value="{{ $item->id }}">{{ $item->div_name }}</option>
                                                @endforeach
                                            </select>
                                            <select class="select" name="subdiv_id" id="">
                                                @foreach ($subdiv as $item)
                                                <option value="{{ $item->id }}">{{ $item->subdiv }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                          <input class="fname" type="text" name="resturent_name" placeholder="Resurent name">

                                          <input type="text" name="location" placeholder="resturent Location">
                                          <input type="text" name="link" placeholder="resturent Link">
                                           
                                          
                                          <input type="file" name="image">
                                        </div>
                                        
                                     
                           
                                        <button type="submit" name="insertfood" >Submit</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                          
                                                <th>Address</th>
                                                <th>Image</th>
                                                
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                              
                                                <th>Address</th>
                                                <th>Image</th>
                                               
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($foods as $item)
                                                
                                         
                                            <tr>
                                                <td>{{ $item->resturent_name }}</td>
                                                <td>{{ $item->location }}</td>
                                                <td><img style="height: 50px;width:50px;" src="../images/{{ $item->image }}" alt=""></td>
                                                <td></td>
                                                <td> 
                                                    <form action="{{ url('remove/food')}}/{{ $item->id }}" method="post">
                                                        @csrf
                                                      <button type="submit" name="rfood" data-id="" class="btn btn-outline-danger btn-md px-3"><i style="font-size: 22px;" class="fas fa-trash"></i></button> 
                                                      </form>
                                                    
                                                </td>
                                                
                                            </tr>
                                              @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        

                
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
 