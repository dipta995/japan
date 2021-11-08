@extends('adminlayout.master')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Division</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                                <div class="row">
                                   <div class="col-md-6">
                                       <form action="{{ url('/admin/divisions') }}" method="post">
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
                                            <label class="small mb-1" for="inputEmailAddress">Division Name</label>
                                            <input name="div_name" class="form-control" style="width:auto;" id="inputEmailAddress" type="text" placeholder="Enter Division" >
                                            <span style="color:red;">@error('div_name'){{ $message }} @enderror</span>
                                            <div>
                                                <button class="btn btn-success">Create</button>
                                            </div>
                                        </div>
                                      
                                       </form>
                                   </div>
                                   <div class="col-md-6">
                                       <table class="table">
                                           <tr>
                                               <th>Division Name</th>
                                               <th>Action</th>
                                           </tr>
                                           @foreach ($division as $item)
                                               
                                          
                                           <tr>
                                               <td>{{ $item->div_name }}</td>
                                            <td>
                                                <form action="{{ url('remove/division')}}/{{ $item->id }}" method="post">
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
                            </div>  
                           
         
        
                         
                                      
                            <div class="card-body">
                                 
                            </div>
                        </div>
                    </div>
                </main>
        

                
   
@stop