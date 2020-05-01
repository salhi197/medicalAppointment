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
												<a class="nav-link active" href="#today-appointments" data-toggle="tab">Today</a>
											</li> 
											<li class="nav-item">
												<a class="nav-link" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li>

											<li class="nav-item">
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="today-appointments">
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
											<div class="tab-pane show" id="upcoming-appointments">
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
                                                                @foreach($upcoming_rdvs as $rdv)
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
								<span class="text" id="date_rdv" ></span>                            
							</div>
							<div class="form-group">
                                <span class="title">les motifs de rendez-vous : </span>

								<span class="text" id="motif" ></span>                            
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
								<a href="" id="update_link" class="btn btn-primary">Modifier</a>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

					</div>
				</div>
			</div>
		</div>
@endsection

@section('scripts')
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
</script>
	
@endsection
