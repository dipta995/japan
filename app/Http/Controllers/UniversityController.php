<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unicat;
use App\Models\Universitie;

use DB;
use Session;
class UniversityController extends Controller
{
  public $a = 6;
    function showuniversity(Request $request)
    {
      $search = $request->query('search');
      if ($search) {

        $versity = Universitie::where('uni_name','LIKE',"%{$search}%")->orWhere('uni_location', 'LIKE',"%{$search}%")->paginate($this->a);

      }else{
        $versity = Universitie::paginate($this->a);
      }
        //$versity = DB::table('universities')->paginate(1);

        $varsitylimit = DB::table('universities')->limit(4)->get();
        $ucat = DB::table('unicats')->get();

          return view('user.university',compact('versity','varsitylimit','ucat'));


    }

    function showuniversitycat(Request $request,$id)
    {

       // $versity = Universitie::paginate(1);

        $versity = Universitie::where('cat_id', '=',$id)->paginate($this->a);
        $versitycatname = DB::table('universities')->join('unicats', 'universities.cat_id', '=', 'unicats.id')->where('unicats.id', '=', $id)->first();
        $varsitylimit = DB::table('universities')->limit(4)->get();
        $ucat = DB::table('unicats')->get();

          return view('user.universitycat',compact('versity','varsitylimit','ucat','versitycatname'));


    }



    function showuniByid(Request $request,$id)
    {

        $varsity = Universitie::where('uni_id', '=',$id)->first();
        $varsitylimit = DB::table('universities')->limit(4)->get();
        $ucat = DB::table('unicats')->get();

          return view('user.singleuniversity',compact('varsity','varsitylimit','ucat'));
    }

    function adminshow()
    {

      $versity = DB::table('universities')->join('unicats', 'universities.cat_id', '=', 'unicats.id')->get();
      $ucat = DB::table('unicats')->get();
      if (session('status')==2){
          return view('admin.varsity',compact('versity','ucat'));
      }

    }

    function insertdata(Request $request)
    {
      $validatedData = $request->validate([
        'name_uni' => 'required|unique:unicats|max:255',

    ]);
    //Unicat::create($request->all());
    $catinsert = DB::table('unicats')->insert([

      'name_uni'=>$request->input('name_uni')


  ]);
  if ($catinsert) {
    return back()->with('success','Successfully send');
  }
  else{
    return back()->with('fail','Something wrong');
  }

    }

    function RemoveCatuni(Request $request,$id){
      if ($request->has('unicatremove'))
                {
                $removedata = DB::table('unicats')->where('id', '=', $id)->delete();
                    if ($removedata)
                    {
                      return back()->with('success','Successfully Deleted');
                    }else{
                      return back()->with('fail',' not Deleted');
                    }
                }
    }


    public function universitydatastore(Request $request)
    {
      $request->validate([
            'cat_id' => 'required',
            'uni_name' => 'required|unique:universities|max:255',
            'uni_location' => 'required|max:255',
            'uni_details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $imageName = time().'.'.$request->image->extension();


        $request->image->move(public_path('images'), $imageName);
        $universityins = DB::table('universities')->insert([

          'cat_id'=>$request->input('cat_id'),
          'uni_name'=>$request->input('uni_name'),
          'uni_details'=>$request->input('uni_details'),
          'uni_location'=>$request->input('uni_location'),
          'uni_image'=>$imageName



      ]);
      if ($universityins) {
        return back()->with('success','Successfully send');
      }
      else{
        return back()->with('fail','Something wrong');
      }



        return redirect()->back()->with('success','Image uploaded successfully.')->with('image',$imageName);
    }

    function Removeuni(Request $request,$id){
      if ($request->has('uniremove'))
                {
                $removedata = DB::table('universities')->where('uni_id', '=', $id)->delete();
                    if ($removedata)
                    {
                      return back()->with('success','Successfully Deleted');
                    }else{
                      return back()->with('fail',' not Deleted');
                    }
                }
    }



}
