<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header"><?php echo e(__('Create New User\'s')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
			<div class="pull-right">
			 
			  <a class="btn btn-danger" href="<?php echo e(route('admin.userlist')); ?>"> Back</a>
			  
            </div>
           <form method="post" action="<?php echo e(route('admin.douseradd')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <table class="table table-bordered mt-2 table-add-more">
					<tbody>
                        <?php
                            $key = 0;
                        ?>
                        <?php if(request()->old('addmore')): ?>
							<?php
                            $keys = 0;
                        ?>
                            <?php $__currentLoopData = request()->old('addmore'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addmorerq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
								
							<tr>
                                <td>									
								<input id="addmore[<?php echo e($key); ?>][first_name]" type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][first_name]" value="<?php echo e($addmorerq['first_name'] ?? ''); ?>"  autocomplete="first_name" placeholder="<?php echo e(__('First Name')); ?>" />
								
								<?php $__errorArgs = ["addmore.{$key}.first_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger" role="alert">
										<strong><?php echo e($message); ?></strong>
									</span>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

								</td>
								<td>
									
									<input id="addmore[<?php echo e($key); ?>][last_name]" type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][last_name]" value="<?php echo e($addmorerq['last_name'] ?? ''); ?>"  autocomplete="last_name"  placeholder="<?php echo e(__('Last Name')); ?>"/>

									<?php $__errorArgs = ["addmore.{$key}.last_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger" role="alert">
											<strong><?php echo e($message); ?></strong>
										</span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								
								</td>
								<td>
									
									<input id="addmore[<?php echo e($key); ?>][email]" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][email]" value="<?php echo e($addmorerq['email'] ?? ''); ?>"  autocomplete="email" placeholder="<?php echo e(__('Email Address')); ?>">

									<?php $__errorArgs = ["addmore.{$key}.email"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger" role="alert">
											<strong><?php echo e($message); ?></strong>
										</span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</td>
								<td>
									
								<input id="addmore[<?php echo e($key); ?>][date_of_birth]" type="date" class="form-control <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][date_of_birth]" value="<?php echo e($addmorerq['date_of_birth'] ?? ''); ?>"  autocomplete="date_of_birth" placeholder="<?php echo e(__('Date Of Birth')); ?>">

								<?php $__errorArgs = ["addmore.{$key}.date_of_birth"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger" role="alert">
										<strong><?php echo e($message); ?></strong>
									</span>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</td>
								<td>
									<input type='text' id="addmore[<?php echo e($key); ?>][address]" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][address]" placeholder="<?php echo e(__('Address')); ?>" value="<?php echo e($addmorerq['address'] ?? ''); ?>" />

									<?php $__errorArgs = ["addmore.{$key}.address"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger" role="alert">
											<strong><?php echo e($message); ?></strong>
										</span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</td>
								<td>
									<select class="form-control drop-down" name="addmore[<?php echo e($key); ?>][CrCode]" id="addmore[<?php echo e($key); ?>][CrCode]">
									<?php echo e(old('CrCode')); ?>

										<option value="Select Curreny Type">Select Curreny Type</option>
										<?php $__currentLoopData = $currency_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$clist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($clist); ?>"><?php echo e($clist); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>

									<?php $__errorArgs = ["addmore.{$key}.CrCode"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<span class="text-danger" role="alert">
											<strong><?php echo e($message); ?></strong>
										</span>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</td>
								<td>
									<?php if($keys == 0): ?>
										<button class="btn btn-primary btn-sm btn-add-more"><i class="fa fa-plus"></i> Add More</button>
									<?php else: ?>
										<button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i> X </button>
									<?php endif; ?>
									<?php $keys++; ?>
								</td>
						</tr>
						
						
						
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
                            <tr id="<?php echo e($key); ?>">
                                <td>									
								<input id="addmore[<?php echo e($key); ?>][first_name]" type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][first_name]" value="<?php echo e(old('first_name')); ?>"  autocomplete="first_name" placeholder="<?php echo e(__('First Name')); ?>" />

								<?php $__errorArgs = ['first_name'];
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

								</td>
								<td>
									
									<input id="addmore[<?php echo e($key); ?>][last_name]" type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][last_name]" value="<?php echo e(old('last_name')); ?>"  autocomplete="last_name"  placeholder="<?php echo e(__('Last Name')); ?>"/>

									<?php $__errorArgs = ['last_name'];
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
								
								</td>
								<td>
									
									<input id="addmore[<?php echo e($key); ?>][email]" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][email]" value="<?php echo e(old('email')); ?>"  autocomplete="email" placeholder="<?php echo e(__('Email Address')); ?>">

									<?php $__errorArgs = ['email'];
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
								</td>
								<td>
									
								<input id="addmore[<?php echo e($key); ?>][date_of_birth]" type="date" class="form-control <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][date_of_birth]" value="<?php echo e(old('date_of_birth')); ?>"  autocomplete="date_of_birth" placeholder="<?php echo e(__('Date Of Birth')); ?>">

								<?php $__errorArgs = ['date_of_birth'];
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
								</td>
								<td>
									<input type='text' id="addmore[<?php echo e($key); ?>][address]" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="addmore[<?php echo e($key); ?>][address]" placeholder="<?php echo e(__('Address')); ?>" value="<?php echo e(old('address')); ?>" />

									<?php $__errorArgs = ['address'];
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
								</td>
								<td>
									<select class="form-control drop-down" name="addmore[<?php echo e($key); ?>][CrCode]" id="addmore[<?php echo e($key); ?>][CrCode]">
									<?php echo e(old('CrCode')); ?>

										<option value="Select Curreny Type">Select Curreny Type</option>
										<?php $__currentLoopData = $currency_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$clist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($clist); ?>"><?php echo e($clist); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
									
									<?php $__errorArgs = ['CrCode'];
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
								</td>
								<td>
									<button class="btn btn-primary btn-sm btn-add-more"><i class="fa fa-plus"></i>+</button>
								</td>
						</tr>

                        <?php endif; ?>

                    </tbody>
                </table>

                <div class="form-group mt-2 col-md-4">
                    
                </div>
				<div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
								<a class="btn btn-danger" href="<?php echo e(route('admin.userlist')); ?>"> Cancel</a>
								
                            </div>
                        </div>
            </form>

                </div>
				
				
            </div>
        </div>
    </div>
