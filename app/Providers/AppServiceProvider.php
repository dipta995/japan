<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Models\Unicat;
use App\Models\Japanesetest;
use App\Models\Job;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'userlayout.header',
            function ($view) {

                $view->with('unicats', Unicat::all());


            }
        );
        view()->composer(
            'userlayout.header',
            function ($view) {

                $view->with('japantest', Japanesetest::all());


            }
        );

        view()->composer(
            'userlayout.header',
            function ($view) {

                $view->with('jobs', Job::all());


            }
        );



        // view()->composer(
        //     'userlayout.header',
        //     function ($view) {

        //         $view->with('subcat',self::subcats());


        //     }
        // );
    }

//     public function subcats()
//     {
//         $data = DB::table('preparationcats')->get();

//     foreach ($data as  $value) {

//         echo "<li class='drop-down'><a href='#'>".$value->name."</a>
//         <ul>";


//         $id = $value->id;
//         $datas = DB::table('preparations')->where('cat_id', '=', $id)->get();
//         foreach ($datas as $values) {
//             echo "<li><a href='#'>".$values->menu_title."</a></li>";
//         }


//         echo "</ul></li>";
//      }
// }
}
