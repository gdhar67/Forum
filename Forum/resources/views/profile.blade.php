@extends('layouts.master')

@section('title')
Profile
@endsection

@section('content')

  <section class="row new-post">
     <div class="col-md-6 col-md-offset-3">
     <header><h3>Your Account</h3></header>
          
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
            <h4 align="left">Profile Picture :

            @if (Storage::disk('local')->has(Auth::user()->name . '-' . Auth::user()->id . '.jpg'))
                <img src="{{ route('account.image', ['filename' => Auth::user()->name . '-' . Auth::user()->id . '.jpg']) }}" alt="" class="img-responsive">
                </h4>
                @else
                Update Your Profile Picture</h4>
                @endif
                <h4 align="left">Name :
                @if(Auth::user()->name)
                {{Auth::user()->name}}
                @endif
                </h4>
                <h4 align="left">Description :
                @if(Auth::user()->description)
                {{Auth::user()->description}}
                @else
                Please Update Your Profile.
                @endif
                </h4>
            </div>
        </section>
    

            <br><br><br>
            <header><h3>Edit Your Profile</h3></header>
            <form action="{{route('account.save')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" id="name">
                </div>
                <div class="form-group">
                    <label for="name">About you</label>
                    <input type="text" name="description" class="form-control" value="{{Auth::user()->description}}" id="description">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
   





@endsection
