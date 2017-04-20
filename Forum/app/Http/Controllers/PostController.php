<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	public function PostCreatePost(Request $request)
	{
		
		$this->validate($request,[
			'post' =>'required|max:1000']);


		$post = new Post();
		$post->post= $request['post'];
		$post->post_on = 

		$message ='There was an error';

		if($request->user()->posts()->save($post))
		{
			$message ='Post submitted successfully !';
		}

		return redirect()->back()->with(['message'=>$message]);
	}

}