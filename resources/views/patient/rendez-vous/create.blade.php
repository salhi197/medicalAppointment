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
											<h4><a href="doctor-profile.html">Dr</a></h4>
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
  const weekday = [ "Dimanche","Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi","Samedi"];

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
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
today = mm + '/' + dd + '/' + yyyy;
var defaultEvents =  [];
var journees_creneaus = <?php echo json_encode($journees_creneaus); ?>;
//var crenaux = 
//echo json_encode($crenaux); ?>;
var aujourdhui = day_of_week(today)

for (let index = 0; index < journees_creneaus.length; index++) {
	if(journees_creneaus[index][0] != undefined){
	//var index = weekday.indexOf(journees_creneaus[index][0]['jour'])
	console.log(journees_creneaus[index][0]['jour']+' '+ index+' '+aujourdhui[1])
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

		journees_creneaus[index].forEach(crenau=>{
		var event={
            uid: journees_creneaus[index][0]['jour'],
            title: "rendez-vous N ",
            start: yyyy+"-"+mm+"-"+d +" "+crenau['debut'],
            end: yyyy+"-"+mm+"-"+d +" "+crenau['fin'],
            className: "",	
            level : "",
            price : "32000",
            status : "0",
            full : "0",
			debut_crenau :crenau['debut'],
			fin_crenau: crenau['fin'],
			date_crenau :yyyy+"-"+mm+"-"+d
		};    		
		defaultEvents.push(event)
	})
	d++;
	}


}
	
console.log(defaultEvents)
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                firstDay :aujourdhui[1]+1,
                defaultDate: yyyy+'-'+mm + '-' + dd,// + '-' +,
                timeFormat: 'HH:mm',
                slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                minTime: '08:00:00',
                maxTime: '16:00:00',                                	
                plugins: [ 'bootstrap', 'interaction', 'timeGridWeek', 'timeGrid' ],
                header    : {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'timeGridMonth,timeGridWeek'
                },
				events: defaultEvents,
				eventClick: function(info) {
	            	var date = info.event._def.extendedProps.date_crenau
					var heur = info.event._def.extendedProps.debut_crenau
	            	console.log(info.event._def.extendedProps.debut_crenau)
					console.log(info.event._def.extendedProps.date_crenau)
					info.el.style.borderColor = 'red';
					info.el.style.backgroundColor = 'red';
	                $('#date').val(date)	
					$('#crenau').val(heur)
					
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
