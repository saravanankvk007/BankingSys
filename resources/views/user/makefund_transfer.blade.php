@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Make Fund Transfer') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
					
					<div class="pull-right">
					  <a class="btn btn-danger" href="{{ route('user.home') }}"> Back</a>
					</div>
					<br>
					<br>
					
						<form method="POST" action="{{ route('user.domakefundtransfer') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="row mb-3">
                            <label for="sender_accnum" class="col-md-4 col-form-label text-md-end">{{ __('Sender Account Number') }}</label>

                            <div class="col-md-6">
								{{	$users[0]->UserDetails->account_number	}}
                                <input id="sender_accnum" type="hidden" class="form-control @error('sender_accnum') is-invalid @enderror" name="sender_accnum" value="{{ $users[0]->UserDetails->account_number }}"  autocomplete="off" />
									
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="sender_currencycode" class="col-md-4 col-form-label text-md-end">{{ __('Final or Current Balance') }}</label>

                            <div class="col-md-6">
								{{	$users[0]->UserDetails->final_balance	}}	({{$users[0]->UserDetails->currency_code}})
                                <input id="sender_currencycode" type="hidden" class="form-control @error('sender_currencycode') is-invalid @enderror" name="sender_currencycode" value="{{ $users[0]->UserDetails->currency_code }}"  autocomplete="off" />
									
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="recipient_accnum" class="col-md-4 col-form-label text-md-end">{{ __('Recipient Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="recipient_accnum" type="text" class="form-control @error('recipient_accnum') is-invalid @enderror" name="recipient_accnum" value="{{ old('recipient_accnum') }}"  autocomplete="recipient_accnum" />

                                @error('recipient_accnum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="row mb-3" >
                            <label for="transfer_amount" class="col-md-4 col-form-label text-md-end">{{ __('Transfer Amount') }}</label>

                            <div class="col-md-6">
                                <input id="transfer_amount" type="text" class="form-control @error('transfer_amount') is-invalid @enderror" name="transfer_amount" value="{{ old('transfer_amount') }}"  autocomplete="off">

                                @error('transfer_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="currencytype" class="col-md-4 col-form-label text-md-end">{{ __('Currency Type') }}</label>
							
                            <div class="col-md-6">
                                <select class="form-control drop-down" name="currencytype" id="currencytype">
								{{ old('currencytype') }}
									<option value="Select Curreny Type">Select Curreny Type</option>
									@foreach($currency_list as $key=>$clist)
											<option value="{{ $clist }}">{{ $clist }}</option>
									@endforeach
								</select>

                                    <span class="text-danger" role="alert">
                                        @error('currencytype') {{ $message }} @enderror
                                    </span>
                                
                            </div>
                        </div>
						
						<div class="row mb-3 d-none" id="convertcurrency">
                            <label for="currency_convertion" class="col-md-4 col-form-label text-md-end">{{ __('Currency Convertion Amount') }}</label>

                            <div class="col-md-6">
                                <input id="currency_convertion_amount" type="text" class="form-control @error('currency_convertion_amount') is-invalid @enderror" name="currency_convertion_amount" value="{{ old('currency_convertion') }}"  autocomplete="currency_convertion_amount">
                            </div>
                        </div>
						
						<div class="row mb-3 d-none" id="convertcurrencynot">
                            <label for="currency_convertionnot" class="col-md-4 col-form-label text-md-end">{{ __('Currency Convertion') }}</label>

                            <div class="col-md-6"><p id='convertcurrencynotapp'></p></div>
                        </div>
						
						
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Make Transfer') }}
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



@endsection