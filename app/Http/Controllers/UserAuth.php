<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
use DB;
use Auth;

class UserAuth extends Controller
{
    function userLogin(Request $request)
    {
      if ($request->has('loginpage'))
        {

         $data = $request->input();
         $checkuser = User::where('email', '=',$data['email'])->where('password', '=', $data['password'])->get();
         foreach ($checkuser as $value) {
              $name = $value['name'];
              $id = $value['id'];
              $status = $value['status'];

         }

         $rowcount = $checkuser->count();
         if ($rowcount>0) {

          //dd(true);
             $request->session()->put('user',$name);
             $request->session()->put('userid',$id);
             $request->session()->put('status',$status);
             $request->session()->put('active',true);
             if ($value['status']==0) {
                return redirect('/');
             }elseif($value['status']==1){

              $agentidfind = Agent::where('customer_id', '=',$id)->get();
              foreach ($agentidfind as  $item) {
                $agentids = $item['agent_id'];
              }
              $agent =$agentidfind->count();

                if ($agent>0) {
                  $request->session()->put('agentid',$agentids);
                  return redirect('/');
                } else{
                 return redirect('/channelcreate');

            }
             }elseif($value['status']==2){
                return redirect('/admin');
             }else{}

         }

         else{
            return back()->with('fail','Email or Password are incorrect');
         }
        }



    }

    function create(){
        return view('logpage.create');
    }
    function channel(){
        $userid= session('userid');
        $agent = DB::table('agents')->where('customer_id','=',$userid);
        $division = DB::table('divisions')->get();
        $channel =$agent->count();
        if ($channel>0) {
            return redirect('/');
        }else{
           // return redirect('/channelcreate');
            return view('logpage.createchannel',compact('division'));
        }
    }


     function accountcreate(Request $request)
     {
        if ($request->has('reg'))
        {


        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:255',


        ]);


        $universityins = DB::table('users')->insert([

          'name'=>$request->input('name'),

          'email'=>$request->input('email'),
          'password'=>$request->input('password'),
          'status'=>$request->input('status')



      ]);
      if ($universityins) {
        if ($request->input('status')==1) {
            return view('logpage.login');
        }
        return view('logpage.login');
        return back()->with('success','Successfully send');
      }
      else{
        return back()->with('fail','Something wrong');
      }



        return redirect()->back()->with('success','Image uploaded successfully.')->with('image',$imageName);
    }
     }


     function channelcreate(Request $request)
     {
        $userid= session('userid');
        if ($request->has('channel'))
        {


        $request->validate([
            'company_name' => 'required|unique:agents',
            'address_office' => 'required',
            'phone' => 'required|min:10',
            'brif' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',


        ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $universityins = DB::table('agents')->insert([
              'customer_id'=>$userid,
              'div_id'=>$request->input('div_id'),
              'company_name'=>$request->input('company_name'),
              'address_office'=>$request->input('address_office'),
              'phone'=>$request->input('phone'),
              'brif'=>$request->input('brif'),
              'flag'=>0,
              'image'=>$imageName





      ]);
      if ($universityins) {
        $agentpost = Agent::where('customer_id', '=',$userid)->first();

        $request->session()->put('agentid',$agentpost['agent_id']);

        return redirect('rent/agent');
      }
      else{
        return back()->with('fail','Something wrong');
      }




    }
     }



}
