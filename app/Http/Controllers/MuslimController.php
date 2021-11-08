<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MuslimController extends Controller
{
    function subdivview()
    {
        $subdiv = DB::table('subdivs')->get();
        $division = DB::table('divisions')->get();
        $mosque = DB::table('mosques')->get();
        if (session('status')==2){ 
          return view('admin.subdiv',compact('subdiv','division','mosque'));
        }
    
}
function addmosque(Request $request)
{
    if ($request->has('insertmosque')) 
    {


    $request->validate([
        'div_id' => 'required',
        'subdiv_id' => 'required',
        'mosque_name' => 'required|max:255',
        'location' => 'required',
        'link' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
 
 
    ]);
    
    $imageName = time().'.'.$request->image->extension();
       
     
    $request->image->move(public_path('images'), $imageName);
 
 
 
  
   
 
 
    $universityins = DB::table('mosques')->insert([
       
      'div_id'=>$request->input('div_id'),
      'subdiv_id'=>$request->input('subdiv_id'),
      'mosque_name'=>$request->input('mosque_name'),
      'location'=>$request->input('location'),
      'link'=>$request->input('link'),
  
      'image'=>$imageName
 
      
       
  ]); 
  if ($universityins) {
    return back()->with('success','Successfully send');
  }
  else{
    return back()->with('fail','Something wrong');
  }

  

    return redirect()->back()->with('success','Image uploaded successfully.')->with('image',$imageName);
}
}
function removemosque(Request $request,$id){
  if ($request->has('rmosque')) 
            {
            $removedata = DB::table('mosques')->where('id', '=', $id)->delete();
                if ($removedata) 
                {
                  return back()->with('success','Successfully Deleted');
                }else{
                  return back()->with('fail',' not Deleted');
                }
            }
}


function mosqueview()
{
    $subdiv = DB::table('subdivs')->get();
    $division = DB::table('divisions')->get();
    $mosque = DB::table('mosques')->paginate(2);
      return view('user.mosque',compact('subdiv','division','mosque'));

}
function mosqueviewid($id)
{
    $subdiv = DB::table('subdivs')->get();
    $division = DB::table('divisions')->get();
    $mosque = DB::table('mosques')->where('id', '=', $id)->first();
      return view('user.singlemosque',compact('subdiv','division','mosque'));

}
function mosqueshowbydiv($id)
{
  $subdiv = DB::table('subdivs')->get();
  $division = DB::table('divisions')->get();
  $mosque = DB::table('mosques')->where('div_id', '=', $id)->paginate(3);
    return view('user.mosquediv',compact('subdiv','division','mosque'));
}
function mosqueshowbysubdiv($id)
{
  $subdiv = DB::table('subdivs')->get();
  $division = DB::table('divisions')->get();
  $mosque = DB::table('mosques')->where('subdiv_id', '=', $id)->paginate(3);
    return view('user.mosquesubdiv',compact('subdiv','division','mosque'));
}

}