</div>


    
<script type="text/javascript">
    $(document).ready(function(){  

        i = "<?php echo e($key); ?>";
		
        
        $(".btn-add-more").click(function(e){
            e.preventDefault();
            ++i;
            $(".table-add-more").append('<tr id='+i+'><td><input type="text" id="addmore['+i+'][first_name]"name="addmore['+i+'][first_name]" class="form-control" placeholder="First Name" /></td><td><input type="text" id="addmore['+i+'][last_name]"name="addmore['+i+'][last_name]" class="form-control" placeholder="Last Name" /></td><td><input type="email" id="addmore['+i+'][email]" name="addmore['+i+'][email]" class="form-control" placeholder="Email" /></td><td><input type="date" id="addmore['+i+'][date_of_birth]" name="addmore['+i+'][date_of_birth]" class="form-control" placeholder="Date of Birth" /></td><td><input type="text" id="addmore['+i+'][address]"name="addmore['+i+'][address]" class="form-control" placeholder="Address" /></td> <td><select class="form-control drop-down" addmore['+i+'][CrCode]"><option value="Select Curreny Type">Select Currency Type</option><option value="USD">USD</option>                <option value="GBP">GBP</option><option value="EUR">EUR</option></select></td><td><button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i> X </button></td></tr>');
        });

        $(document).on('click', '.btn-add-more-rm', function(){  
            $(this).parents("tr").remove();
        }); 

    });
</script> 

    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/admin/add_users.blade.php ENDPATH**/ ?>