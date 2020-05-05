@extends('patient.app')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Date rendez-vous</th>
																	<th>Crenau Horaire</th>
																	<th>Motif</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
															@foreach($rdvs as $rdv)
															<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html">Dr.{{$rdv->getMedecin()->nom}} {{$rdv->getMedecin()->prenom}}  <span>{{$rdv->getMedecin()->specilaite}}</span></a>
																		</h2>
																	</td>
																	<td>{{$rdv->date_rdv}} </td>
																	<td>{{$rdv->creneau}}</td>
																	<td>$100</td>
																	<td>{{$rdv->motif}}</td>
																	<td><span class="badge badge-pill bg-success-light">{{$rdv->status}}</span></td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																				<i class="fas fa-trash"></i> Annuler 
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
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										<!-- /Prescription Tab -->
											
										
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>



                        @endsection

