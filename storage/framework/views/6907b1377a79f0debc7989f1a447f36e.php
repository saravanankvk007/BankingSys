<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Make Fund Transfer')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    
					
					<div class="pull-right">
					  <a class="btn btn-danger" href="<?php echo e(route('user.home')); ?>"> Back</a>
					</div>
					<br>
					<br>
					
						<form method="POST" action="<?php echo e(route('user.domakefundtransfer')); ?>" enctype="multipart/form-data" >
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="sender_accnum" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Sender Account Number')); ?></label>

                            <div class="col-md-6">
								<?php echo e($users[0]->UserDetails->account_number); ?>

                                <input id="sender_accnum" type="hidden" class="form-control <?php $__errorArgs = ['sender_accnum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sender_accnum" value="<?php echo e($users[0]->UserDetails->account_number); ?>"  autocomplete="off" />
									
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="sender_currencycode" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Final or Current Balance')); ?></label>

                            <div class="col-md-6">
								<?php echo e($users[0]->UserDetails->final_balance); ?>	(<?php echo e($users[0]->UserDetails->currency_code); ?>)
                                <input id="sender_currencycode" type="hidden" class="form-control <?php $__errorArgs = ['sender_currencycode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sender_currencycode" value="<?php echo e($users[0]->UserDetails->currency_code); ?>"  autocomplete="off" />
									
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="recipient_accnum" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Recipient Account Number')); ?></label>

                            <div class="col-md-6">
                                <input id="recipient_accnum" type="text" class="form-control <?php $__errorArgs = ['recipient_accnum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="recipient_accnum" value="<?php echo e(old('recipient_accnum')); ?>"  autocomplete="recipient_accnum" />

                                <?php $__errorArgs = ['recipient_accnum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

						<div class="row mb-3" >
                            <label for="transfer_amount" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Transfer Amount')); ?></label>

                            <div class="col-md-6">
                                <input id="transfer_amount" type="text" class="form-control <?php $__errorArgs = ['transfer_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="transfer_amount" value="<?php echo e(old('transfer_amount')); ?>"  autocomplete="off">

                                <?php $__errorArgs = ['transfer_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="currencytype" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Currency Type')); ?></label>
							
                            <div class="col-md-6">
                                <select class="form-control drop-down" name="currencytype" id="currencytype">
								<?php echo e(old('currencytype')); ?>

									<option value="Select Curreny Type">Select Curreny Type</option>
									<?php $__currentLoopData = $currency_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$clist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($clist); ?>"><?php echo e($clist); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>

                                    <span class="text-danger" role="alert">
                                        <?php $__errorArgs = ['currencytype'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                
                            </div>
                        </div>
						
						<div class="row mb-3 d-none" id="convertcurrency">
                            <label for="currency_convertion" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Currency Convertion Amount')); ?></label>

                            <div class="col-md-6">
                                <input id="currency_convertion_amount" type="text" class="form-control <?php $__errorArgs = ['currency_convertion_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="currency_convertion_amount" value="<?php echo e(old('currency_convertion')); ?>"  autocomplete="currency_convertion_amount">
                            </div>
                        </div>
						
						<div class="row mb-3 d-none" id="convertcurrencynot">
                            <label for="currency_convertionnot" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Currency Convertion')); ?></label>

                            <div class="col-md-6"><p id='convertcurrencynotapp'></p></div>
                        </div>
						
						
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Make Transfer')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function() {
		$('#currencytype').on('change', function() {
			var currencytype = $(this).val();
			var scid = document.getElementById('sender_currencycode').value;
			var tamount = document.getElementById('transfer_amount').value;
			if (currencytype && tamount) {
				$.ajax({
					url: '/user/getcurrenyConvert/' + currencytype+'/'+scid+'/'+tamount,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						
						
						$.each(data, function(key, valu) {
							if(key == 'Error'){
								document.getElementById('convertcurrency').setAttribute('class', 'row mb-3');
								document.getElementById('convertcurrency').setAttribute('class', 'row mb-3 d-none');
								//document.getElementById('currency_convertion').value = '';
								
								document.getElementById('convertcurrencynot').setAttribute('class', 'row mb-3');
								document.getElementById('convertcurrencynotapp').innerHTML = valu;
								
							}else{
							document.getElementById('convertcurrencynot').setAttribute('class', 'row mb-3 d-none');
							document.getElementById('convertcurrencynotapp').innerHTML = '';
							
							document.getElementById('convertcurrency').setAttribute('class', 'row mb-3');
							document.getElementById('currency_convertion_amount').value = valu;
							document.getElementById('currency_convertion_amount').readOnly = true;
							
							console.log(key+'--'+valu);
							
							}
						});
					}
				});
			} else {
				$('#result').empty().append('<option value="">Select Data</option>');
			}
		});
	});
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/user/makefund_transfer.blade.php ENDPATH**/ ?>