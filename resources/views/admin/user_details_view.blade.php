@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __(ucfirst($users[0]->UserDetails->first_name).' '.ucfirst($users[0]->UserDetails->last_name)) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
			<div class="pull-right">
			 
			  <a class="btn btn-danger" href="{{ route('admin.userlist') }}"> Back</a>
			  
            </div>
			<br>
			<br>
					<div class="card-header">{{ __('Personal Detail') }}</div>
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
							<td>{{ $FinalBalanceRec }}</td>
							
						</tr>
						@php $i++; @endphp
						@endforeach
					</table>

					
				<div class="card-header">{{ __('Transation History (Fund Transfer)') }}</div>
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
						@php $i = 1; 
							//print_r($userDetails->sentTransfers);
							//print_r($userDetails->receivedTransfers);
						@endphp
						@if(count($userDetails->receivedTransfers) > 0 || count($userDetails->sentTransfers) > 0)
						@foreach ($userDetails->receivedTransfers as $key=>$value)
						<tr>
						   <td> {{ $i }}</td>
						   <td>{{ $value->trf_frm_accountnumber}}</td>
							<td>{{ $value->trf_to_accountnumber }}</td>
							<td>{{ $value->trf_currency_code }}</td>
							<td>{{ $value->trf_amount }}</td>
							<td>{{ __('-') }}</td>
							<td>{{ $value->trf_date }}</td>
							<td>{{ ($value->trf_status == 1 ? 'Success' : 'Un-success') }}</td>
							
						</tr>
						
						
						@php $i++; @endphp
						@endforeach
						
						@foreach ($userDetails->sentTransfers as $key=>$value)
						<tr>
						   <td> {{ $i }}</td>
						   <td>{{ $value->trf_frm_accountnumber}}</td>
							<td>{{ $value->trf_to_accountnumber }}</td>
							<td>{{ $value->trf_currency_code }}</td>
							<td>{{ __('-') }}</td>
							<td>{{ $value->trf_amount }}</td>
							<td>{{ $value->trf_date }}</td>
							<td>{{ ($value->trf_status == 1 ? 'Success' : 'Un-success') }}</td>
							
						</tr>
						
						
						@php $i++; @endphp
						@endforeach
						<tr>
							<td colspan='4'> Total</td>
							<td>{{ $FinalBalanceCrt }}</td>
							<td>{{ $FinalBalanceDpt }}</td>
							<td colspan='3'></td>
							
							
						</tr>
						@else 
								<tr>
								   <td colspan='8'>{{ __('No Data Found') }} </td>
									
								</tr>
						@endif
					</table>

	
                </div>
				
				
            </div>
        </div>
    </div>
</div>


    


    


@endsection