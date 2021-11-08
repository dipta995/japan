<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renthouse;
use App\Models\Division;
use App\Models\Agent;
use App\Models\Agentpost;
use DB;

class RentController extends Controller
{
  public $a=6;
    function showhomerent(Request $request)
    {



      $search = $request->query('search');
      if ($search) {

        $homerent = Renthouse::where('location','LIKE',"%{$search}%")->paginate($this->a);

      }else{
        $homerent = Renthouse::paginate($this->a);
      }
        $division = DB::table('divisions')->get();
        $recentadd = DB::table('renthouses')->limit(4)->get();


            return view('user.homerent',compact('homerent','division','recentadd'));
    }
 function showhomerentbydiv(Request $request,$id)
 {
      $homerent = Renthouse::where('rent_id',$id)->paginate($this->a);

        $division = DB::table('divisions')->get();
        $recentadd = DB::table('renthouses')->limit(4)->get();


            return view('user.homerent',compact('homerent','division','recentadd'));
 }
    function showhomerentmuslim(Request $request)
    {
      $search = $request->query('search');
      if ($search) {

        $homerent = Renthouse::where('location','LIKE',"%{$search}%")->orWhere('details', 'LIKE',"%{$search}%")->paginate($this->a);

      }else{

        $homerent = Renthouse::where('muslim', '=',1)->paginate($this->a);
      }
        $division = DB::table('divisions')->get();
        $recentadd = DB::table('renthouses')->limit(4)->get();


            return view('user.muslimrent',compact('homerent','division','recentadd'));
    }
    function showhomerentOwn()
    {
      $userid= session('userid');

        $division = DB::table('divisions')->get();

        $homerent = Renthouse::where('customer_id', '=',$userid)->get();


            return view('user.ownhomerent',compact('homerent','division'));
    }
    function addhomerent(Request $request)
    {
        if ($request->has('adrent'))
        {


        $request->validate([
            'div_id' => 'required',
            'price' => 'required',
            'room' => 'required|max:255',
            'person' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'details' => 'required',
            'muslim' => 'required',
            'image_one' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_two' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_three' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $id = (session('userid'));
        $time =time();
        $rand = rand($time,10);
        $imageName_o = $rand.'1'.'.'.$request->image_one->extension();
        $imageName_t = $rand.'2'.'.'.$request->image_two->extension();
        $imageName_th = $rand.'3'.'.'.$request->image_three->extension();




        $request->image_one->move(public_path('images'), $imageName_o);
        $request->image_two->move(public_path('images'), $imageName_t);
        $request->image_three->move(public_path('images'), $imageName_th);
        $universityins = DB::table('renthouses')->insert([

          'div_id'=>$request->input('div_id'),
          'customer_id'=> $id,
          'price'=>$request->input('price'),
          'phone'=>$request->input('phone'),
          'person'=>$request->input('person'),
          'location'=>$request->input('location'),
          'details'=>$request->input('details'),
          'room'=>$request->input('room'),
          'muslim'=>$request->input('muslim'),
          'image_one'=>$imageName_o,
          'image_two'=>$imageName_t,
          'image_three'=>$imageName_th



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


function removehomerent(Request $request){
  if ($request->has('rrent'))
            {
              $rentid = $request->input('rent_id');

            $removedata = DB::table('renthouses')->where('rent_id', '=', $rentid)->delete();
                if ($removedata)
                {
                  return back()->with('success','Successfully Deleted');
                }else{
                  return back()->with('fail',' not Deleted');
                }
            }
}

function Removepost(Request $request){
  if ($request->has('post'))
            {
              $rentid = $request->input('post_id');

            $removedata = DB::table('agentposts')->where('post_id', '=', $rentid)->delete();
                if ($removedata)
                {
                  return back()->with('success','Successfully Deleted');
                }else{
                  return back()->with('fail',' not Deleted');
                }
            }
}








function showhomerentId(Request $request,$id)
{

    $homerent = Renthouse::where('rent_id', '=',$id)->first();
    $rentlimit = DB::table('renthouses')->limit(4)->get();
    $division = DB::table('divisions')->get();

      return view('user.singlehomerent',compact('homerent','rentlimit','division'));
}


// AGENT Functions

function agentView(Request $request)
    {
      $id = (session('userid'));

      $search = $request->query('search');
      if ($search) {

        $agent = Agent::where('company_name','LIKE',"%{$search}%")->orWhere('address_office', 'LIKE',"%{$search}%")->paginate($this->a);

      }else{

        $agent = Agent::paginate($this->a);

      }



        $agentpostlimit = DB::table('agentposts')->limit(8)->get();
        $division = DB::table('divisions')->get();



            return view('user.agent',compact('agent','agentpostlimit','division'));
    }

    function myagentpost(){
      $agentid = session('agentid');
      $agentpost = Agentpost::where('agent_id', '=',$agentid)->paginate($this->a);
      return view('user.profileagentpostview',compact('agentpost'));
  }
    // function agentpanel()
    // {
    //     $
    //     $agent = DB::table('agentposts')->get();
    //     $divisions = DB::table('diivsions')->get();


    //         return view('admin.agent',compact('agent','divisions'));
    // }





    function adagentpost(Request $request)
    {
        if ($request->has('adagpost'))
        {


        $request->validate([

            'div_id' => 'required',
            'agent_id' => 'required',
            'title' => 'required',
            'price' => 'required|max:255',
            'overview' => 'required',
            'location' => 'required',

            'image_one' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_two' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image_three' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $id = (session('userid'));
        $time =time();
        $rand = rand($time,10);
        $imageName_o = $rand.'1'.'.'.$request->image_one->extension();
        $imageName_t = $rand.'2'.'.'.$request->image_two->extension();
        $imageName_th = $rand.'3'.'.'.$request->image_three->extension();




        $request->image_one->move(public_path('images'), $imageName_o);
        $request->image_two->move(public_path('images'), $imageName_t);
        $request->image_three->move(public_path('images'), $imageName_th);
        $universityins = DB::table('agentposts')->insert([

          'div_id'=>$request->input('div_id'),
          'agent_id'=> $request->input('agent_id'),
          'price'=>$request->input('price'),
          'title'=>$request->input('title'),
          'location'=>$request->input('location'),
          'overview'=>$request->input('overview'),

          'image_one'=>$imageName_o,
          'image_two'=>$imageName_t,
          'image_three'=>$imageName_th



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


function removeagentpost(Request $request){
  if ($request->has('rrent'))
            {
              $rentid = $request->input('rent_id');

            $removedata = DB::table('renthouses')->where('rent_id', '=', $rentid)->delete();
                if ($removedata)
                {
                  return back()->with('success','Successfully Deleted');
                }else{
                  return back()->with('fail',' not Deleted');
                }
            }
}


function agentpostByagentId(Request $request,$id)
{




    $agentpost = Agentpost::where('agent_id', '=',$id)->paginate($this->a);
    $postlimit = DB::table('agentposts')->limit(4)->get();
    $agent = DB::table('agents')->limit(6)->get();

      return view('user.agentpost',compact('agentpost','postlimit','agent'));
}
function agentpostByagentIdAll(Request $request,$id)
{

    $agentpost = DB::table('agentposts')->paginate($this->a);
    $postlimit = DB::table('agentposts')->limit(4)->get();
    $agent = DB::table('agents')->limit(6)->get();

      return view('user.agentpost',compact('agentpost','postlimit','agent'));
}



function agentpostById(Request $request,$id)
{

    $agentpost = Agentpost::where('post_id', '=',$id)->first();
    $postlimit = DB::table('agentposts')->limit(4)->get();
    $agent = DB::table('agents')->get();

      return view('user.singleagentpost',compact('agentpost','postlimit','agent'));
}

// function rentpostagent(Request $request,$id)
// {

//     $agentpost = Agentpost::where('post_id', '=',$id)->first();
//     $postlimit = DB::table('agentposts')->limit(4)->get();
//     $agent = DB::table('agents')->get();

//       return view('user.singleagentpost',compact('agentpost','postlimit','agent'));
// }



function agentpostform()
{
  $division = DB::table('divisions')->get();
  return view('user.profileagentpost',compact('division'));
}


}
