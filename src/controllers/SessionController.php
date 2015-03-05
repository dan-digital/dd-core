<?php namespace DanDigital\DdCore;

use Auth;
use View;
use Input;
use Redirect;

class SessionController extends \BaseController {

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function create()
	{

		if (Auth::check())
		{
			return Redirect::route('admin.dashboard');
		}

		return View::make('DD::session.create');
	}

	public function store()
	{
		$input = Input::only('username', 'password');

		if (! $this->user->fill($input)->isValid('login'))
		{
			return Redirect::back()->withErrors($this->user->errors)->withInput();
		}

		if (Auth::attempt($input))
		{
			return Redirect::route('admin.dashboard');
		}
		
		return Redirect::back()->with('login_error', 'Incorrect login details :(')->withInput();
	}

	public function destroy()
	{
		Auth::logout();
		return Redirect::route('admin');
	}
}