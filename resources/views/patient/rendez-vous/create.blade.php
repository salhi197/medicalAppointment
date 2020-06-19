@extends('layouts.app')

@section('content')
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Rendez vous</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Rendez vous</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-12">

							<div class="card">
                                <div class="card-header" style=" text-align : center;">
                                    <h4 class="card-title mb-0">Informations sur le médecin</h4>
                                </div>
								<div class="card-body">
                                    <div class="container-fluid">

                                                <div class="doctor-widget">
                                                    <div class="doc-info-left">
                                                        <div class="doctor-img">
                                                            <img src="{{asset('/img/doctors/doctor-thumb-02.jpg')}}" class="img-fluid" alt="User Image">
                                                        </div>
                                                        <div class="doc-info-cont">
                                                            <h4 class="doc-name">Dr. Darren Elder</h4>
                                                            <p class="doc-speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
                                                            <p class="doc-department"><img src="{{asset('img/specialities/specialities-05.png')}}" class="img-fluid" alt="Speciality">Dentist</p>
                                                            <div class="rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star"></i>
                                                                <span class="d-inline-block average-rating">(35)</span>
                                                            </div>
                                                            <div class="clinic-details">
                                                                <ul class="clinic-gallery">
                                                                    <li>
                                                                        <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                                            <img src="{{asset('img/features/feature-01.jpg')}}" alt="Feature">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                                                            <img  src="{{asset('img/features/feature-02.jpg')}}" alt="Feature Image">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                                                            <img src="{{asset('img/features/feature-03.jpg')}}" alt="Feature">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                                                            <img src="{{asset('img/features/feature-04.jpg')}}" alt="Feature">
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="clinic-services">
                                                                <span>Dental Fillings</span>
                                                                <span>Teeth Whitneing</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="doc-info-right">
                                                        <div class="doctor-action">
                                                            <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                                                <i class="far fa-bookmark"></i>
                                                            </a>
                                                            <a href="chat.html" class="btn btn-white msg-btn">
                                                                <i class="far fa-comment-alt"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                                                                <i class="fas fa-phone"></i>
                                                            </a>
                                                        </div>
                                                        <div class="clinic-booking">
                                                            <a class="apt-btn" href="http://127.0.0.1:8000/medecin/profile/2">Voir profil</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            


                                    </div>
								</div>

							</div>
                            <!-- Search Filter -->

                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-6" class="card search-filter" >
                                    <div class="card-header" style=" text-align : center;">
                                        <h4 class="card-title mb-0">Remplir les informations de la réservation</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="filter-widget" >
                                            <h4 class="mb-1">11 Novembre 2019</h4>
                                            <p class="text-muted">Lundi</p>
                                        </div>
                                        <form id="form" action="{{route('patient.rendezvous.create')}}" method='post'>
                                            @csrf
                                            <div class="form-group">
                                                <span class="label label-primary">Motif de la réservation</span> <label>*</label>
                                                <select class="form-control" name="motif" id="motif">

                                                    @foreach($soins as $soin)
                                                        <option value="Consultation d'implantologie-1">{{$soin->nom}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-12 col-sm-8 col-md-4">
                                                <h4 class="mb-1">Qui visite le medecin ? *</h4>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-3">
                                                <button id="me" class="btn btn-primary btn-sm">
                                                    Moi meme
                                                </button>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <button id="other" class="btn btn-primary btn-sm">
                                                    Quelqu'un d'autre
                                                </button>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row" id="other_section" class=".d-none">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <span class="label label-primary">Veuillez saisir les informations du patient</span> <label>*</label>

                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <input  type="text" class="form-control " name="nom" id="nom" placeholder="Nom"  />
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <input  type="text" class="form-control" name="prennom" id="prennom" placeholder="Prénom"  />
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-8 col-md-3 text-sm-right">
                                            <input type='hidden' id="crenau" name="crenau" value="null">
                                            <input type="hidden" name="date" class="form-control" id="date" value="null">
                                            <input type="hidden" name="fin_crenau" class="form-control" id="fin_crenau" value="null">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-md-6 ml-auto" class="card booking-schedule schedule-widget"  >
                                    <!-- Schedule Content -->
                                    <div class="schedule-cont">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="from-control">
                                                    <input type="hidden" id="datepicker" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="time-slot">
                                                    <ul class="clearfix">
													<span class="text-info">Choisissez une date dans le calendrier .. <span>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Schedule Content -->
                                    <div class="submit-section proceed-btn text-center">
                                        <button class="btn btn-primary btn-md" type="submit">Enregistrer</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            </div>


							<br>
							<!-- Schedule Widget -->

							<!-- /Schedule Widget -->

							<!-- Submit Section -->
							<!-- /Submit Section -->

						</div>
					</div>
				</div>

			</div>

			@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pikaday.css')}}">
<script type="text/javascript" src="{{asset('js/jquerymap.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/poppermap.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrapmap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js"></script>
@endsection
@section('scripts')
	<script src="{{asset('js/pikaday.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script>
			$('#other_section').hide()

			var OtherSectionIsHidden = true
  			$("body").delegate(".timing", "click", function(){
				$('.timing').removeClass('selected');
				console.log($(this).attr('id'))
                $(this).addClass('selected');
                $('#crenau').val($(this).text())
                $('#fin_crenau').val($(this).attr('id'))
            });

			var days = ['Dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
			var journees_creneaus = <?php echo json_encode($journees_creneaus); ?>;
			var crenauxDay=[]

			var field = document.getElementById('datepicker');
			var picker = new Pikaday({
				onSelect: function(date) {
					$('.clearfix').LoadingOverlay("show")
					$('.clearfix').empty()
					field.value = picker.toString();
					var d = new Date(field.value);
					var dayName = days[d.getDay()];
					console.log(dayName)
					document.getElementById('date').value = field.value
					/**
					get crenaux
					 */
					crenauxDay = journees_creneaus[d.getDay()]
					if(crenauxDay.length == 0){
						$('.clearfix').append('<span class="text-danger">Pas de crénaux pour ce jour .. <span>')

					}else{
						crenauxDay.forEach(function(item,index){
							console.log(item)
						$('.clearfix')
						.append('<li class="elt">'+
									'<a class="timing" id='+item.fin.substr(0,5)+' href="javascript:void(0);">'+
										'<span>'+item.debut.substr(0,5)+'</span> <span>AM</span>'+
									'</a>'+
								'</li>')
					})
					}
					$('.clearfix').LoadingOverlay("hide")




				}
			});
			field.parentNode.insertBefore(picker.el, field.nextSibling);

			$('.submit-btn').on('click',function(){
				event.preventDefault()
				var motif = $('#motif').val()
				var crenau = $('#crenau').val()
				var date = $('#date').val()
				// var nom = $('#nom').val()
				// var prenom = $('#prenom').val()
				// console.log(motif,crenau,date)

				if(motif=="null" ||crenau=="null" ||date=="null"){
					alert('veuilliez compelter tout les champs ! ')
				}else{
					document.getElementById("form").submit();
				}

			})
			$('#me').on('click',function(){
				event.preventDefault()
				$('#nom').val('moi-meme')
				$('#prennom').val('moi-meme')
				$('#other_section').hide()

				$('#other_section').hide()
				OtherSectionIsHidden =true
			})
			$('#other').on('click',function(){
				OtherSectionIsHidden =false
				event.preventDefault()
				$('#other_section').show()
			})




    </script>


@endsection
