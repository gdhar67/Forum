@extends('layouts.master')

@section('title')
Search Results
@endsection

@section('content')

        <div class="col-md-6 col-md-offset-3">
     @if($user) 
          <form class="form" method="post" action="{{ route('postuserwall') }}">
            <input type="hidden" name="uname" value="{{$user}}">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button type="submit" class="btn btn-default">{{$user}}</button>
          </form>
          
    </div>

    @else
    <div class="inner cover">
            <p class="lead">No Username Matches With the username you typed! <br>Try Again</p>
    </div>
    @endif

@endsection


