<?php

namespace App\Http\Controllers;

use App\Models\Halalfood;
use Illuminate\Http\Request;
use DB;

class FoodController extends Controller
{
  public $a= 12;
    function foodview(Request $request)
    {
     

        $foods = DB::table('halalfoods')->get();
    
        $subdiv = DB::table('subdivs')->get();
        $division = DB::table('divisions')->get();
        if (session('status')==2){ 
          return view('admin.food',compact('subdiv','division','foods'));
        }
    
}
function foodshow(Request $request)
{
  $search = $request->query('search');
  if ($search) {
    
    $foods = Halalfood::where('resturent_name','LIKE',"%{$search}%")->paginate($this->a);
    
  }else{ 
    $foods = DB::table('halalfoods')->paginate($this->a);
  }
    $subdiv = DB::table('subdivs')->get();
    $division = DB::table('divisions')->get();
      return view('user.halalfood',compact('subdiv','division','foods'));

}
function foodshowid($id)
{
    $subdiv = DB::table('subdivs')->get();
    $division = DB::table('divisions')->get();
    $food = DB::table('halalfoods')->where('id', '=', $id)->first();
      return view('user.singlefood',compact('subdiv','division','food'));

}
function foodshowbydiv(Request $request,$id)
    {
        $subdiv = DB::table('subdivs')->get();
        $division = DB::table('divisions')->get();
        $foods = DB::table('halalfoods')->where('div_id', '=', $id)->paginate(3);
          return view('user.halaldiv',compact('subdiv','division','foods'));
    
}
function foodshowbysubdiv(Request $request,$id)
    {
        $subdiv = DB::table('subdivs')->get();
        $division = DB::table('divisions')->get();
        $foods = DB::table('halalfoods')->where('subdiv_id', '=', $id)->paginate(3);
          return view('user.halalsubdiv',compact('subdiv','division','foods'));
    
}
function addfood(Request $request)
{
    if ($request->has('insertfood')) 
    {


    $request->validate([
        'div_id' => 'required',
        'subdiv_id' => 'required',
        'resturent_name' => 'required|max:255',
        'location' => 'required',
        'link' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
 
 
    ]);
    
    $imageName = time().'.'.$request->image->extension();
       
     
    $request->image->move(public_path('images'), $imageName);
 
 
 
  
   
 
 
    $universityins = DB::table('halalfoods')->insert([
       
      'div_id'=>$request->input('div_id'),
      'subdiv_id'=>$request->input('subdiv_id'),
      'resturent_name'=>$request->input('resturent_name'),
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
function removefood(Request $request,$id){
  if ($request->has('rfood')) 
            {
            $removedata = DB::table('halalfoods')->where('id', '=', $id)->delete();
                if ($removedata) 
                {
                  return back()->with('success','Successfully Deleted');
                }else{
                  return back()->with('fail',' not Deleted');
                }
            }
}

}
