@extends('layouts.app')

@section('content')
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">2245 matches found for : Dentist In Bangalore</h2>
							<h2 class="breadcrumb-title">{{$query}}</h2>
							
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="content ">
				<div class="container-fluid" >

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Search Filter -->
							<div class="card search-filter" style=" border: 1px solid #15558d;">
								<div class="card-header">
									<h4 class="card-title mb-0">Filtrer les résultats</h4>
								</div>
								<div class="card-body">
                                    <div class="filter-widget" >
                                        <h4>Code postal</h4>
                                        <div >
                                            <input type="text" class="form-control"
                                                   style=" border: 1px solid #15558d;"
                                                     placeholder="Exemple : 16058 ">
                                        </div>
                                    </div>
								<div class="filter-widget">
									<h4>Sexe</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type" checked>
											<span class="checkmark"></span> Médecin homme
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Médecin femme
										</label>
									</div>
								</div>
								<div class="filter-widget">
									<h4>Sélectionner une spécialitée</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_specialist" checked>
											<span class="checkmark"></span> Urology
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_specialist" checked>
											<span class="checkmark"></span> Neurology
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_specialist">
											<span class="checkmark"></span> Dentist
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_specialist">
											<span class="checkmark"></span> Orthopedic
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_specialist">
											<span class="checkmark"></span> Cardiologist
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="select_specialist">
											<span class="checkmark"></span> Cardiologist
										</label>
									</div>
								</div>
									<div class="btn-search">
										<button type="button" class="btn btn-primary btn-sm">Chercher</button>
									</div>
								</div>
							</div>
							<!-- /Search Filter -->

						</div>

						<div class="col-md-12 col-lg-8 col-xl-9">

							<!-- Doctor Widget -->
							@foreach(['2','2'] as $s)
							<div class="card" style=" border: 1px solid #15558d;">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="doctor-profile.html">
													<img src="{{asset('img/doctors/doctor-thumb-01.jpg')}}" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="doctor-profile.html">Dr. Ruby Perrin</a></h4>
												<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
												<h5 class="doc-department"><img src="{{asset('img/specialities/specialities-05.png')}}" class="img-fluid" alt="Speciality">Dentist</h5>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">(17)</span>
												</div>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Florida, USA</p>
													<ul class="clinic-gallery">
														<li>
															<a href="{{asset('img/features/feature-01.jpg')}}" data-fancybox="gallery">
																<img src="{{asset('img/features/feature-01.jpg')}}" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{asset('img/features/feature-02.jpg')}}" data-fancybox="gallery">
																<img  src="{{asset('img/features/feature-02.jpg')}}" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{asset('img/features/feature-03.jpg')}}" data-fancybox="gallery">
																<img src="{{asset('img/features/feature-03.jpg')}}" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{asset('img/features/feature-04.jpg')}}" data-fancybox="gallery">
																<img src="{{asset('img/features/feature-04.jpg')}}" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span>Dental Fillings</span>
													<span> Whitneing</span>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="far fa-thumbs-up"></i> 98%</li>
													<li><i class="far fa-comment"></i> 17 Feedback</li>
												</ul>
											</div>
											<div class="clinic-booking">
											<a class="apt-btn" href="{{route('patient.rendezvous.show.create',['id_medecin'=> $s])}}">Prendre Rendez-vous</a>
											<a class="apt-btn" href="{{route('medecin.profile',['id_medecin'=> $s])}}">voir profile</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /Doctor Widget -->
							<div class="load-more text-center">
								<a class="btn btn-primary btn-sm" href="javascript:void(0);">Charger plus</a>
							</div>
						</div>
					</div>

				</div>

			</div>



@endsection
