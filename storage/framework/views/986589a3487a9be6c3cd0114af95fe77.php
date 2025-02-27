<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Banking Systems</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
  
  <style>
    .error {
      color: red
    }
	.container {
      margin-top:100px;
    }
  </style>
</head>
<body class="antialiased">
  <div class="container">
    <div class="readersack">
      <div class="container">
        <div class="row">
          <div class="col-md-5 offset-md-3">
            <h3>Login</h3>
            <?php if(\Session::has('success')): ?>
                <div class="alert alert-success">
                    <ul>
                        <li><?php echo \Session::get('success'); ?></li>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="post" id="handleAjax" action="<?php echo e(url('do-login')); ?>" name="postform">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>"  class="form-control" />

                
                <?php echo csrf_field(); ?>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"   class="form-control" />
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">LOGIN</button>
				<a class="btn btn-link" href=""><?php echo e(__('Register')); ?></a>
              </div>
			  
            </form>
          </div>
        </div>
      </div>
    </div>
   
   
  </div>
    
</body>

</html><?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/login.blade.php ENDPATH**/ ?>