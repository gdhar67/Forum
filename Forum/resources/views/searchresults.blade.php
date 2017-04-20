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

    <title>Search Result</title>

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
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{  route('Homepage')  }}">Home</a></li>
            <li class="active"><a href="{{  route('Profilepage')  }}">Profile</a></li>
            <li class="active"><a href="{{  route('logout')  }}">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right" method='post' action="{{ route('postsearch') }}">
            <div class="form-group">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search">
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

          
          <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>
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
