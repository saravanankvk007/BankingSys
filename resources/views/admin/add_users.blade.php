@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __('Create New User\'s') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
			<div class="pull-right">
			 
			  <a class="btn btn-danger" href="{{ route('admin.userlist') }}"> Back</a>
			  
            </div>
           <form method="post" action="{{ route('admin.douseradd') }}" enctype="multipart/form-data">
                @csrf

                <table class="table table-bordered mt-2 table-add-more">
					<tbody>
                        @php
                            $key = 0;
                        @endphp
                        @if(request()->old('addmore'))
							@php
                            $keys = 0;
                        @endphp
                            @foreach(request()->old('addmore') as $key => $addmorerq)
						
								
							<tr>
                                <td>									
								<input id="addmore[{{$key}}][first_name]" type="text" class="form-control @error('first_name') is-invalid @enderror" name="addmore[{{$key}}][first_name]" value="{{ $addmorerq['first_name'] ?? '' }}"  autocomplete="first_name" placeholder="{{ __('First Name') }}" />
								
								@error("addmore.{$key}.first_name")
									<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								</td>
								<td>
									
									<input id="addmore[{{$key}}][last_name]" type="text" class="form-control @error('last_name') is-invalid @enderror" name="addmore[{{$key}}][last_name]" value="{{ $addmorerq['last_name'] ?? '' }}"  autocomplete="last_name"  placeholder="{{ __('Last Name') }}"/>

									@error("addmore.{$key}.last_name")
									<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								
								</td>
								<td>
									
									<input id="addmore[{{$key}}][email]" type="email" class="form-control @error('email') is-invalid @enderror" name="addmore[{{$key}}][email]" value="{{ $addmorerq['email'] ?? ''}}"  autocomplete="email" placeholder="{{ __('Email Address') }}">

									@error("addmore.{$key}.email")
									<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</td>
								<td>
									
								<input id="addmore[{{$key}}][date_of_birth]" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="addmore[{{$key}}][date_of_birth]" value="{{ $addmorerq['date_of_birth'] ?? '' }}"  autocomplete="date_of_birth" placeholder="{{ __('Date Of Birth') }}">

								@error("addmore.{$key}.date_of_birth")
									<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								</td>
								<td>
									<input type='text' id="addmore[{{$key}}][address]" class="form-control @error('address') is-invalid @enderror" name="addmore[{{$key}}][address]" placeholder="{{ __('Address') }}" value="{{ $addmorerq['address'] ?? '' }}" />

									@error("addmore.{$key}.address")
									<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</td>
								<td>
									<select class="form-control drop-down" name="addmore[{{$key}}][CrCode]" id="addmore[{{$key}}][CrCode]">
									{{ old('CrCode') }}
										<option value="Select Curreny Type">Select Curreny Type</option>
										@foreach($currency_list as $key=>$clist)
												<option value="{{ $clist }}">{{ $clist }}</option>
										@endforeach
									</select>

									@error("addmore.{$key}.CrCode")
									<span class="text-danger" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</td>
								<td>
									@if($keys == 0)
										<button class="btn btn-primary btn-sm btn-add-more"><i class="fa fa-plus"></i> Add More</button>
									@else
										<button class="btn btn-danger btn-sm btn-add-more-rm"><i class="fa fa-trash"></i> X </button>
									@endif
									@php $keys++; @endphp
								</td>
						</tr>
						
						
						
							@endforeach
						@else
                            <tr id="{{$key}}">
                                <td>									
								<input id="addmore[{{$key}}][first_name]" type="text" class="form-control @error('first_name') is-invalid @enderror" name="addmore[{{$key}}][first_name]" value="{{ old('first_name') }}"  autocomplete="first_name" placeholder="{{ __('First Name') }}" />

								@error('first_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								</td>
								<td>
									
									<input id="addmore[{{$key}}][last_name]" type="text" class="form-control @error('last_name') is-invalid @enderror" name="addmore[{{$key}}][last_name]" value="{{ old('last_name') }}"  autocomplete="last_name"  placeholder="{{ __('Last Name') }}"/>

									@error('last_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								
								</td>
								<td>
									
									<input id="addmore[{{$key}}][email]" type="email" class="form-control @error('email') is-invalid @enderror" name="addmore[{{$key}}][email]" value="{{ old('email') }}"  autocomplete="email" placeholder="{{ __('Email Address') }}">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</td>
								<td>
									
								<input id="addmore[{{$key}}][date_of_birth]" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="addmore[{{$key}}][date_of_birth]" value="{{ old('date_of_birth') }}"  autocomplete="date_of_birth" placeholder="{{ __('Date Of Birth') }}">

								@error('date_of_birth')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								</td>
								<td>
									<input type='text' id="addmore[{{$key}}][address]" class="form-control @error('address') is-invalid @enderror" name="addmore[{{$key}}][address]" placeholder="{{ __('Address') }}" value="{{ old('address') }}" />

									@error('address')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</td>
								<td>
									<select class="form-control drop-down" name="addmore[{{$key}}][CrCode]" id="addmore[{{$key}}][CrCode]">
									{{ old('CrCode') }}
										<option value="Select Curreny Type">Select Curreny Type</option>
										@foreach($currency_list as $key=>$clist)
												<option value="{{ $clist }}">{{ $clist }}</option>
										@endforeach
									</select>
									
									@error('CrCode')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</td>
								<td>
									<button class="btn btn-primary btn-sm btn-add-more"><i class="fa fa-plus"></i>+</button>
								</td>
						</tr>

                        @endif

                    </tbody>
                </table>

                <div class="form-group mt-2 col-md-4">
                    
                </div>
				<div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
								<a class="btn btn-danger" href="{{ route('admin.userlist') }}"> Cancel</a>
								
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

        i = "{{$key}}";
		
        
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

    


@endsection