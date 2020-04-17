@extends('layouts.app')

@section('content')
<div class="content" style="transform: none; min-height: 24.6px;">
				<div class="container" style="transform: none;">

					<div class="row" style="transform: none;">
						<div class="col-md-12 col-lg-10">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
				                        @csrf
									
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Crer un compte :</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Name</label>
														<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email :</label>
														<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>password : </label>
														<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>confirm password:</label>
														<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
													</div>
												</div>
											</div>
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Regsiter </button>
											</div>
											<input type="hidden" name="id_medecin" value="{{$id_medecin}}">
											<input type="hidden" name="date" value="{{$date}}">
											<input type="hidden" name="crenau" value="{{$crenau}}">
											<input type="hidden" name="motif" value="{{$motif}}">

											</form>
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
                                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                            @csrf
											<h4 class="card-title">Login : </h4>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">E-mail : </label>
															<input type="email" name="email" class="form-control floating">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Password :</label>
															<input type="password" name="password" class="form-control floating">
														</div>
													</div>
												</div>
											</div>
											<!-- /Credit Card Payment -->
											
											
											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
													<input type="hidden" name="id_medecin" value="{{$id_medecin}}">
													<input type="hidden" name="date" value="{{$date}}">
													<input type="hidden" name="crenau" value="{{$crenau}}">
													<input type="hidden" name="motif" value="{{$motif}}">

												</div>
											</div>
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">login</button>
											</div>
											<!-- /Submit Section -->
											</form>
											
										</div>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						
					</div>

				</div>

			</div>
@endsection