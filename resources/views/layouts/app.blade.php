<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Banking System') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
	.pull-right {
		display: flex;
		justify-content: flex-end;
		float:right;
		margin-bottom:5px;
	}
	
  </style>
  
</head>
<body>

<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
			@php
				if (isset(Auth::user()->role) && Auth::user()->role == 'admin'){
					$urls ='admin/home';
				}else if(isset(Auth::user()->role) &&  Auth::user()->role == 'admin') {
					$urls ='user/home';
				}else{
					$urls = '/';
				}
			@endphp
                <a class="navbar-brand" href="{{ url($urls) }}">
					Banking System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
						@php
							//
							
						@endphp
						
						@if(Session::get('twofa_auth_done') == 1)
							
							@if (Auth::user()->role == 'admin')
								<li><a class="nav-link" href="{{route('admin.userlist')}}">Manage Users</a></li>
							@endif
							@if (Auth::user()->role == 'user')
								<li><a class="nav-link" href="{{route('user.makefund_transfer')}}">Make Transfer</a></li>
								<li><a class="nav-link" href="{{route('user.fund_history')}}">Transfer History</a></li>
							@endif
							
						@endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->role }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('logout') }}"
                                       >
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
    </div>
	
<!--<div class="button-container-main">
    
       
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
	
        
    </footer> -->
</body>
</html>
