<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});

Route::post('/', function()
{
	$redirect = Input::get('thwip');
	return Redirect::to($redirect);	
});

Route::get('(:num)', function($code)
{
	$thwip = Thwip::find($code);
	$thwip->hits = $thwip->hits + 1;
	$thwip->save();
	return Redirect::to($thwip->dest);
});

Route::get('login', function() {
	return View::make('account.login');
});

Route::post('login', function() {

	// get the username and password from the POST
	// data using the Input class
	$username = Input::get('email');
	$password = Input::get('password');

	// call Auth::attempt() on the username and password
	// to try to login, the session will be created
	// automatically on success
	if ( Auth::attempt($username, $password) )
	{
		// it worked, redirect to the admin route
		return Redirect::to('account');
	}
	else
	{
		// login failed, show the form again and
		// use the login_errors data to show that
		// an error occured
		return Redirect::to('login')
			->with('login_errors', true);
	}

});

Route::get('account', array('before' => 'auth', 'do' => function() {

	// get the current user
	$user = Auth::user();

	// show the create post form, and send
	// the current user to identify the post author
	return View::make('account.index')->with('user', $user);

}));

Route::get('logout', function() {

	// call the logout method to destroy
	// the login session
	Auth::logout();

	// redirect back to the home page
	return Redirect::to('/');

});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('/');
});