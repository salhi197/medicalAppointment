@extends('layouts.app')

@section('content')
<div class="content" style="transform: none; min-height: 24.6px;">
				<div class="container" style="transform: none;">

					<div class="row" style="transform: none;">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form method="POST" id="form1" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
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
												<button type="submit" class="btn btn-primary submit-btn submit" id="1">Regsiter </button>
											</div>
											<input type="hidden" name="id_medecin" value="{{$id_medecin}}">
											<input type="hidden" name="date" value="{{$date}}">
											<input type="hidden" name="crenau" value="{{$crenau}}">
											<input type="hidden" name="motif" value="{{$motif}}">

											</form>
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
                                        <form id="form2" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
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
												<button type="submit" class="btn btn-primary submit-btn submit" id="2">login</button>
											</div>
											<!-- /Submit Section -->
											</form>
											
										</div>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
						<!-- Booking Summary -->
						<div class="card booking-card">
							<div class="card-header">
								<h4 class="card-title">Booking Summary</h4>
							</div>
							<div class="card-body">
							
								<!-- Booking Doctor Info -->
								<div class="booking-doc-info">
									<a href="doctor-profile.html" class="booking-doc-img">
										<img src="{{asset('img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
									</a>
									<div class="booking-info">
										<h4><a href="doctor-profile.html">Dr. Darren Elder</a></h4>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">35</span>
										</div>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
										</div>
									</div>
								</div>
								<!-- Booking Doctor Info -->
								
								<div class="booking-summary">
									<div class="booking-item-wrap">
										<ul class="booking-date">
											<li>Date <span>{{$date}}</span></li>
											<li>Time <span>{{$crenau}}</span></li>
											<li>Motif : <span>{{$motif}}</span></li>
										</ul>
										
										<div class="booking-total">
											<a href="{{ url()->previous() }}"  class="btn btn-primary">
												Modifier 
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>

				</div>

			</div>
@endsection

@section('scripts')
<script>


$('.submit').on('click',function(){
	event.preventDefault()
	console.log($(this)[0].id)
	if ($(this)[0].id==1) {
		document.getElementById("form1").submit();		
	}else{
		document.getElementById("form2").submit();
	}

})

</script>
@endsection
