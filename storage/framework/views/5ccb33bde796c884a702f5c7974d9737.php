<?php $__env->startSection('content'); ?>

<div class="container">
    <form method="POST" action="<?php echo e(route('login.dotwofaotp')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group row">
            <label for="otp" class="col-sm-4 col-form-label text-md-right">
                OTP
            </label>

            <div class="col-md-6">
                <input id="otp"
                       type="number" min="0" max="999999" step="1"
                       class="form-control<?php echo e($errors->has('otp') ? ' is-invalid' : ''); ?>"
                       autocomplete="off"
                       name="otp" value="" required autofocus>

                <?php if($errors->has('otp')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('otp')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/auth/otp.blade.php ENDPATH**/ ?>