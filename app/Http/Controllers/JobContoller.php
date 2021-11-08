<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobContoller extends Controller
{
    function jobview()
    {

        $jobs = DB::table('jobs')->get();
        if (session('status')==2){ 
          return view('admin.jobs',compact('jobs'));
        }
    }
    function jobviewbyid(Request $request,$id)
    {

        $sjob = DB::table('jobs')->where('id', '=', $id)->first();

          return view('user.job',compact('sjob'));
    }
    function addjobs(Request $request)
    {
         if($request->has('insertform'))
    {

$preparation = DB::table('jobs')->insert([


    'menu_title'=>$request->input('menu_title'),
    'title'=>$request->input('title'),
    'overview'=>$request->input('overview')
]);

}  elseif ($request->has('precatremove'))
{
    $id=$request->input('id');
$preparation = DB::table('jobs')->where('id', '=', $id)->delete();

}






    if ($preparation) {
        return back()->with('success','Successfully send');
      }
      else{
        return back()->with('fail','Something wrong');
      }

    }
}
