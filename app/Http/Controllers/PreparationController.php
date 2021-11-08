<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PreparationController extends Controller
{
    function preparationview()
    {
        $cat = DB::table('preparationcats')->get();
        $preparation = DB::table('preparationcats')->join('preparations', 'preparationcats.id', '=', 'preparations.cat_id')->get();
        if (session('status')==2){ 
          return view('admin.preparation',compact('cat','preparation'));
        }
    }
    function preparationviewuser(Request $request,$id)
    {
        $cat = DB::table('preparationcats')->get();
        $preparation = DB::table('preparationcats')->join('preparations', 'preparationcats.id', '=', 'preparations.cat_id')->where('preparations.id', '=', $id)->first();
        
          return view('user.preparation',compact('cat','preparation'));
    }

    function addcat(Request $request)
    {
        if($request->has('add'))
        {
            
    $preparation = DB::table('preparationcats')->insert([
       
        'name'=>$request->input('name') 
    ]); 
    
    }elseif($request->has('insertform'))
    {
        
$preparation = DB::table('preparations')->insert([
   
    'cat_id'=>$request->input('cat_id'),
    'menu_title'=>$request->input('menu_title'),
    'title'=>$request->input('title'),
    'overview'=>$request->input('overview')  
]); 

}  elseif ($request->has('precatremove')) 
{
    $id=$request->input('id');
$preparation = DB::table('preparationcats')->where('id', '=', $id)->delete();
   
}elseif ($request->has('preremove')) 
{
    $id=$request->input('id');
$preparation = DB::table('preparations')->where('id', '=', $id)->delete();
   
}







    if ($preparation) {
        return back()->with('success','Successfully send');
      }
      else{
        return back()->with('fail','Something wrong');
      }
    
    }
}
