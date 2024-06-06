@extends('template')
@section('main')
<div class="container mb-4 margin-top-85 min-height">
    <div class="d-flex justify-content-center">
		<div class="p-5 mt-5 mb-5 border w-450">
				<div class="row">
					<h4 class="font-weight-700 text-18">{{ __('Reset Your Password') }}</h4>
				</div>

				@if (Session::has('message'))
					<div class="row mt-5">
							<div class="col-md-12 text-13  alert {{ Session::get('alert-class') }} alert-dismissable fade in opacity-1">
								<a href="#"  class="close " data-dismiss="alert" aria-label="close">&times;</a>
								{{ Session::get('message') }}
							</div>
					</div>
				@endif

				<form method="post" action="{{ url('users/reset_password') }}" id='password-form' class='signup-form login-form' accept-charset='UTF-8'>
					{{ csrf_field() }}
					<input id="id" name="id" type="hidden" value="{{ $result->id }}">
					<input id="token" name="token" type="hidden" value="{{ $token }}">
					<div class="col-sm-12 mt-4">
						<input type="password" class="form-control" id='new_password' name="password" placeholder = "{{ __('New Password') }}">
						@if ($errors->has('password')) <p class="error-tag">{{ $errors->first('password') }}</p> @endif
					</div>

					<div class="col-sm-12 mt-4">
						<input type="password" class="form-control" id='password_confirmation' name="password_confirmation" placeholder = "{{ __('Confirm Password') }}">
						@if ($errors->has('password_confirmation')) <p class="error-tag">{{ $errors->first('password_confirmation') }}</p> @endif
					</div>

					<div class="col-sm-12 mt-4">
						<button class="vrent-button button-reactangular w-100 vbtn-success" type="submit">
						{{ __('Reset Password') }}
						</button>
					</div>
				</form>
		</div>
    </div>
</div>
@endsection

@section('validation_script')

<script type="text/javascript" src="{{ asset('public/js/jquery.validate.min.js') }}"></script>

<script type="text/javascript">
	'use strict'
	let fieldRequirdText = "{{ __('This field is required.') }}";
	let minlengthText = "{{ __('Please enter at least 6 characters.') }}";
	let equalToText = "{{ __('Please enter the same value again.') }}";
	let validEmailText = "{{ __('Please enter a valid email address.') }}";
	let page = 'resetPass';

</script>
<script type="text/javascript" src="{{ asset('public/js/login.min.js') }}"></script>
@endsection

