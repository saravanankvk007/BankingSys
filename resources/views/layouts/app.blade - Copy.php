<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Role Based Access - Login')</title>
	
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  
  <style>
    .error {
      color: red !important
    }
    .dash{
      
      justify-content: center;
      font-size: 20px;
      font-weight: bold;
      display: flex;
      color:green;
	  align-items: center;
	  gap: 5px;

    }
	.button-container-main {
      display: flex; 
      align-items: center; 
      justify-content: space-between; 
	  margin-top:5px;
	  padding-left: 175px;
	  width:80%;
    }
	.button-container {
      display: flex; 
      align-items: center; 
      justify-content: space-between; 
	  margin-top:5px;
	  
    }

    .dash a {
      text-decoration: none; 
      color: blue; 
	  padding-left: 30px;
    }
	
  </style>
  
</head>
<body>
<div class="button-container-main">
    
        <h3>Custom Middleware - Role Based Access</h3>
    
		<div class="dash">

			@if(\Auth::check())
              You are logged in as  : {{\Auth::user()->name}} ,  <a href="{{url('logout')}}"> Logout</a>
            @endif
		  </div>
  </div>
    <main>
        @yield('content')
    </main>

    <footer>
	
        
    </footer>
</body>
</html>
