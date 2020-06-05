
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 10:56:37 GMT -->
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Tebib</title>

		<!-- Favicons -->
		<link type="image/x-icon" href="/img/favicon.png" rel="icon">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="/css/style.css">

		<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="/js/html5shiv.min.js"></script>
			<script src="/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index.html" class="navbar-brand logo">
							<img src="/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="login-link">
								<a href="{{route('login')}}">se connecter</a>
							</li>
						</ul>
					</div>
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link header-login" href="{{route('login')}}">Vous êtes professionnel de santé ?</a>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="{{route('login.patient')}}">se connecter </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->

			<!-- Home Banner -->
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Rechercher un médecin, prendre rendez-vous</h1>
							<p>Découvrez les meilleurs médecins, cliniques et hôpitaux de la ville la plus proche de chez vous.</p>
						</div>

						<!-- Search -->
						<div class="search-box">
							<form action="{{route('search.medecins')}}" method="get">
								<div class="form-group search-location">
									<select class="js-example-basic-single" name="wilaya" id="wilayas" style="padding:10px;">>
										<option value="">----</option>
									</select>

									<span class="form-text">Ex: Alger,Bouira,Oran...</span>
								</div>
								<div class="form-group search-info">
									<select class="js-example-basic-single" id="specialites" name="specialite" style="padding:10px;">>
										<option value="">----</option>
									</select>
									<span class="form-text">Ex : Chirurgie Dentaire</span>
								</div>
								<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->

					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Clinique et spécialités</h2>
						<p class="sub-title">L'application Tebibe vous permet de trouver des médecins les plus talentuex et les plus
                        proche de chez vous avec la specialitée que vous desirez.   </p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Urology</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Neurology</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Orthopedic</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Cardiologist</p>
								</div>
								<!-- /Slider Item -->

								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Dentist</p>
								</div>
								<!-- /Slider Item -->

							</div>
							<!-- /Slider -->

						</div>
					</div>
				</div>
			</section>
			<!-- Clinic and Specialities -->

			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Réservez notre médecin</h2>
								<p>Petite présentation de nos médecins</p>
							</div>
							<div class="about-content">
								<p>Les médecins ,qu'on a de la chance de travailler avec, sont tous qualifié et compétents dans leurs domaines, vous pourriez consulter
                                leurs profils afin de choisir le médecin le plus adaptés à vos recherche.</p>
								<p>L'application vous offre la possibilité de trouver un medecin selon le lieux où vous vous retrouvez ou/et
                                    la spécialité.
                                </p>

							</div>
						</div>
						<div class="col-lg-8">
							<div class="doctor-slider slider">

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-01.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Ruby Perrin</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Florida, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $300 - $1000
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-02.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Darren Elder</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(35)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Newyork, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $50 - $300
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-03.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Deborah Angel</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(27)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Georgia, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $400
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-04.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Sofia Brient</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MS - General Surgery, MCh - Urology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(4)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Louisiana, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $150 - $250
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-05.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Marvin Campbell</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - Ophthalmology, DNB - Ophthalmology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(66)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Michigan, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $50 - $700
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-06.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Katharine Berthold</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(52)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Texas, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $500
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-07.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Linda Tobin</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(43)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Kansas, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $1000
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- /Doctor Widget -->

								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="/img/doctors/doctor-08.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Paul Richard</a>
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(49)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> California, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $400
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<!-- Doctor Widget -->

							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->

		   <!-- Availabe Features -->
		   </div>
	   <!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="/js/jquery.min.js"></script>

		<!-- Bootstrap Core JS -->
		<script src="/js/popper.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>

		<!-- Slick JS -->
		<script src="/js/slick.js"></script>

		<!-- Custom JS -->
		<script src="/js/script.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>


		<script>

		var wilayas = [{"id":"1","code":"1","nom":"Adrar"}, {"id":"2","code":"2","nom":"Chlef"}, {"id":"3","code":"3","nom":"Laghouat"}, {"id":"4","code":"4","nom":"Oum El Bouaghi"}, {"id":"5","code":"5","nom":"Batna"}, {"id":"6","code":"6","nom":"B\u00e9ja\u00efa"}, {"id":"7","code":"7","nom":"Biskra"}, {"id":"8","code":"8","nom":"B\u00e9char"}, {"id":"9","code":"9","nom":"Blida"}, {"id":"10","code":"10","nom":"Bouira"}, {"id":"11","code":"11","nom":"Tamanrasset"}, {"id":"12","code":"12","nom":"T\u00e9bessa"}, {"id":"13","code":"13","nom":"Tlemcen"}, {"id":"14","code":"14","nom":"Tiaret"}, {"id":"15","code":"15","nom":"Tizi Ouzou"}, {"id":"16","code":"16","nom":"Alger"}, {"id":"17","code":"17","nom":"Djelfa"}, {"id":"18","code":"18","nom":"Jijel"}, {"id":"19","code":"19","nom":"S\u00e9tif"}, {"id":"20","code":"20","nom":"Sa\u00efda"}, {"id":"21","code":"21","nom":"Skikda"}, {"id":"22","code":"22","nom":"Sidi Bel Abb\u00e8s"}, {"id":"23","code":"23","nom":"Annaba"}, {"id":"24","code":"24","nom":"Guelma"}, {"id":"25","code":"25","nom":"Constantine"}, {"id":"26","code":"26","nom":"M\u00e9d\u00e9a"}, {"id":"27","code":"27","nom":"Mostaganem"}, {"id":"28","code":"28","nom":"M'Sila"}, {"id":"29","code":"29","nom":"Mascara"}, {"id":"30","code":"30","nom":"Ouargla"}, {"id":"31","code":"31","nom":"Oran"}, {"id":"32","code":"32","nom":"El Bayadh"}, {"id":"33","code":"33","nom":"Illizi"}, {"id":"34","code":"34","nom":"Bordj Bou Arreridj"}, {"id":"35","code":"35","nom":"Boumerd\u00e8s"}, {"id":"36","code":"36","nom":"El Tarf"}, {"id":"37","code":"37","nom":"Tindouf"}, {"id":"38","code":"38","nom":"Tissemsilt"}, {"id":"39","code":"39","nom":"El Oued"}, {"id":"40","code":"40","nom":"Khenchela"}, {"id":"41","code":"41","nom":"Souk Ahras"}, {"id":"42","code":"42","nom":"Tipaza"}, {"id":"43","code":"43","nom":"Mila"}, {"id":"44","code":"44","nom":"A\u00efn Defla"}, {"id":"45","code":"45","nom":"Na\u00e2ma"}, {"id":"46","code":"46","nom":"A\u00efn T\u00e9mouchent"}, {"id":"47","code":"47","nom":"Gharda\u00efa"}, {"id":"48","code":"48","nom":"Relizane"}];

		var specialites =[{"nom":"Allergologue"},{"nom":"Anatomo cyto-pathologiste"},{"nom":"Andrologue"},{"nom":"Anesthésiste réanimateur"},{"nom":"Angiologue"},{"nom":"Audioprothésiste"},{"nom":"Cancérologue"},{"nom":"Cancérologue médical"},{"nom":"Cancérologue radiothérapeute"},{"nom":"Cardiologue"},{"nom":"Chiropracteur"},{"nom":"Chirurgien"},{"nom":"Chirurgien cancérologue"},{"nom":"Chirurgien de la face et du cou"},{"nom":"Chirurgien de la main"},{"nom":"Chirurgien dentiste"},{"nom":"Chirurgien infantile"},{"nom":"Chirurgien maxillo-facial"},{"nom":"Chirurgien maxillo-facial et stomatologue"},{"nom":"Chirurgien oral"},{"nom":"Chirurgien orthopédiste"},{"nom":"Chirurgien plasticien et esthétique"},{"nom":"Chirurgien thoracique et cardio-vasculaire"},{"nom":"Chirurgien urologue"},{"nom":"Chirurgien vasculaire"},{"nom":"Chirurgien viscéral et digestif"},{"nom":"Dermatologue"},{"nom":"Diététicien"},{"nom":"Endocrinologue"},{"nom":"Ergothérapeute"},{"nom":"Gastro entérologue et hépatologue"},{"nom":"Généticien"},{"nom":"Gériatre"},{"nom":"Gynécologue médical"},{"nom":"Gynécologue médical et obstétrique"},{"nom":"Gynécologue obstétricien"},{"nom":"Hématologue"},{"nom":"Hypnothérapeute"},{"nom":"Infectiologue"},{"nom":"Infirmier"},{"nom":"Masseur kinésithérapeute"},{"nom":"Médecin acupuncteur"},{"nom":"Médecin addictologue"},{"nom":"Médecin biologiste"},{"nom":"Médecin bucco-dentaire"},{"nom":"Médecin du sport"},{"nom":"Médecin du travail"},{"nom":"Médecin généraliste"},{"nom":"Médecin homéopathe"},{"nom":"Médecin morphologue et anti-âge"},{"nom":"Médecin nucléaire"},{"nom":"Médecin nutritionniste"},{"nom":"Médecin réanimateur"},{"nom":"Médecin spécialiste de santé publique"},{"nom":"Médecin urgentiste"},{"nom":"Naturopathe"},{"nom":"Néphrologue"},{"nom":"Neurochirurgien"},{"nom":"Neurologue"},{"nom":"Ophtalmologue"},{"nom":"ORL"},{"nom":"ORL - Chirurgien de la face et du cou"},{"nom":"Orthodontiste"},{"nom":"Orthopédiste orthésiste"},{"nom":"Orthopédiste orthésiste-podologiste"},{"nom":"Orthophoniste"},{"nom":"Orthoptiste"},{"nom":"Ostéopathe"},{"nom":"Pédiatre"},{"nom":"Pédicure podologue"},{"nom":"Phlébologue"},{"nom":"Pneumologue"},{"nom":"Psychanalyste"},{"nom":"Psychiatre"},{"nom":"Psychiatre de l'enfant et de l'adolescent"},{"nom":"Psychologue"},{"nom":"Psychomotricien"},{"nom":"Radiologue"},{"nom":"Radiothérapeute"},{"nom":"Rhumatologue"},{"nom":"Sage femme"},{"nom":"Sophrologue"},{"nom":"Spécialiste en hémobiologie-transfusion"},{"nom":"Spécialiste en médecine interne"},{"nom":"Spécialiste en médecine légale et expertises médicales"},{"nom":"Spécialiste en médecine physique et de réadaptation"},{"nom":"Stomatologue"}];
			// the code you're looking for
			var needle = 'AL';
			$(document).ready(function() {
				$('.js-example-basic-single').select2({
					width: '100%', // need to override the changed default
					placeholder:'Choisri votre ville'
				});
				$('#specialites').select2({
					width: '100%', // need to override the changed default
					placeholder:'Choisir une spécialité'
				});



				wilayas.map(function(value, index, wilaya){
                        $('#wilayas').append($('<option>', {
                            value: value.nom,
                            text : value.nom
                        }));
					})

					specialites.map(function(value, index, wilaya){
						$('#specialites').append($('<option>', {
                            value: value.nom,
                            text : value.nom
                        }));
					})



			})




			// iterate over each  name="specialite"element in the array


		</script>

	</body>
