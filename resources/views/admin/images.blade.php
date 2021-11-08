@extends('adminlayout.master')
@section('content')

<div class="container">
    <h4 style="margin-top: 100px;">Image table</h4>
 
   
    <div class="row">
        <div class="col-md-5">

        </div>
        <div class="col-md-7">
  
            @php
                  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                  $urls = "https://";   
             else  
                  $urls = "http://"; 
                  $urls.= $_SERVER['HTTP_HOST']; 
            @endphp
     
                <div class="panel panel-primary">
                  <div class="panel-heading"><h2>Image uploader</h2></div>
                  <div class="panel-body">
                    <input style="width:500px;" type="text" value="<?php echo $urls; ?>/images/{{ Session::get('image') }}">
                 
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ Session::get('image') }}">
                    
                    @endif
                
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <form action="{{ url('imageadd') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
                            </div>
                 
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                 
                        </div>
                    </form>
                
                  </div>
                </div>
            
            <?php
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                  $url = "https://";   
             else  
                  $url = "http://"; 
                  $url.= $_SERVER['HTTP_HOST'];   
         $files = glob("images/*.*");
         
         
         $table = "<table class='table'><tr>
                 <td>url</td>
                 <td>image</td>
             </tr>";
         for ($i = 0; $i < count($files); $i++) {
             $image = $files[$i];
             //echo basename($image) . "<br />"; // show only image name if you want to show full path then use this code 
               $table .= "<tr><td/>".$url.$image."<td/>";
                 $table .= '<td><img class=imagedesign src="' . $image . '"  /><td></tr>';
         
         }
         $table.="</table>";
         
         echo $table;
         ?>
         
 
         
         <style>
             .imagedesign{
               
                 width: 60px;
                 height: 60px; 
                   
             }
         </style>
        </div>
    </div>
</div>


@stop
       