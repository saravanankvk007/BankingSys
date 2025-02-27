<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header"><?php echo e(__(ucfirst($users[0]->UserDetails->first_name).' '.ucfirst($users[0]->UserDetails->last_name))); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
			<div class="pull-right">
			 
			  <a class="btn btn-danger" href="<?php echo e(route('admin.userlist')); ?>"> Back</a>
			  
            </div>
			<br>
			<br>
					<div class="card-header"><?php echo e(__('Personal Detail')); ?></div>
					<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Account Number</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th width="170px">Date of Birth</th>
							<th>Currency Code</th>
							<th>Opening Balance</th>
							<th>Final Balance</th>
						</tr>
						<?php $i = 1; ?>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
						   <td> <?php echo e($i); ?></td>
							<td><?php echo e($value->UserDetails->account_number); ?></td>
							<td><?php echo e($value->UserDetails->first_name); ?></td>
							<td><?php echo e($value->UserDetails->last_name); ?></td>
							<td><?php echo e($value->email); ?></td>
							<td><?php echo e(date('d-M-Y', strtotime($value->UserDetails->dob))); ?></td>
							<td><?php echo e($value->UserDetails->currency_code); ?></td>
							<td><?php echo e($value->UserDetails->open_balance); ?></td>
							<td><?php echo e($FinalBalanceRec); ?></td>
							
						</tr>
						<?php $i++; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>

					
				<div class="card-header"><?php echo e(__('Transation History (Fund Transfer)')); ?></div>
					<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>From A/C Number</th>
							<th>To A/C Number</th>
							<th>Currency Code</th>
							<th>Credit Amount</th>
							<th>Debit Amount</th>
							<th>Date</th>
							<th>Status</th>
						</tr>
						<?php $i = 1; 
							//print_r($userDetails->sentTransfers);
							//print_r($userDetails->receivedTransfers);
						?>
						<?php if(count($userDetails->receivedTransfers) > 0 || count($userDetails->sentTransfers) > 0): ?>
						<?php $__currentLoopData = $userDetails->receivedTransfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
						   <td> <?php echo e($i); ?></td>
						   <td><?php echo e($value->trf_frm_accountnumber); ?></td>
							<td><?php echo e($value->trf_to_accountnumber); ?></td>
							<td><?php echo e($value->trf_currency_code); ?></td>
							<td><?php echo e($value->trf_amount); ?></td>
							<td><?php echo e(__('-')); ?></td>
							<td><?php echo e($value->trf_date); ?></td>
							<td><?php echo e(($value->trf_status == 1 ? 'Success' : 'Un-success')); ?></td>
							
						</tr>
						
						
						<?php $i++; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						<?php $__currentLoopData = $userDetails->sentTransfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
						   <td> <?php echo e($i); ?></td>
						   <td><?php echo e($value->trf_frm_accountnumber); ?></td>
							<td><?php echo e($value->trf_to_accountnumber); ?></td>
							<td><?php echo e($value->trf_currency_code); ?></td>
							<td><?php echo e(__('-')); ?></td>
							<td><?php echo e($value->trf_amount); ?></td>
							<td><?php echo e($value->trf_date); ?></td>
							<td><?php echo e(($value->trf_status == 1 ? 'Success' : 'Un-success')); ?></td>
							
						</tr>
						
						
						<?php $i++; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td colspan='4'> Total</td>
							<td><?php echo e($FinalBalanceCrt); ?></td>
							<td><?php echo e($FinalBalanceDpt); ?></td>
							<td colspan='3'></td>
							
							
						</tr>
						<?php else: ?> 
								<tr>
								   <td colspan='8'><?php echo e(__('No Data Found')); ?> </td>
									
								</tr>
						<?php endif; ?>
					</table>

	
                </div>
				
				
            </div>
        </div>
    </div>
</div>


    


    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/admin/user_details_view.blade.php ENDPATH**/ ?>