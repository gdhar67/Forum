<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="{{URL::to('asset1/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('asset1/css/chats.css')}}" rel="stylesheet">
<style>
body {
    font-family: "Lato", sans-serif;
}
#panel {
	
	display: none;

}

#chat-window {
    
    display: block;

}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 15px;
    color: white;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>




<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  @foreach($users as $user)

                    @if(Auth::user()->username != $user->username)

                        <button onclick="myFunction(this)" value="{{$user->username}}" class="btn btn-success"><a>{{ $user -> username }}</a></button><br>


                    @endif
	@endforeach
	
</div>
<div class="col-lg-2 col-lg-offset-0">
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Message</span>
</div>

	    <div id="panel" class="col-lg-4 col-lg-offset-2">
        <h1 id="greeting">Hello, {{Auth::user()->username}}<span id="username"></span></h1>

        <div id="chat-window" class="col-lg-12">
        </div>
        <div class="col-lg-12">
            <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
            <input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">
        </div>
    </div>

    <script src="{{URL::to('asset1/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{URL::to('asset1/js/chats.js')}}"></script>



                 
 <script>
                    var token = '{{ Session::token() }}';
                    var url = '{{ route('getUser') }}';
    </script>
     


    <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function myFunction(objButton) {
    document.getElementById("panel").style.display = "block";
    document.getElementById("chat-window").style.display = "block";
    var name = objButton.value;
    alert(name);

    $.ajax({
        url:url,
        data: { 
                reciever_uname:name,
              }
    });

    
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

                    </script>

   

    <script src="{{ URL::to('asset1/js/app.js') }}"></script>
     
</body>
</html> 
