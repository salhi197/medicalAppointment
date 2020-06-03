@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">

	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<div>{{$error}}</div>
		@endforeach
	@endif
							
	<!-- Login Tab Content -->
	<div class="account-content">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 col-lg-6 login-left">
					<img src="{{asset('img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">	
			</div>
			<div class="col-md-12 col-lg-6 login-right">
					<div class="login-header">
						<h3>Login <span>patient</span></h3>
					</div>

                    @isset($url)
                 <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                     <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                    @csrf

					<div class="form-group form-focus">
						<input type="email" name="email" class="form-control floating" style=" border: 1px solid #15558d;">
						<label class="focus-label">Email</label>
					</div>
					<div class="form-group form-focus">
						<input type="password" name="password" class="form-control floating" style=" border: 1px solid #15558d;">
						<label class="focus-label">Mot de passe</label>
					</div>
					<div class="text-right">
						<a class="forgot-link" href="forgot-password.html">Mot de passe oublié ?</a>
					</div>

					<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
						
					<div class="login-or">
						<span class="or-line"></span>
						<span class="span-or">OU</span>
					</div>
					
					@isset($url)
					<div class="text-center dont-have">Nouveau sur Tebibe ? <a href="{{route('register')}}">S'inscrire</a></div>
					@else
				    <div class="text-center dont-have">Nouveau sur Tebibe ? <a href="{{route('register')}}">S'inscrire</a></div>
				    @endisset
											
				</form>
			</div>
		</div>
	</div>
   </div>
</div>

@endsection
