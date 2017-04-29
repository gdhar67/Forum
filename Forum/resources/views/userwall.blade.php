@extends('layouts.master')

@section('title')
{{$user->name}}'s Wall
@endsection

@section('content')
          <div class="inner cover">
            <h1 class="cover-heading">{{$user->name}}'s Wall</h1>
          </div>



    @if($user->visibility == "public")
    <div class="col-md-6 col-md-offset-3">
    <?php $flag=0; ?>
    @foreach($post as $post)
      <?php $flag=1; ?>
      @if($post->user_id == $user->id && $post->post_on == "You")
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>Posted by {{ $user->username }} at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
        @else
        @if($post->user_id == $user->id && $post->post_on == Auth::user()->username)
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>{{ $user->username }} posted on Your Wall at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
      @else
        @if($post->user_id == $user->id && $post->post_on != "You" && $post->post_on != Auth::user()->username )
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>{{ $user->username }} posted on {{$post->post_on}}'s Wall at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
      @else
        @if($post->post_by == Auth::user()->username && $post->post_on == $user->username)
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>You posted on {{$post->post_on}}'s Wall at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
        @else
        @if($post->post_by != Auth::user()->username && $post->post_on == $user->username)
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>{{$post->post_by}} posted on {{$post->post_on}}'s Wall at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
        @endif
        @endif
        @endif
        @endif
      @endif
    @endforeach
    @if($flag==0)
    <h2 class="cover-heading">No Posts Available.</h2>
    @endif
    @else
    <h2 class="cover-heading">This Profile Is Private.</h2>
    @endif

    </div>




        <div class="col-md-6 col-md-offset-3">
          <form class="form"  method='post' action="{{ route('postWallSubmitPost') }}">
            <div class="form-group">
            <input type="text" class="form-control" name="post" placeholder="What's On Your Mind?">
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="hidden" name="post_on" value="{{$user->username}}">
            <input type="hidden" name="post_by" value="{{Auth::user()->username}}">
            <button type="submit" class="btn btn-default">Post</button>
          </form>
        </div>




@endsection

