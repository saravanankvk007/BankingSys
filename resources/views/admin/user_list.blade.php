@extends('layouts.app')
@section('content')


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __('Manage User\'s List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					@if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
				<div>
					
				<form method="GET" action="{{ route('admin.userlist') }}" class="mb-4">
				  
					<div class="row">
						<div class="col-md-2">
							<input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('name') }}">
						</div>
						<div class="col-md-3">
							<input type="text" name="account_number" class="form-control" placeholder="Search by Account Number" value="{{ request('account_number') }}">
						</div>
						<div class="col-md-3">
							<input type="number" name="balance" class="form-control" placeholder="Minimum Balance" value="{{ request('balance') }}">
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-primary">Search</button>
							<a href="{{ route('admin.userlist') }}" class="btn btn-secondary">Reset</a>
							 <a class="btn btn-success" href="{{ route('admin.useradd') }}"> Create New Users</a>
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
						@php $i = 1; @endphp
						@foreach ($users as $key=>$value)
						<tr>
						   <td> {{ $i }}</td>
							<td>{{ $value->UserDetails->account_number }}</td>
							<td>{{ $value->UserDetails->first_name }}</td>
							<td>{{ $value->UserDetails->last_name }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ date('d-M-Y', strtotime($value->UserDetails->dob)) }}</td>
							<td>{{ $value->UserDetails->currency_code }}</td>
							<td>{{ $value->UserDetails->open_balance }}</td>
							<td>{{ $value->UserDetails->final_balance }}</td>
							<td>
								<form action="" method="POST">
									<a class="btn btn-info" href="{{route('admin.showuserFullDetails',['id' => $value->UserDetails->user_id, 'accnum'=>$value->UserDetails->account_number])}}">Show</a>
									<a class="btn btn-primary" href=""></a> 


									@csrf
								</form>
							</td>
						</tr>
						@php $i++; @endphp
						@endforeach
					</table>

					{!! $users->links('pagination::bootstrap-5') !!}
					@php
						
					@endphp
                </div>
				
				
            </div>
        </div>
    </div>
</div>


    


    


@endsection