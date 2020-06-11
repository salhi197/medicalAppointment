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
											<li class="nav-item">
												<a class="nav-link active" href="/">+ créer un rendez-vous</a>
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
																			<a href="doctor-profile.html">
																			
																				
																			</a>
																		</h2>
																	</td>
																	<td>{{$rdv->date_rdv}} </td>
																	<td>{{$rdv->creneau}}</td>
																	<td>$100</td>
																	<td>{{$rdv->motif}}</td>
																	<td><span class="badge badge-pill bg-success-light">{{$rdv->status}}</span></td>
																	<td class="text-right">
																		<div class="table-action">	
																		<a  
																		href="#" 
																		data="{{$rdv->id}}"
																		class="btn btn-sm bg-danger-light delete-rdv">
																				<i class="fas fa-trash"></i> Annuler 
																			</a>
																			<a href="{{route('patient.rendezvous.edit',['id_rdv'=>$rdv->id])}}" class="btn btn-sm bg-info-light">
																				<i class="fas fa-eye"></i> Modifier 
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

@section('scripts')

@section('modals')

<div class="modal fade custom-modal" id="rdv_detail">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Supprimer Appointment </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">                            
							<div class="submit-section text-center">
								<a href="" id="delete_link" class="btn btn-danger">Annuler </a>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>

					</div>
				</div>
			</div>
		</div>


		<div class="modal fade custom-modal" id="delete-account">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Supprimer Votre Compte</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">                            
							
							<div class="submit-section text-center">

								<a class="btn btn-danger"
									onclick="event.preventDefault();
													document.getElementById('delete-account-form').submit();">
									<i class="fa fa-trash"></i>
									supprimer mon compte
								</a>
								<form id="delete-account-form" action="{{ route('delete-account') }}" method="POST" style="display: none;">
									@csrf
								</form>
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
			$('.delete-account').on('click',function(){
				$("#delete-account").modal("show");				
			})
            $(".delete-rdv").click(function(){
                var data = $(this).attr('data');
                console.log(data)				
                var lien  = 'http://localhost:8000/patient/rendezvous/destroy/'+data
                $('#delete_link').attr('href',lien)
                $("#rdv_detail").modal("show");
            });
        });	


</script>
@endsection
@endsection