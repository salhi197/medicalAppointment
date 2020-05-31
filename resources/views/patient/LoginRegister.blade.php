@extends('layouts.app')

@section('content')

<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">vous etes nouveau à tebibe</h4>
											<a href="{{route('register.patient')}}" class="btn btn-primary submit-btn">Nouveau sur Doctolib ?</a>
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Vous avez déja un compte</h4>
											
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-8">
												<a href="{{route('login.patient')}}" class="btn btn-primary submit-btn">se connecter</a>
											</div>
											<!-- /Submit Section -->
											
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
												<li>Date <span>16 Nov 2019</span></li>
												<li>Time <span>10:00 AM</span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>$100</span></li>
												<li>Booking Fee <span>$10</span></li>
												<li>Video Call <span>$50</span></li>
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">$160</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		



@endsection





@section('scripts')
<script>


</script>
@endsection