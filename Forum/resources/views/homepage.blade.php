@extends('layouts.master')

@section('title')
HomePage
@endsection

@section('content')

    <div class="col-md-6 col-md-offset-3">
    <?php $flag=0; ?>
    @foreach($post as $post)
      <?php $flag=1; ?>
      @if($post->user_id == Auth::user()->id && $post->post_on == "You")
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>Posted by {{ $post->post_on }} on Your Wall at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
        @else
        @if($post->user_id == Auth::user()->id && $post->post_on != "You")
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>You posted on {{ $post->post_on }}'s wall at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
        @else
        @if($post->post_on == Auth::user()->username)
        <blockquote align="left">
        <p>POST : {{$post->post}}</p>
        @if($post->image)
        <img src="/post_image/{{$post->image}}">
        @endif
        </br>
        <footer>{{$post->post_by}} posted on Your wall at <cite title="Source Title">{{ $post->created_at}}</cite></footer><br>
        </blockquote>
        @endif
        @endif
      @endif
    @endforeach
    @if($flag==0)
    <h2 class="cover-heading">No Posts Available.</h2>
    @endif
    </div>




        <div class="col-md-6 col-md-offset-3">
          <form class="form"  method='post' action="{{ route('postSubmitPost') }}" enctype="multipart/form-data">
            <div class="form-group">
            <input type="text" class="form-control" name="post" placeholder="What's On Your Mind?">
            </div>
            <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <input type="hidden" name="post_on" value="You">
            <input type="hidden" name="post_by" value="{{Auth::user()->username}}">
            <button type="submit" class="btn btn-default">Post</button>
          </form>
        </div>

@endsection


