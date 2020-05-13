@extends('layouts.medecin')

@section('content')
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="{{asset('img/icon-01.png')}}" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3>1500</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="65">
																<img src="{{asset('img/icon-02.png')}}" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Patient</h6>
															<h3>160</h3>
															<p class="text-muted">06, Nov 2019</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{asset('img/icon-03.png')}}" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Appoinments</h6>
															<h3>85</h3>
															<p class="text-muted">06, Apr 2019</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
											</li> 
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li>

											<li class="nav-item">
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Nom Patient</th>
																		<th>date & crénau</th>
																		<th>remarque : </th>
																		<th>Type</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
                                                                @foreach($today_rdvs as $rdv)
                                                                <tr >
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('img/patients/patient11.jpg')}}" alt="User Image"></a>
																				<a href="patient-profile.html"> {{$rdv->getPatient()['name']}} <span>#PT0011</span></a>
																			</h2>
																		</td>
																		<td>{{$rdv->date_rdv}} | {{$rdv->creneau}} <span class="d-block text-info">
                                                                        crée : {{$rdv->created_at}}</span></td>
																		<td>{{$rdv->remarque}}</td>
																		<td>{{ $rdv->motif}}</td>
																		<td class="text-right">
																			<div class="table-action">
                                                                                <a href="#" class="btn btn-sm bg-info-light view-rdv" data-toggle="modal" 
                                                                                data-target="#appt_details" data="{{$rdv}}">
                                                                                    <i class="far fa-eye"></i> View
                                                                                </a>																				
																				<a href="{{route('rendezvous.annuler',['id_rdv'=>$rdv->id])}}" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Annuler
																				</a>
                                                                                <a href="{{route('rendezvous.show',['id_rdv'=>$rdv->id])}}" class="btn btn-sm bg-info-light">
																					<i class="fas fa-list"></i> modifier
																				</a>
                                                                                
																			</div>
																		</td>
																	</tr>
                                                                @endforeach

																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
													<div id='calendrier'></div>

													</div>
												</div>
											</div>
									   
											<!-- Today Appointment Tab -->
											
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
								</div>
							</div>

						</div>

@endsection

@section('modals')


<div class="modal fade custom-modal" id="rdv_detail">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
                            <div class="form-group">
								<span class="title">Pateint concerné  :   </span>
								<span class="text">
                                    <a href="" id="id_user">
                                    SALHI HAIDER ALI
                                    </a>
                                </span>
							</div>
                        
							<div class="form-group">
                                <span class="title">Date rendez-vous : </span>
								<span class="text" id="date_rdv"></span>                            
							</div>
							<div class="form-group">
                                <span class="title">les motifs de rendez-vous : </span>

								<span class="text" id="motif"></span>                            
							</div>
							<div class="form-group">
                                <span class="title">crénau rendez-vous : </span>
								<span class="text" id="creneau"></span>                            
							</div>

							<div class="form-group">
                            <span class="title">Remarque : </span>
								<span class="text" id="remarque"></span>                            
							</div>

                            
                            <div class="form-group">
								<span class="title">Status:</span>
								<span class="text" id="status"></span>
							</div>

							<div class="form-group">
								<span class="title">etat de paiement :   </span>
								<span class="text"id="etat_payment"></span>
							</div>
							<div class="form-group">
								<span class="title">Montant de paiement  :   </span>
								<span class="text" id="montant"></span>
							</div>

							<div class="form-group">
								<span class="title">date de création : </span>
								<span class="text" id="created_at"></span>
							</div>

							<div class="submit-section text-center">
								<a href="" id="update_link" class="btn btn-danger">Annuler & Notifer patient</a>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

					</div>
				</div>
			</div>
		</div>
@endsection

@section('scripts')

<script src="{{asset('fullcalendar/core/main.js')}}"></script>
<script src="{{asset('fullcalendar/interaction/main.js')}}"></script>
<script src="{{asset('fullcalendar/bootstrap/main.js')}}"></script>
<script src="{{asset('fullcalendar/daygrid/main.js')}}"></script>
<script src="{{asset('fullcalendar/timegrid/main.js')}}"></script>
<script src="{{asset('fullcalendar/list/main.js')}}"></script>
<script src="{{asset('js/theme-chooser.js')}}"></script>

<script>
        $(function(){
            $(".view-rdv").click(function(){
                var data = JSON.parse($(this).attr('data'));
                console.log(data['id'])

                var lien  = 'http://127.0.0.1:8000/rendezvous/show/update/'+data['id']
                $('#update_link').attr('href',lien)
                for (let [key, value] of Object.entries(data)) {
                    $('#'+key).html(value)
                    console.log(`${key}: ${value}`);
                }

                $("#rdv_detail").modal("show");
            });
        });	
  const weekday = [ "Dimanche","Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi","Samedi"];

function day_of_week(input) {
//  var input = document.getElementById("input").value;

  var date = new Date(input).getUTCDay();
  
  var array= []
	array.push(weekday[date])
	array.push(date)
	return array;
}


var today = new Date();
var dd = String(today.getDate()).padStart(2, '0')-8;
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
today = mm + '/' + dd + '/' + yyyy;
var defaultEvents =  [];
var rendezvous = <?php echo json_encode($upcoming_rdvs); ?>;
//var crenaux = 
//echo json_encode($crenaux); ?>;
var event;
var aujourdhui = day_of_week(today)
for(rdv of rendezvous){
	console.log(rdv)
	var dc= rdv['creneau']
	 var fc= rdv['fin_creneau']
	/***/
	dc = dc.substr(0,dc.length-3)
	// fc = fc.substr(0,c.length-3)
	event = {
		id:rdv['id'],
		title: 'Rendez-vous avec XXX',
		start: rdv['date_rdv']+'T'+dc+':00',
		end: rdv['date_rdv']+'T'+fc+':00',
		date_rdv:rdv['date_rdv'],
		motif:rdv['motif'],
		creneau:rdv['creneau'],
		remarque:rdv['remarque'],
		status:rdv['status'],
		etat_payment:rdv['etat_payment'],
		montant:rdv['montant'],
		created_at:rdv['created_at']		  
        },

	defaultEvents.push(event)
}
console.log(defaultEvents)


  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendrier');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      defaultDate: '2020-05-08',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
		eventClick: function(info) {
			/** 
			onclick open model to show or create .. ... . . . . 
			 */
		prevClickedEvent = info; 					
		var date = info.event._def.extendedProps.date_crenau
		var heur = info.event._def.extendedProps.debut_crenau
		console.log(info.event._def.extendedProps.debut_crenau)
		console.log(info.event._def.extendedProps.date_crenau)
		info.el.style.borderColor = '#09e5ab';
		info.el.style.backgroundColor = '#09e5ab';
			var lien  = 'http://127.0.0.1:8000/annuler/'+info.event._def.extendedProps.id
                $('#update_link').attr('href',lien)
			jQuery.each(info.event._def.extendedProps, function(i, val) {
				$('#'+i).html(val)
				console.log(`${i}: ${val}`);
			});		
			$('#rdv_detail').modal('show');



		
	},
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events:defaultEvents
    });

    calendar.render();
  });

</script>
	

@endsection

@section('styles')
<link href="{{asset('fullcalendar/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('fullcalendar/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{asset('fullcalendar/timegrid/main.css')}}" rel='stylesheet' />

@endsection