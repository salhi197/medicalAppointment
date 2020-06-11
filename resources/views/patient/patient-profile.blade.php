@extends('patient.app')

@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<form action="{{route('profile.post')}}" method=post>
									@csrf
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img src="{{asset('img/patients/patient.jpg')}}" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="profile_img">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>nom :</label>
													<input type="text" class="form-control" value="{{$patient->nom}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>prénom : </label>
													<input type="text" class="form-control" value="{{$patient->prenom}}" >
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="date" class="form-control datetimepicker" 
 >
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Group sanguin :</label>
													<select name="group_sangin" class="form-control select " data-select2-id="1" tabindex="-1" aria-hidden="true">
													<option>-----</option>
													<option>A+</option>
													<option>A+</option>
														<option>B-</option>
														<option>B+</option>
														<option>AB-</option>
														<option>AB+</option>
														<option>O-</option>
														<option>O+</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control" value="{{$patient->email}}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" value="{{$patient->telephone}}" class="form-control">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input type="text" class="form-control" value="{{$patient->adress}}">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
							</div>
						</div>

                        @endsection
