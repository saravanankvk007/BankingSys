<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Banking System')); ?></title>

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
			<?php
				if (isset(Auth::user()->role) && Auth::user()->role == 'admin'){
					$urls ='admin/home';
				}else if(isset(Auth::user()->role) &&  Auth::user()->role == 'admin') {
					$urls ='user/home';
				}else{
					$urls = '/';
				}
			?>
                <a class="navbar-brand" href="<?php echo e(url($urls)); ?>">
					Banking System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
						<?php
							//
							
						?>
						
						<?php if(Session::get('twofa_auth_done') == 1): ?>
							
							<?php if(Auth::user()->role == 'admin'): ?>
								<li><a class="nav-link" href="<?php echo e(route('admin.userlist')); ?>">Manage Users</a></li>
							<?php endif; ?>
							<?php if(Auth::user()->role == 'user'): ?>
								<li><a class="nav-link" href="<?php echo e(route('user.makefund_transfer')); ?>">Make Transfer</a></li>
								<li><a class="nav-link" href="<?php echo e(route('user.fund_history')); ?>">Transfer History</a></li>
							<?php endif; ?>
							
						<?php endif; ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->role); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(url('logout')); ?>"
                                       >
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
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
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
    </div>
	
<!--<div class="button-container-main">
    
       
		<div class="dash">

			<?php if(\Auth::check()): ?>
              You are logged in as  : <?php echo e(\Auth::user()->name); ?> ,  <a href="<?php echo e(url('logout')); ?>"> Logout</a>
            <?php endif; ?>
		  </div>
  </div>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
	
        
    </footer> -->
</body>
</html>
<?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/layouts/app.blade.php ENDPATH**/ ?>