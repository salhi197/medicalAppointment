<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 10:57:40 GMT -->
<head>
    <meta charset="utf-8">
    <title>Tebibe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- MDB free -->
    <link rel="stylesheet" href="{{asset('MDB-Free_4.19.0/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('MDB-Free_4.19.0/css/style.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

    <link href="{{asset('fullcalendar/core/main.min.css')}}" rel="stylesheet" />
    <link href="{{asset('fullcalendar/daygrid/main.min.css')}}" rel="stylesheet" />
    <link href="{{asset('fullcalendar/timegrid/main.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

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
						<ul class="main-nav">
							<li class="active">
								<a href="index.html">Home</a>
							</li>
							<li class="has-submenu">
								<a href="#">Médecin <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="doctor-dashboard.html">Médecin Dashboard</a></li>
									<li><a href="doctor-register.html">Contactez-nous</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="#">Patient <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="search.html">Patient Dashboard</a></li>
									<li><a href="search.html">S'inscrire</a></li>
									<li><a href="booking.html">Prendre un rendez-vous</a></li>
									<li><a href="change-password.html">Contactez-nous</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="#">À propos <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="change-password.html">Contactez-nous</a></li>
									<li><a href="video-call.html">Qui somme nous</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Contact</a>
							</li>
							<li>
                           		 <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                          	     </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                 </form>
                            </li>


                    <li class="login-link">
                        <a href="login.html">Login / Signup</a>
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
                        <p class="contact-info-header"> +213 666 666 666</p>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link header-login" href="login.html">login / Signup </a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- /Header -->

    <!-- Page Content -->
@yield('content')


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
@yield('scripts')
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
                        <h2 class="footer-title">Contact Us</h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <p> 16 G lido baha 2,<br> Alger, DZ 16000 </p>
                            </div>
                            <p>
                                <i class="fas fa-phone-alt"></i>
                                +1 315 369 5943
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                tebibe@hotmail.com
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

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 10:57:41 GMT -->
</html>



