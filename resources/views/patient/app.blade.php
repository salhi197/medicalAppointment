<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 10:57:40 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="{{asset('img/favicon.png')}}" rel="icon">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		
		<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

	    <link href="{{asset('fullcalendar/core/main.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('fullcalendar/daygrid/main.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('fullcalendar/timegrid/main.min.css')}}" rel="stylesheet" />
	    <link href="{{asset('css/toastr.css')}}" rel="stylesheet" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="{{asset('js/html5shiv.min.js')}}"></script>
			<script src="{{asset('js/respond.min.js')}}"></script>
		<![endif]-->
		@yield('styles')
	
	</head>
	<body class="account-page">

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
							<img src="{{asset('img/logo.png')}}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.html" class="menu-logo">
								<img src="{{asset('img/logo.png')}}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
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
							<a class="nav-link header-login" href="login.html">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-2 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>							
						</div>
						<div class="col-md-10">
						<div class="search-box">
							<form action="{{route('search.medecins')}}" method="get">
								<div class="form-group search-location">
									<select class="js-example-basic-single" name="wilaya" id="wilayas" style="padding:10px;">>
										<option value="">----</option>
									</select>

									<span >Ex: Alger,Bouira,Oran...</span>
								</div>
								<div class="form-group search-info">
									<select class="js-example-basic-single" id="specialites" name="specialite" style="padding:10px;">>
										<option value="">----</option>
									</select>
									<span >Ex : Chirurgie Dentaire</span>
								</div>
								<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>

						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<div class="profile-det-info">
											<h3>Richard Wilson</h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
										<li class="active">
													<a href="{{route('patient.rendezvous.index')}}">
													<i class="fas fa-bookmark"></i>
													<span>Mes Rendez-vous</span>
												</a>
											</li>
											<li>
												<a href="profile-settings.html">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password.html">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
											<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
																document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
											<li>
											<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
																document.getElementById('delete-account-form').submit();">
												<i class="fa fa-trash"></i>
												supprimer mon compte
											</a>
											<form id="delete-account-form" action="{{ route('delete-account') }}" method="POST" style="display: none;">
												@csrf
											</form>

											</li>


											</li>
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->
					@yield('content')
						
					</div>

				</div>

			</div>		
			<!-- /Page Content -->


			<!-- Page Content -->
			<!-- /Page Content -->
   	   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
		
		<script src="{{asset('js/moment.min.js')}}"></script>
		<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>


		<!-- Bootstrap Core JS -->
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('js/script.js')}}"></script>
		<script src="{{asset('js/toastr.min.js')}}"></script>
		<script>
		@if(session('success'))
			$(function(){
				toastr.success('{{Session::get("success")}}')
			})
		@endif

		@if(session('error'))
			$(function(){
				toastr.error('{{Session::get("error")}}')
			})
		@endif

		</script>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>



		@yield('scripts')
	</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 10:57:41 GMT -->
</html>



