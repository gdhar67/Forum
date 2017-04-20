<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="{{  URL::to('asset/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{  URL::to('asset/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{  URL::to('asset/css/navbar-fixed-top.css')}}" rel="stylesheet">
    <link href="{{  URL::to('asset/css/cover.css')}}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{  URL::to('asset/js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" >SHARING</a>
          <a class="navbar-brand" >HI! {{ Auth::user()->name}}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse"  method='post' action="{{ route('postsearch') }}">
          <form class="navbar-form navbar-right">
            <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search">
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{  route('Homepage')  }}">Home</a></li>
            <li class="active"><a href="{{  route('Profilepage')  }}">Profile</a></li>
            <li class="active"><a href="{{  route('logout')  }}">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

        </div>

      </div>

    </div>


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
   



















    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="vendor/jquery.min.js"><\/script>')</script>
    <script src="{{  URL::to('asset/js/bootstrap.min.js')  }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{  URL::to('asset/js/ie10-viewport-bug-workaround.js')}}"></script>
  </body>
</html>
