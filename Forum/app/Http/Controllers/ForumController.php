<?php
namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
		$user= User::where('username', $name)->first();
		$posts= Post::orderBy('created_at','desc')->get();


		if(Auth::user()->username == $name)
		{
			return redirect()->route('Homepage');
		}
		else
		{
			return view('userwall',['user'=>$user,'post'=>$posts]);		
		}
	}



	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('signin');
	}


	public function getHomepage()
	{
		$posts= Post::orderBy('created_at','desc')->get();


			return view('homepage',['post' => $posts]);
	}


	public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|max:120'
        ]);
        $user = Auth::user();
        $old_name = $user->name;
        $user->name = $request['name'];
        $user->description = $request['description'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        $old_filename = $old_name . '-' . $user->id . '.jpg';
        $update = false;
        if (Storage::disk('local')->has($old_filename)) {
            $old_file = Storage::disk('local')->get($old_filename);
            Storage::disk('local')->put($filename, $old_file);
            $update = true;
        }
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        if ($update && $old_filename !== $filename) {
            Storage::delete($old_filename);
        }
        return redirect()->route('Profilepage');
    }



	public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

	

}