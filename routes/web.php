<?php

use App\Jobs\SomeJob;
use App\Mail\SomeMailable;
use App\Models\User;
use App\Notifications\SomeNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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

Route::get('/', function () {

    // To test this part, you'll need to start Redis on localhost (should be running already if you're using Sail)
    Redis::enableEvents();
    Redis::get('something');

    Cache::get('fgfgf');
    Cache::put('something', 'another thing');
    Cache::get('something');

    dispatch(new SomeJob);

    Mail::to('test@gm.com')->send(new SomeMailable);

    $user = new User;
    Notification::send($user, new SomeNotification);

    DB::transaction(function() {
       DB::table('users')->select('*')->take(4)->get();
    });

    Log::info('A message');

    return view('welcome');
});
