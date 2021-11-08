<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use DB;
class DivisionController extends Controller
{

  function home()
  {
    $aboutus = DB::table('abouts')->first();
    return view('user.home',compact('aboutus'));
  }
    function divisionview()
    {
        $division = DB::table('divisions')->get();
        if (session('status')==2){
          return view('admin.division',compact('division'));
        }



}

function adddivname(Request $request)
{
    $validatedData = $request->validate([
        'div_name' => 'required|unique:divisions|max:200',

    ]);
    //Unicat::create($request->all());
    $divinsert = DB::table('divisions')->insert([

      'div_name'=>$request->input('div_name')


  ]);
  if ($divinsert) {
    return back()->with('success','Successfully send');
  }
  else{
    return back()->with('fail','Something wrong');
  }

    }
    function addsubdiv(Request $request)
{
    $validatedData = $request->validate([
        'subdiv' => 'required|unique:subdivs|max:200',

    ]);
    //Unicat::create($request->all());
    $subdiv = DB::table('subdivs')->insert([

      'subdiv'=>$request->input('subdiv')


  ]);
  if ($subdiv) {
    return back()->with('success','Successfully send');
  }
  else{
    return back()->with('fail','Something wrong');
  }

    }
    function Removediv(Request $request,$id){
        if ($request->has('divremove'))
                  {
                  $removedata = DB::table('divisions')->where('id', '=', $id)->delete();
                      if ($removedata)
                      {
                        return back()->with('success','Successfully Deleted');
                      }else{
                        return back()->with('fail',' not Deleted');
                      }
                  }
      }
      function Removesubdiv(Request $request,$id){
        if ($request->has('divremove'))
                  {
                  $removedata = DB::table('subdivs')->where('id', '=', $id)->delete();
                      if ($removedata)
                      {
                        return back()->with('success','Successfully Deleted');
                      }else{
                        return back()->with('fail',' not Deleted');
                      }
                  }
      }


}
