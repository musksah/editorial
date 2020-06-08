<?php namespace App\Controllers;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers', '*');
header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
}
