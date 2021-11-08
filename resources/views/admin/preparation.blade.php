@extends('adminlayout.master')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Bdto-japan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Preparation</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                                <div class="row">
                                   <div class="col-md-6">
                                       <form action="{{ url('admin/add/preparationcat') }}" method="post">
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
                                            <label class="small mb-1" for="inputEmailAddress">Categorie Name</label>
                                            <input name="name" class="form-control" style="width:auto;" id="inputEmailAddress" type="text" placeholder="Enter Study Catagories Name" >
                                            <span style="color:red;">@error('name'){{ $message }} @enderror</span>
                                            <div>
                                                <button name="add" class="btn btn-success">Submit</button>
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
                                           @foreach ($cat as $item)
                                               
                                          
                                           <tr>
                                               <td>{{ $item->name }}</td>
                                            <td>
                                                <form action="{{ url('remove/preparationcat')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                  <button type="submit" name="precatremove" data-id="" class="btn btn-outline-danger btn-md px-3"><i style="font-size: 22px;" class="fas fa-trash"></i></button> 
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
                                
                                <button id="addbtn" class="btn btn-success" data-modal="modalOne">Add Institute</button>
         
        
                                <div id="modalOne" class="modal">
                                  <div class="modal-content">
                                    <div class="contact-form">
                                      <a class="close">&times;</a>
                                      <form action="{{ url('admin/add/preparation')}}" method="post" enctype="multipart/form-data">
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
                                        <h2 style="margin-left: 30px;">Add New Institute</h2>
                                        <div style="margin-left: 30px;">
                                            <select class="select" name="cat_id" id="">
                                                @foreach ($cat as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                          <input class="fname" type="text" name="menu_title" placeholder=" Institute Name">
                                          <input class="fname" type="text" name="title" placeholder=" Institute Name">
                                         
                                           
                                          
                                          
                                        </div>
                                        
                                     
                                        <div style="margin-left: 30px;">
                                          <textarea name="overview" id="txtEditor" rows="4"  placeholder="Institute Page Details "></textarea>
                                        </div>
 
                                        <button onclick=" $('#txtEditor').val($('.Editor-editor').text());" type="submit" name="insertform" >Create</button>
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
                                          
                                               
                                                <th>Catagorie</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                              
                                              
                                                <th>Catagorie</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($preparation as $item)
                                                
                                         
                                            <tr>
                                                <td>{{ $item->menu_title }}</td>
                                                <td>{{ $item->name }}</td>
                                                
                                              
                                                <td> 
                                                    <form action="{{ url('remove/preparation')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                      <button type="submit" name="preremove" data-id="" class="btn btn-outline-danger btn-md px-3"><i style="font-size: 22px;" class="fas fa-trash"></i></button> 
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