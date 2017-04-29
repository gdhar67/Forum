<?php
namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
	public function postSubmitPost(Request $request)
	{
		
		$this->validate($request,[
			'post' =>'required|max:1000']);

		$user = Auth::user();
		$post = new Post();
		$post->post= $request['post'];
		$post->post_on = $request['post_on'];
		$post->post_by = $request['post_by']; 
		if($request->hasFile('image'))
		{
		$file = $request->file('image');
		$filename = time(). '-' .$user->id .".jpg";
		Image::make($file)->resize(400,400)->save(public_path('/post_image/' . $filename));
		$post->image = $filename;
		}
		$message ='There was an error';

		if($request->user()->posts()->save($post))
		{
			$message ='Post submitted successfully !';
		}

		return redirect()->back()->with(['message'=>$message]);
	}

	public function postWallSubmitPost(Request $request)
	{
		
		$this->validate($request,[
			'post' =>'required|max:1000']);

		$user = new User();
		$post = new Post();
		$post->post= $request['post'];
		$post->post_on = $request['post_on'];
		$post->post_by = $request['post_by'];
		if($request->hasFile('image'))
		{
		$file = $request->file('image');
		$filename = time(). '-' .$user->id .".jpg";
		Image::make($file)->resize(400,400)->save(public_path('/post_image/' . $filename));
		$post->image = $filename;
		}
		$request->user()->posts()->save($post);
		$name = $request['post_on'];
		$user= User::where('username', $name)->first();
		$posts= Post::orderBy('created_at','desc')->get();

			return view('userwall',['user'=>$user,'post'=>$posts]);		

	}

}