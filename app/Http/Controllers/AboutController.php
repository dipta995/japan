<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

  public function adminhome()
  {
    if (session('status')==2){ 
    return view('admin.home');
  }
  } 
    function aboutview()
    {

        $aboutus = DB::table('abouts')->get();
        if (session('status')==2){ 
          return view('admin.aboutus',compact('aboutus'));}
    }
    function aboutviewbyid()
    {

        $aboutus = DB::table('abouts')->first();
  
          return view('user.aboutus',compact('aboutus'));
        
    }
    function addabouts(Request $request)
    {
      
         if($request->has('insertform'))
    {

$preparation = DB::table('abouts')->insert([


    'menu_title'=>$request->input('menu_title'),
    'title'=>$request->input('title'),
    'overview'=>$request->input('overview')
]);

}  elseif ($request->has('precatremove'))
{
    $id=$request->input('id');
$preparation = DB::table('abouts')->where('id', '=', $id)->delete();

}






    if ($preparation) {
        return back()->with('success','Successfully send');
      }
      else{
        return back()->with('fail','Something wrong');
      }

    }
}
