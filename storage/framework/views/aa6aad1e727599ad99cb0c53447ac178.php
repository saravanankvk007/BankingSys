<?php $__env->startSection('content'); ?>


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header"><?php echo e(__('Manage User\'s List')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
					<?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
				<div>
					
				<form method="GET" action="<?php echo e(route('admin.userlist')); ?>" class="mb-4">
				  
					<div class="row">
						<div class="col-md-2">
							<input type="text" name="name" class="form-control" placeholder="Search by Name" value="">
						</div>
						<div class="col-md-3">
							<input type="text" name="account_number" class="form-control" placeholder="Search by Account Number" value="">
						</div>
						<div class="col-md-3">
							<input type="number" name="balance" class="form-control" placeholder="Minimum Balance" value="">
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-primary">Search</button>
							<a href="<?php echo e(route('admin.userlist')); ?>" class="btn btn-secondary">Reset</a>
							 <a class="btn btn-success" href="<?php echo e(route('admin.useradd')); ?>"> Create New Users</a>
						</div>
						
					</div>
				</form>
				</div>
			
					
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
							<th width="120px">Action</th>
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
							<td><?php echo e($value->UserDetails->final_balance); ?></td>
							<td>
								<form action="" method="POST">
									<a class="btn btn-info" href="<?php echo e(route('admin.showuserFullDetails',['id' => $value->UserDetails->user_id, 'accnum'=>$value->UserDetails->account_number])); ?>">Show</a>
									<a class="btn btn-primary" href=""></a> 


									<?php echo csrf_field(); ?>
								</form>
							</td>
						</tr>
						<?php $i++; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>

					<?php echo $users->links('pagination::bootstrap-5'); ?>

					<?php
						
					?>
                </div>
				
				
            </div>
        </div>
    </div>
</div>


    


    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-MyTesting-Learn\BankingSys\resources\views/admin/user_list.blade.php ENDPATH**/ ?>