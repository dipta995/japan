<?php

use App\Http\Controllers\AboutController;
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\RentController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\MuslimController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PreparationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\JapaneseController;
use App\Http\Controllers\JobContoller;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('user.home');
// });
Route::get("/",[DivisionController::class,'home']);
Route::post("/contactemailmessage",[MailController::class,'sendEmail']);
//university
Route::get("/university",[UniversityController::class,'showuniversity']);
Route::get("/university/{id}",[UniversityController::class,'showuniByid']);
Route::get("/university/cat/{id}",[UniversityController::class,'showuniversitycat']);



//login

Route::post("/customerlogin",[UserAuth::class,'userLogin']);
Route::post("/create",[UserAuth::class,'accountcreate']);
Route::post("/channel",[UserAuth::class,'channelcreate']);
Route::get("/channelcreate",[UserAuth::class,'channel']);

Route::get("/create",[UserAuth::class,'create']);
Route::get('/customerlogin', function () {
    if (session()->has('user'))
    {
        return redirect('/');
    }
    return view('logpage.login');
});
// Route::get('/channelcreate', function () {
//     if (session()->put('agentid')!=NULL)
//     {
//         return redirect('/');
//     }else{
//         return redirect('/create');
//     }
//     return view('logpage.login');
// });





Route::get('/logout', function () {
    if (session()->has('user'))
    {
        session()->pull('user');
        session()->pull('userid');
        session()->pull('agentid');
        session()->pull('active');

    }
    return view('logpage.login');
});
// Route::get('/agentlogin', function () {
//     if (session()->has('agent'))
//     {

//         return redirect('/agent');
//     }
//     return view('admin.agentlogin');
// });
// Route::get('/agentout', function () {
//     if (session()->has('agent'))
//     {
//         session()->pull('agent');
//         session()->pull('company');
//         session()->pull('userid');
//         session()->pull('flag');
//     }
//     return view('admin.agentlogin');
// });

//home rent


Route::get("/homerent",[RentController::class,'showhomerent']);
Route::get("homerent/division/{id}",[RentController::class,'showhomerentbydiv']);

Route::get("/homerent/muslim",[RentController::class,'showhomerentmuslim']);



Route::get("/homerent/{id}",[RentController::class,'showhomerentId']);
Route::get("/my/rent",[RentController::class,'showhomerentOwn']);
Route::post("add/homerent",[RentController::class,'addhomerent']);

Route::post("remove/homerent",[RentController::class,'removehomerent']);

//rent agent
Route::get("/agentpost",[RentController::class,'agentpostform']);
Route::get("/rent/agent",[RentController::class,'agentView']);
Route::get("/rent/agent/{id}",[RentController::class,'agentpostByagentId']);
Route::get("/rent/agentpublic/{id}",[RentController::class,'agentpostByagentIdAll']);
Route::get("/rentpost/{id}",[RentController::class,'agentpostById']);
Route::post("add/agentpost",[RentController::class,'adagentpost']);
Route::post("remove/owntrentpost",[RentController::class,'Removepost']);
Route::get("/mypost/agent",[RentController::class,'myagentpost']);



// ADMIN ROUTE

 
//university
Route::get("/admin",[AboutController::class,'adminhome']);
Route::get("/admin/university",[UniversityController::class,'adminshow']);
Route::post("/admin/university",[UniversityController::class,'insertdata']);
Route::post("remove/catuni/{id}",[UniversityController::class,'RemoveCatuni']);
Route::post("/admin/add/university",[UniversityController::class,'universitydatastore']);
Route::post("remove/university/{id}",[UniversityController::class,'Removeuni']);



 //division
Route::get("/admin/division",[DivisionController::class,'divisionview']);
Route::post("/admin/divisions",[DivisionController::class,'adddivname']);
Route::post("remove/division/{id}",[DivisionController::class,'Removediv']);
Route::get("/admin/subdiv",[MuslimController::class,'subdivview']);
Route::post("/admin/subdiv",[DivisionController::class,'addsubdiv']);
Route::post("remove/subdiv/{id}",[DivisionController::class,'Removesubdiv']);
Route::post("/admin/add/mosque",[MuslimController::class,'addmosque']);
Route::post("remove/mosque/{id}",[MuslimController::class,'removemosque']);

Route::get("/admin/food",[FoodController::class,'foodview']);
Route::post("/admin/add/food",[FoodController::class,'addfood']);
Route::post("remove/food/{id}",[FoodController::class,'removefood']);




Route::get("halal/food",[FoodController::class,'foodshow']);
Route::get("halal/food/{id}",[FoodController::class,'foodshowid']);
Route::get("halalfood/division/{id}",[FoodController::class,'foodshowbydiv']);
Route::get("halalfood/subdiv/{id}",[FoodController::class,'foodshowbysubdiv']);


Route::get("/mosque",[MuslimController::class,'mosqueview']);
Route::get("/mosque/{id}",[MuslimController::class,'mosqueviewid']);
Route::get("mosque/division/{id}",[MuslimController::class,'mosqueshowbydiv']);
Route::get("mosque/subdiv/{id}",[MuslimController::class,'mosqueshowbysubdiv']);

//rent area
// Route::get("/admin/rent",[DivisionController::class,'divisionview']);
// Route::post("/admin/rent/add",[DivisionController::class,'adddivname']);



//preparation


    Route::get("/preparation/{id}",[PreparationController::class,'preparationviewuser']);
    Route::get("/admin/preparation",[PreparationController::class,'preparationview']);
    Route::post("admin/add/preparationcat",[PreparationController::class,'addcat']);
    Route::post("admin/add/preparation",[PreparationController::class,'addcat']);
    Route::post("remove/preparationcat",[PreparationController::class,'addcat']);
    Route::post("remove/preparation",[PreparationController::class,'addcat']);



//Japanese test
Route::get("/japanesetest/{id}",[JapaneseController::class,'preparationviewuser']);
Route::get("/admin/japanesetest",[JapaneseController::class,'adminjapan']);
Route::post("admin/add/japanesetest",[JapaneseController::class,'addtest']);
Route::post("remove/japanesetest",[JapaneseController::class,'addtest']);


//Job
Route::get("/jobs/{id}",[JobContoller::class,'jobviewbyid']);
Route::get("/admin/job",[JobContoller::class,'jobview']);
Route::post("admin/add/job",[JobContoller::class,'addjobs']);
//Route::post("admin/update/job/{id}",[JobContoller::class,'updatejob']);
Route::post("remove/job",[JobContoller::class,'addjobs']);


//About
Route::get("/about",[AboutController::class,'aboutviewbyid']);
Route::get("/admin/about",[AboutController::class,'aboutview']);
Route::post("admin/add/about",[AboutController::class,'addabouts']);
//Route::post("admin/update/job/{id}",[JobContoller::class,'updatejob']);
Route::post("remove/about",[AboutController::class,'addabouts']);



//only image
Route::get("/imageadd",[ImageController::class,'imageshow']);
Route::post("imageadd",[ImageController::class,'imageupload']);
