<?php namespace DanDigital\DdCore;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;
use Validator;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = ['username', 'password'];
	protected $table = 'dd_users';
	protected $hidden = array('password', 'remember_token');
	public $errors;

	public static $rules = [
		'default' => [
			'username' => 'required|unique:users',
			'password' => 'required'
		],
		'login' => [
			'username' => 'required'
		]
	];

	public function isValid($ruleset = null)
	{

		$rules = static::$rules['default'];

		if ($ruleset && isset(static::$rules[$ruleset])) 
		{
			$rules = array_merge($rules, static::$rules[$ruleset]);
		}

		$validation = Validator::make($this->attributes, $rules);
		if ($validation->passes()) return true;
		$this->errors = $validation->messages();
	}
	
}
