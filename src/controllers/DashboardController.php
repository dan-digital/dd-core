<?php namespace DanDigital\DdCore;

use View;

class DashboardController extends \BaseController {
	
	public function index()
	{
		return View::make('DD::index');
	}	
}