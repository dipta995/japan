<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JapaneseController extends Controller
{
    function adminjapan()
    {

        $test = DB::table('japanesetests')->get();
        if (session('status')==2){ 
          return view('admin.japanesetest',compact('test'));
        }
    }
    function preparationviewuser(Request $request,$id)
    {

        $test = DB::table('japanesetests')->where('id', '=', $id)->first();

          return view('user.japanesetest',compact('test'));
    }

    function addtest(Request $request)
    {
         if($request->has('insertform'))
    {

$preparation = DB::table('japanesetests')->insert([


    'menu_title'=>$request->input('menu_title'),
    'title'=>$request->input('title'),
    'overview'=>$request->input('overview')
]);

}  elseif ($request->has('precatremove'))
{
    $id=$request->input('id');
$preparation = DB::table('japanesetests')->where('id', '=', $id)->delete();

}






    if ($preparation) {
        return back()->with('success','Successfully send');
      }
      else{
        return back()->with('fail','Something wrong');
      }

    }
}
