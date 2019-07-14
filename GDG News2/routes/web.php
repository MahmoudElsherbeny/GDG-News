<?php

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


//home page
Route::get('/', 'frontend\appCtrl@index');

//sections page
Route::get('sec/{name}','frontend\appCtrl@sectionPage');
//news detailes page 
Route::get('detailes/{newsid}','frontend\appCtrl@detailes');
Route::post('detailes/{newsid}','frontend\appCtrl@storeComment');
Route::post('video/detailes/{newsid}','frontend\appCtrl@storeComment');
Route::get('comment/delete/{commentid}','frontend\appCtrl@deleteComment');
//videos page
Route::get('video','frontend\appCtrl@videoPage');
//Videos detailes page 
Route::get('video/detailes/{videoid}','frontend\appCtrl@videoDetailes');


//user pages
Route::get('signup','frontend\userCtrl@signup');
Route::post('signup','frontend\userCtrl@signupStore');
Route::get('login','frontend\userCtrl@login')->middleware('isLoged');
Route::post('login','frontend\userCtrl@doLogin');
Route::get('logout','frontend\userCtrl@logout');
Route::post('logout','frontend\userCtrl@logout');
Route::get('forg_pass','frontend\userCtrl@forgetPassword')->middleware('isLoged');
Route::post('forg_pass','frontend\userCtrl@doForget');
Route::get('reset/{user}','frontend\userCtrl@resetPass')->middleware('isLoged');
Route::post('reset/{user}','frontend\userCtrl@doReset');
Route::get('profile/edit/{user}','frontend\userCtrl@editProfile');
Route::post('profile/edit/{user}','frontend\userCtrl@updateProfile');


//login with social



/* -------------------------------------------------------------- */
//dashboard
Route::get('dashboard', 'backend\dashCtrl@index');


//sections
Route::get('dashboard/sections','backend\sectionCtrl@section');
Route::get('dashboard/sections/new','backend\sectionCtrl@create');
Route::post('dashboard/sections/new','backend\sectionCtrl@store');
Route::get('dashboard/sections/edit/{sectionid}','backend\sectionCtrl@edit');
Route::post('dashboard/sections/edit/{sectionid}','backend\sectionCtrl@update');
Route::get('dashboard/sections/delete/{sectionid}','backend\sectionCtrl@delete');
Route::post('dashboard/sections/delete/{sectionid}','backend\sectionCtrl@delete');




//news
Route::get('dashboard/news','backend\newsCtrl@news');
Route::get('dashboard/news/new','backend\newsCtrl@create');
Route::post('dashboard/news/new','backend\newsCtrl@store');
Route::get('dashboard/news/edit/{newsid}','backend\newsCtrl@edit');
Route::post('dashboard/news/edit/{newsid}','backend\newsCtrl@update');
Route::get('dashboard/news/delete/{newsid}','backend\newsCtrl@delete');
Route::post('dashboard/news/delete/{newsid}','backend\newsCtrl@delete');



//popular news
Route::get('dashboard/popular_news','backend\PopularnewsCtrl@news');
Route::get('dashboard/popular_news/new','backend\PopularnewsCtrl@create');
Route::post('dashboard/popular_news/new','backend\PopularnewsCtrl@store');
Route::get('dashboard/popular_news/edit/{newsid}','backend\PopularnewsCtrl@edit');
Route::post('dashboard/popular_news/edit/{newsid}','backend\PopularnewsCtrl@update');
Route::get('dashboard/popular_news/delete/{newsid}','backend\PopularnewsCtrl@delete');
Route::post('dashboard/popular_news/delete/{newsid}','backend\PopularnewsCtrl@delete');




//videos
Route::get('dashboard/video','backend\videoCtrl@videos');
Route::get('dashboard/video/new','backend\videoCtrl@create');
Route::post('dashboard/video/new','backend\videoCtrl@store');
Route::get('dashboard/video/edit/{newsid}','backend\videoCtrl@edit');
Route::post('dashboard/video/edit/{newsid}','backend\videoCtrl@update');
Route::get('dashboard/video/delete/{newsid}','backend\videoCtrl@delete');
Route::post('dashboard/video/delete/{newsid}','backend\videoCtrl@delete');




//slide show
Route::get('dashboard/slides','backend\slideCtrl@slide');
Route::get('dashboard/slides/new','backend\slideCtrl@create');
Route::post('dashboard/slides/new','backend\slideCtrl@store');
Route::get('dashboard/slides/edit/{newsid}','backend\slideCtrl@edit');
Route::post('dashboard/slides/edit/{newsid}','backend\slideCtrl@update');
Route::get('dashboard/slides/delete/{newsid}','backend\slideCtrl@delete');
Route::post('dashboard/slides/delete/{newsid}','backend\slideCtrl@delete');
Route::post('dashboard/slides/delete/{newsid}','backend\slideCtrl@delete');



//setting
Route::get('dashboard/setting','backend\settingCtrl@setting');
Route::get('dashboard/setting/edit/{id}','backend\settingCtrl@edit');
Route::post('dashboard/setting/edit/{id}','backend\settingCtrl@update');



//users & admin
Route::get('dashboard/users','backend\adminCtrl@users');
Route::get('dashboard/admins','backend\adminCtrl@admins');
Route::get('dashboard/admins/new','backend\adminCtrl@create');
Route::post('dashboard/admins/new','backend\adminCtrl@store');
Route::get('dashboard/profile/edit/{user}','backend\adminCtrl@editProfile');
Route::post('dashboard/profile/edit/{user}','backend\adminCtrl@updateProfile');
Route::post('dashboard/admins/delete/{user}','backend\adminCtrl@delete');


