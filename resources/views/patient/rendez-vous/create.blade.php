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
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
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
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html">Dr Mokhat belmokhtare </a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div>
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">								
								<div class="col-12 col-sm-4 col-md-2">
									<h4 class="mb-1">11 November 2019</h4>
									<p class="text-muted">Monday</p>
								</div>

								<div class="col-12 col-sm-4 col-md-3">
								<form id="form" action="{{route('rendezvous.create')}}" method='post'>
									@csrf

									<select class="form-control" name="motif" id="motif">
										<option value="null">Choisissez un motif</option>
										@foreach($soins as $soin)
											<option value="Consultation d'implantologie-1">{{$soin->nom}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-4 col-sm-12 col-md-4">
									<label>
										Séléctionner un seul motif parmi cette liste 
									</label>
								</div>

								<div class="col-12 col-sm-8 col-md-3 text-sm-right">
									<input type='hidden' id="crenau" name="crenau" value="null">
									<input type="hidden" name="date" class="form-control" id="date" value="null">
									<input type="hidden" name="fin_crenau" class="form-control" id="fin_crenau" value="null">
								</div>
                            </div>

							<div class="row">
								<div class="col-12 col-sm-8 col-md-4">
									<h4 class="mb-1">Qui visite le medecin ?</h4>
								</div>
								
								<div class="col-12 col-sm-12 col-md-2">
									<button id="me" class="btn btn-primary">
										Moi meme
									</button>
								</div>
								<div class="col-12 col-sm-4 col-md-2">
									<button id="other" class="btn btn-primary">
										quelq'un d'autre 
									</button>
								</div>

							</div>
							<br>
							<div class="row" id="other_section" class=".d-none">
								<div class="col-12 col-sm-4 col-md-4">
									<label>Saisir les informatiosn ?</label>
								</div>
								<div class="col-12 col-sm-4 col-md-4">
									<input value="" type="text" class="form-control" name="nom" id="nom" placeholder="Nom du patient "  />
								</div>
								<div class="col-12 col-sm-4 col-md-4">
									<input value="" type="text" class="form-control" name="prenom" id="prenom" placeholder="prenoom du patient "  />
								</div>

							</div>
							<br>
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
								<!--	 Schedule Header -->
									<div class="schedule-header">
										<div class="row">
										</div>
									</div>
									<!-- /Schedule Header -->									
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
													<span>Choisissez une date dans le calendrier .. <span>
												</ul>
											</div>											
											</div>
											
										</div>
									</div>
								<!-- /Schedule Content -->
									<div class="submit-section proceed-btn text-right">
										<button class="btn btn-primary submit-btn " type="submit">Enregistrer</button>
									</div>
								</form>		
							</div>
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
						$('.clearfix').append('<span>Pas de crénaux pour ce jour .. <span>')

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
				var nom = $('#nom').val()
				var prenom = $('#prenom').val()
				console.log(motif,crenau,date)

				if(motif=="null" ||crenau=="null" ||date=="null" || (OtherSectionIsHidden == false && (nom=="null" || rpenom == "null"))){
					alert('veuilliez compelter tout les champs ! ')
				}else{
					document.getElementById("form").submit();
				}

			})            
			$('#me').on('click',function(){
				event.preventDefault()
				$('#nom').val('')
				$('#prenom').val('')
					console.log($('#prenom').val())
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
