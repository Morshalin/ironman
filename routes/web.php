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
Route::group(['middleware' => ['install']], function () {
Route::get('/login', function () {
    return redirect()->route('login');
});

Route::get('/','FrontendController@index')->name('front.home');
Route::post('subscribe','FrontendController@subscribe')->name('subscribe');
Route::get('dmca','FrontendController@dmca')->name('dmca');
Route::get('contact','FrontendController@contact')->name('contact');
Route::post('contactus','FrontendController@contactus')->name('contactus');
Route::get('category/{slug}','FrontendController@accrodingCategory')->name('category');
Route::get('subcategory/{slug}','FrontendController@accrodingSubategory')->name('subcategory');

Route::get('newsdetails/{slug}','FrontendController@newsdetails')->name('newsdetails');
Route::get('eventdetalis/{slug}','FrontendController@eventdetalis')->name('eventdetalis');
Route::get('stream/live/{id}','FrontendController@live')->name('stream');

Auth::routes();
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth']], function () {
	//ui:::::::::::::::::::
		 Route::get('/profile', 'UiController@index')->name('profile');
		 Route::post('/profile', 'UiController@postprofile')->name('postprofile');
		 Route::post('/password', 'UiController@password_change')->name('password');

		 Route::any('setting','SettingController@index')->name('setting');
		 Route::get('backup','SettingController@getBackup')->name('backup');
		 Route::get('language','LanguageController@index')->name('language');
		 Route::match(['get', 'post'], 'create', 'LanguageController@create')->name('language.create');

		 Route::get('language/edit/{id?}', 'LanguageController@edit')->name('language.edit');
		 Route::patch('language/update/{id}', 'LanguageController@update')->name('language.update');
		 Route::delete('/language/delete/{id}', 'LanguageController@delete')->name('language.delete');

	 		/*::::::::::::::user role Permission:::::::::*/
	 Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
			Route::get('/role', 'RoleController@index')->name('role');
			Route::get('/role/datatable', 'RoleController@datatable')->name('role.datatable');
			Route::any('/role/create', 'RoleController@create')->name('role.create');
			Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
			Route::post('/role/edit', 'RoleController@update')->name('role.update');
			Route::delete('/role/delete/{id}', 'RoleController@distroy')->name('role.delete');
			//user:::::::::::::::::::::::::::::::::
			Route::get('/', 'UserController@index')->name('index');
			Route::get('/datatable', 'UserController@datatable')->name('datatable');
			Route::any('/create', 'UserController@create')->name('create');
			Route::put('/change/{value}/{id}', 'UserController@status')->name('change');
			Route::get('/edit/{id}', 'UserController@edit')->name('edit');
			Route::put('/edit', 'UserController@update')->name('update');
			Route::delete('/delete/{id}', 'UserController@destroy')->name('delete');
		});

		/* =============================================================
						categor and sub category route
			============================================================*/
			Route::group(['prefix'=>'nav-category'],function(){
				Route::resource('category','CategoryController');
				Route::resource('subcategory','SubcategoryController');
			});

		/* =============================================================
						Event and Stidum Management route
			============================================================*/
			Route::group(['prefix'=>'event-manage'],function(){
				Route::resource('event','EventController');
				Route::resource('studium','StudiumController');
				Route::resource('club','ClubController');
				Route::resource('upcomingmatch','UpcomingmatchController');
			});
			Route::get('eventallsubcategory','UpcomingmatchController@subcategory')->name('eventallsubcategory');
			Route::get('eventacordingsubcat','UpcomingmatchController@eventacordingsubcat')->name('eventacordingsubcat');
			Route::get('score/{id}','EventController@scoreadd')->name('score.add');
			Route::get('totalscore','EventController@totalscore')->name('totalscore');
			Route::post('scoreupdate/{id}','EventController@scoreupdate')->name('scoreupdate');
		/* =============================================================
						Slider Route
			============================================================*/
			Route::resource('slider','SliderController');
		/* =============================================================
						Gallery Route
			============================================================*/
			Route::resource('gallery','GalleryController')->only(['index', 'store','destroy']);
		/* =============================================================
						Latest News Route
			============================================================*/
			Route::group(['prefix'=>'latestnews'],function(){
				Route::resource('news','NewslatestController');
			});
			Route::get('allsubcategory','NewslatestController@subcategory')->name('allsubcategory');
		/* =============================================================
						Aboute Route
			============================================================*/
			Route::get('about/index','AboutController@index')->name('about.index');
			Route::post('about/store','AboutController@store')->name('about.store');
		/* =============================================================
						Contact Route
			============================================================*/
			Route::get('contact/index','ContactController@index')->name('contact.index');
			Route::delete('contact/delete/{id}','ContactController@delete')->name('delete');
			Route::get('contact/show/{id}','ContactController@show')->name('contact.show');
		/* =============================================================
						subscriber Route
			============================================================*/
			Route::get('subscriber/index','SubscriberlistController@index')->name('subscriber.index');
			Route::delete('subscriber/{id}','SubscriberlistController@destroy')->name('subscriber.destroy');
			
	});

Route::get('/home', 'HomeController@index')->name('home');
});


Route::get('/installs', 'Install\InstallController@index');
Route::get('install/database', 'Install\InstallController@database');
Route::post('install/process_install', 'Install\InstallController@process_install');
Route::get('install/create_user', 'Install\InstallController@create_user');
Route::post('install/store_user', 'Install\InstallController@store_user');
Route::get('install/system_settings', 'Install\InstallController@system_settings');
Route::post('install/finish', 'Install\InstallController@final_touch');	