<!-- Footer -->
<footer class="footer">

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="{{asset('img/footer-logo.png')}}" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            <p>Trouvez nous dans les réseaux sociaux. </p>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                   <div class="col-lg-3 col-md-6">

                       <!-- Footer Widget -->
                       <div class="footer-widget footer-menu">
                           <h2 class="footer-title">Pour les patients</h2>
                           <ul>
                               <li><a href="search.html">Recherche de médecins</a></li>
                               <li><a href="login.html">Connexion</a></li>
                               <li><a href="register.html">S'inscrire</a></li>
                               <li><a href="booking.html">Réservation</a></li>
                               <li><a href="patient-dashboard.html">Tableau de bord des patients</a></li>
                           </ul>
                       </div>
                       <!-- /Footer Widget -->

                   </div>

                   <div class="col-lg-3 col-md-6">

                       <!-- Footer Widget -->
                       <div class="footer-widget footer-menu">
                           <h2 class="footer-title">Pour les médecins</h2>
                           <ul>
                               <li><a href="appointments.html">Rendez-vous</a></li>
                               <li><a href="login.html">Connexion</a></li>
                               <li><a href="doctor-register.html">S'inscrire</a></li>
                               <li><a href="doctor-dashboard.html">Tableau de bord des patients</a></li>
                           </ul>
                       </div>
                       <!-- /Footer Widget -->

                   </div>



                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">Contactez nous</h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <p> 16 G lido baha 2,<br> ALGER, DZ 16000 </p>
                            </div>
                            <p>
                                <i class="fas fa-phone-alt"></i>
                                +1 315 369 5943
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                tebibe@example.com
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <p class="mb-0">&copy; 2020 Tebibe. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">

                        <!-- Copyright Menu -->
                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="term-condition.html">Terms and Conditions</a></li>
                                <li><a href="privacy-policy.html">Policy</a></li>
                            </ul>
                        </div>
                        <!-- /Copyright Menu -->

                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>
<!-- /Footer -->
</html>
