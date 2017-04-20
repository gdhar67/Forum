<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class forumController extends Controller
{

	public function getProfilepage()
	{
	
			return view('profile');
	}

	public function getSearchresults()
	{
				
			return view('searchresults');
	}

	public function postSearch(Request $Request)
	{	
		$name = $Request['search'];
		$user= User::where('username', $name)->first();

	
		if($user)
		{
			$uname = $user->username;
			return view('searchresults',['user'=>$uname]);
		}

		else
		{
			return view('searchresults',['user'=>null]);		
		}
	}

	public function postUserWall(Request $Request)
	{	
		$name = $Request['uname'];
		if(Auth::user()->username == $name)
		{
			return redirect()->route('Homepage');
		}
		else
		{
			return view('userwall',['user'=>$name]);		
		}
	}

	

}