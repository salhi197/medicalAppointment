@extends('layouts.medecin')

@section('content')
						
<div class="col-md-7 col-lg-8 col-xl-9">
						
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
                                    <form method="post" action="{{route('rendezvous.update',['id_rdv'=>$rdv['id'] ])}}">
                                        @csrf
                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date : <span class="text-danger">*</span></label>
                                                    <input value="{{$rdv['date_rdv']}}" type="date" class="form-control" name="date_rdv">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Séélctionner un patient : </label>
                                                    <select class="form-control select select2-hidden-accessible" name="id_patient" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                        <option value="{{$rdv['id_user']}}">
                                                            {{$rdv['id_user']}}
                                                        </option>
                                                        @foreach(['1','2','3'] as $rdv)
                                                            <option>
                                                                {{$rdv}}
                                                            </option>
                                                        @endforeach    
                                                    </select>
                                                        <a href="" class="active">
                                                            <small>
                                                                créer un nouveau patient
                                                            </small>
    
                                                        </a>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Séélctionner le motif : </label><br>
                                                    <select class="selectpicker" data-live-search="true" multiple name="motifs[]" data-width="100%" >
                                                        <option>Mustard</option>
                                                        <option>Ketchup</option>
                                                        <option>Barbecue</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Remarque : </label><br>
                                                    <textarea class="form-control" name="remarque" >
                                                    ya une erreur dans la MAJ de remarque , gonna fix this later
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Choisir le crénau : (l'ancien crénau est :    ) 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="hidden" value="" id="crenau" name="creneau"/>
                                                    <br>
                                                    <div class="time-slot">
                                                    <ul class="clearfix">
                                                        <li>
                                                            <a class="timing" date="9:00" href="javascript:void(0);">
                                                                <span>9:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="10:00" href="javascript:void(0);">
                                                                <span>10:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="11:00" href="javascript:void(0);">
                                                                <span>11:00</span> <span>AM</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="timing" date="9:00" href="javascript:void(0);">
                                                                <span>9:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="10:00" href="javascript:void(0);">
                                                                <span>10:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="11:00" href="javascript:void(0);">
                                                                <span>11:00</span> <span>AM</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="timing" date="9:00" href="javascript:void(0);">
                                                                <span>9:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="10:00" href="javascript:void(0);">
                                                                <span>10:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="11:00" href="javascript:void(0);">
                                                                <span>11:00</span> <span>AM</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="timing" date="9:00" href="javascript:void(0);">
                                                                <span>9:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="10:00" href="javascript:void(0);">
                                                                <span>10:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="11:00" href="javascript:void(0);">
                                                                <span>11:00</span> <span>AM</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="timing" date="9:00" href="javascript:void(0);">
                                                                <span>9:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="10:00" href="javascript:void(0);">
                                                                <span>10:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="11:00" href="javascript:void(0);">
                                                                <span>11:00</span> <span>AM</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="timing" date="9:00" href=javascript:void(0);#" >
                                                                <span>9:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="10:00" href="javascript:void(0);">
                                                                <span>10:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="11:00" href="javascript:void(0);">
                                                                <span>11:00</span> <span>AM</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="timing" date="9:00" href="javascript:void(0);">
                                                                <span>9:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="10:00" href="javascript:void(0);">
                                                                <span>10:00</span> <span>AM</span>
                                                            </a>
                                                            <a class="timing" date="11:00" href="javascript:void(0);">
                                                                <span>11:00</span> <span>AM</span>
                                                            </a>
                                                        </li>
                                                    </ul>
											</div>
                                            </div>
                                        </div>                                    
                                        <div class="submit-section submit-btn-bottom">
                                            <button type="submit" class="btn btn-primary submit-btn">Enregistrer </button>
                                        </div>

                                    </form>
								</div>
							</div>
							<!-- /Basic Information -->
							
							
							
						</div>





@endsection
@section('scripts')
<script>		
        $(function(){
            $(".timing").click(function(){
                console.log()
                $(this).addClass('selected');
                $('#crenau').val($(this).text())
            });
        });	
</script>
	

@endsection