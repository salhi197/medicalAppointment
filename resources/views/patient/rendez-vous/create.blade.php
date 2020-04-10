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
											<h4><a href="doctor-profile.html">Dr. Darren Elder</a></h4>
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
																	<form action="{{route('rendezvous.create')}}" method='post'>
									@csrf

									<select class="form-control" name="motif">
										<option value="">Choisissez un motif</option>
										@foreach($soins as $soin)
											<option value="Consultation d'implantologie-1">{{$soin->nom}}</option>
										@endforeach
									</select>
								</div>
								
								<div class="col-12 col-sm-8 col-md-3 text-sm-right">
									<input type="hidden" name="date" class="form-control" id="date">

								</div>
                            </div>
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
								<!-- Schedule Header -->
									<div class="schedule-header">
										<div class="row">
											<div class="col-md-12">
											
												<!-- Day Slot -->
												<div class="day-slot">
													<ul>
														<li class="left-arrow">
															<a href="#">
																<i class="fa fa-chevron-left"></i>
															</a>
														</li>
														<li>
															<span>Mon</span>
															<span class="slot-date">11 Nov <small class="slot-year">2019</small></span>
														</li>
														<li>
															<span>Tue</span>
															<span class="slot-date">12 Nov <small class="slot-year">2019</small></span>
														</li>
														<li>
															<span>Wed</span>
															<span class="slot-date">13 Nov <small class="slot-year">2019</small></span>
														</li>
														<li>
															<span>Thu</span>
															<span class="slot-date">14 Nov <small class="slot-year">2019</small></span>
														</li>
														<li>
															<span>Fri</span>
															<span class="slot-date">15 Nov <small class="slot-year">2019</small></span>
														</li>
														<li>
															<span>Sat</span>
															<span class="slot-date">16 Nov <small class="slot-year">2019</small></span>
														</li>
														<li>
															<span>Sun</span>
															<span class="slot-date">17 Nov <small class="slot-year">2019</small></span>
														</li>
														<li class="right-arrow">
															<a href="#">
																<i class="fa fa-chevron-right"></i>
															</a>
														</li>
													</ul>
												</div>
												<!-- /Day Slot -->
												
											</div>
										</div>
									</div>
									<!-- /Schedule Header -->
									
									<!-- Schedule Content -->
									<div class="schedule-cont">
										<div class="row">
											<div class="col-md-12">
					                            <div id="calendar"></div>
											</div>
										</div>
									</div>
								<!-- /Schedule Content -->
									<input type='hidden' id="crenau" name="crenau">
									<div class="submit-section proceed-btn text-right">
										<button class="btn btn-primary submit-btn" type="submit">Enregistrer</button>
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
@section('scripts')
<script src="{{asset('fullcalendar/core/main.min.js')}}"></script>
<script src="{{asset('fullcalendar/daygrid/main.min.js')}}"></script>
<script src="{{asset('fullcalendar/timegrid/main.min.js')}}"></script>

<script>		
  const weekday = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi","Samedi", "Dimanche"];

function day_of_week(input) {
//  var input = document.getElementById("input").value;

  var date = new Date(input).getUTCDay();
  
  var array= []
	array.push(weekday[date])
	array.push(date)
	return array;
}


document.addEventListener('DOMContentLoaded', function() {
var today = new Date();
var dd = 20;//String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
today = mm + '/' + 20 + '/' + yyyy;
var defaultEvents =  [];
var journees = <?php echo json_encode($journees); ?>;
var crenaux = <?php echo json_encode($crenaux); ?>;
var aujourdhui = day_of_week(today)

journees.forEach(jour=>{

	var index = weekday.indexOf(jour['jour'])
	console.log(jour['jour']+' '+ index+' '+aujourdhui[1])
	if (index<aujourdhui[1]) {
		var d = parseInt(dd)+parseInt(index)+6-parseInt(aujourdhui[1])+1

	} 
	if(index>aujourdhui[1]){		
	var d = parseInt(dd)+index-parseInt(aujourdhui[1])
	}
	if (index==aujourdhui[1]) {
		d =dd
	}
		console.log(d)

	crenaux.forEach(crenau=>{
		var event={
            uid: jour['jour'],
            title: "rendez-vous N ",
            start: yyyy+"-"+mm+"-"+d +" "+crenau['debut'],
            end: yyyy+"-"+mm+"-"+d +" "+crenau['fin'],
            className: "",	
            level : "",
            price : "32000",
            status : "0",
            full : "0"

		};    		
		defaultEvents.push(event)
	})
	d++;
})
	
console.log(defaultEvents)



            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                firstDay :aujourdhui[1]+1,
                defaultDate: yyyy+'-'+mm + '-' + 20,// + '-' +,
                timeFormat: 'HH:mm',
                slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                minTime: '08:00:00',
                maxTime: '16:00:00',                                	
                plugins: [ 'bootstrap', 'interaction', 'timeGridWeek', 'timeGrid' ],
                header    : {
                    left  : 'next today',
                    center: 'title',
                    right : 'timeGridMonth,timeGridWeek'
                },
				events: defaultEvents,
				eventClick: function(info) {
	            	var date = info.event.start
	            	console.log($(this))
					info.el.style.borderColor = 'red';
					info.el.style.backgroundColor = 'red';
	                $('#date').val(date)
                },
            });

            calendar.render();
        });

        $(function(){
            $(".timing").click(function(){
				$(".timing").removeClass('selected')
                console.log()
                $(this).addClass('selected');
                $('#crenau').val($(this).text())
            });
            /*
            * On change function  .. 
            */
            $('#date').on('change',function(){
            	var date = $(this).val()
            	console.log(date)
            })

        });	
</script>
	

@endsection
