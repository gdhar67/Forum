<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{

	public function postRegister(Request $request)
	{
		
	public function getHomepage()
	{
		return view('homepage');
	}

}