<?php

use App\Models\User;
use App\Models\Login;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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


Route::get('/', TestController::class);

return;

Route::get('/', function () {
    // for ($i=0; $i < 30; $i++) {
    //     $user = User::create();
    //     for ($j=0; $j < 50; $j++) {
    //         $user->states()->create(['state' => array_rand(['active', 'declined', 'accepted', 'disabled'])]);
    //     }
    // }

    // return User::whereHas('current_state', fn ($q) => $q->whereState('declined'))->with('current_state')->first();

    User::with('current_state')->get();

    return;


    return User::whereExists(function ($existsQuery) {
        $existsQuery
            ->from(DB::raw((new State)->getTable().' as _s'))
            ->whereColumn('user_id', 'users.id')
            ->where('state', 'declined')
            ->whereNotExists(function ($notExistsQuery) {
                $notExistsQuery->from('states')
                    ->whereColumn('user_id', 'users.id')
                    ->whereColumn('id', '>', '_s.id');
            });
    })->first();

    return User::whereHas('current_state', fn ($q) => $q->whereState('declined'))->first();
    



    // $user = User::with('latest_login')->get();
    // $login = Login::first();
    // $user = User::whereHas('latest_login', fn ($q) => $q->whereKey($login->getKey()))->first();

    // $user = User::first();

    // for ($i=0; $i < 250; $i++) {
    //     $user->logins()->create();
    // }

    $login = Login::latest()->first();
    return User::whereHas('latest_login')->get();
    // return User::whereHas('latest_login', fn ($q) =>$q->whereKey($login->getKey()))->with('latest_login')->get();
    
    // dd($user);



    // for ($i = 0;$i<1000;$i++) {
    //     $user->first()->logins()->create();
    // }
    // $user->logins()->create();
    // $user->logins()->create();
    // return $user->latest_login()->first();
});
