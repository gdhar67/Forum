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
		
		$validator = Validator::make($request->all(), [
			'username' => 'required|max:20|unique:users',
			'email' => 'required|max:120',
			'password' => 'required|min:8',
			
		]);

		if ($validator->fails()) {
			return redirect('register')
						->withErrors($validator)
						->withInput();
					}


		$username=$request['username'];
		$email=$request['email'];
		$password=bcrypt($request['password']);


		$user = new User();
		$user->username=$username;
		$user->email=$email;
		$user->password=$password;
		$user -> save();

		Auth::login($user);

		return redirect() ->route('Homepage');

	}

	public function postLogin(Request $request)
	{




		$validator = Validator::make($request->all(), [
			'username' => 'required|max:20',
			'password' => 'required|min:8'
		]);

		if ($validator->fails()) {
			return redirect('signin')
						->withErrors($validator)
						->withInput();
		}


		if(Auth::attempt( ['username' => $request['username'],  'password' =>$request['password'] ]))
		{
			return redirect() -> route('Homepage');
		}
	

	}
	
	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('signin');
	}


	public function getHomepage()
	{
		$users = User::orderBy('username','asc')->get();


			return view('homepage',['users' => $users]);
	}

}