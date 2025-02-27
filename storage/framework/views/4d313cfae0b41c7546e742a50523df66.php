<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">2-factors authentication</div>

    <div class="card-body">
        <p>
          2-factors authentication is currently
          <span class='badge bg-warning'>disabled</span>. To enable:
        </p>

        <ol class="list-left-align">
            <li>Open your OTP app and <b>scan the following QR-code</b>
                <p class="text-center">
				
				<?php echo $qr_code; ?>

                    
                </p>
            </li>

            <li>Generate a One Time Password (OTP) and enter the value below.

                <form action="<?php echo e(route('login.dotwoauth')); ?>" method="POST"
                      class="form-inline text-center">
                    <?php echo csrf_field(); ?>
                    <input name="otp" class="form-control mr-1<?php echo e($errors->has('otp') ? ' is-invalid' : ''); ?>"
                           type="number" min="0" max="999999" step="1"
                           required autocomplete="off">
                    <button type="submit" class="form-control btn-sm btn-primary">Submit</button>
                    <?php if($errors->has('otp')): ?>
                    <span class="invalid-feedback text-left">
                        <strong><?php echo e($errors->first('otp')); ?></strong>
                    </span>
                    <?php endif; ?>
                </form>
            </li>
        </ol>

    </div>
</div>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/auth/2fa.blade.php ENDPATH**/ ?>