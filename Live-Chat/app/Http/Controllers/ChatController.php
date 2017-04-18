<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class chatController extends Controller
{


	public function getUser (Request $request)
	{
		$reciever_uname = $request['reciever_uname'];
		session::put('runame',$reciever_uname);
	}

}