@extends('medecin')

@section('content')         



<div class="col-md-7 col-lg-8 col-xl-9" id="tous_les_soins">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Affichage des tous les soins : {{Auth::guard('medecin')->user()->id}}</h4>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Ajouter un soins </button>



                    <hr>

                    <div class="table-responsive">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th>numéro</th>
                                    <th>nom</th>
                                    <th>description</th>
                                    <th>actions</th>
                                </tr>

                            </thead>



                            <tbody id="all_the_soins">

                                @for($i=0 ; $i < count($soins) ; $i++)

                                    <tr id="soin{{$soins[$i]->id}}">

                                        <form>

                                            {{ csrf_field() }}  

                                            <td>

                                                {{ $i+1 }}                                                
                                            </td>

                                            <td > 

                                                  <label><textarea type="text"  name="nom" class=" form-control" id="nomsoin{{$soins[$i]->id}}" value="{!! $soins[$i]->nom !!}">{!! $soins[$i]->nom !!}</textarea></label>
                                                
                                            </td>

                                            <td > 

                                                <textarea type="text"  class="form-control" name="description" id="description{{$soins[$i]->id}}" value="{!! ($soins[$i]->description) !!}">{!! ($soins[$i]->description) !!}</textarea> 

                                                
                                            </td>

                                            <td> 

                                                <button class="btn btn-success btn-sm" id="{{$soins[$i]->id}}" onclick="modifiersoin(event,this)"> <i class="fa fa-save"></i> Enregistrer</button> 

                                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalsup-{{$soins[$i]->id}}" style="color: #fff;"> <i class="fa fa-trash"> </i> supprimer</a>
                                                            
                                                {{--  --}}
                                            </td>
                                        </form>
                                        
                                    </tr>
                                    
                                @endfor
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

    <script src="{{ asset('js/modifierlessoins.js') }}"></script>
    
@endsection


@section('scripts')
    <script src="{{ asset('js/modifierlessoins.js') }}"></script>    
@endsection


@section('modals')

    <div class="modal fade custom-modal" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajouter un nouveau soin :</h4>
            </div>
                <div class="modal-body">
                    <form >
                        {{ csrf_field() }}  
                        <div class="form-group col-md-4">
                            <label for="nom">Intitulé de soin :  </label>
                            <textarea type="text" id="nomdusoin" required name="nom" class="form-control" id="nom"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">description de motif : </label>
                            <textarea type="text" id="descdusoin" required name="description" class="form-control" id="description"></textarea>
                        </div>
                    <button id="ajout{{ $last_id }}" data-dismiss="modal" onclick="ajoutersoin(event,this)" 
                    class="btn btn-success col-md-2">Ajouter</button>
                    </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
            </div>
            </div>
        </div>

    </div>                    


    <div id="les_modals_supp">


        @for ($i = 0; $i < count($soins) ; $i++)
            
            <div class="modal fade custom-modal" id="myModalsup-{{$soins[$i]->id}}"  role="dialog">

              <div class="modal-dialog modal-lg">

                    <!-- Modal content-->

                    <div class="modal-content">

                       <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title">Voulez-vous vraiment supprimer ce soin ?</h4>
                      </div>

                      <div class="modal-body">

                            <button class="col-md-5 btn btn-success" onclick="supprimersoin(event,this)" data-dismiss="modal" id="mod{{$soins[$i]->id}}">OUI,je supprime</button>

                            <a data-dismiss="modal" class="col-md-6 btn btn-danger" style="color: #fff;">NON,je ne veux pas supprimer</a>
                            
                      </div>

                      

                      <div class="modal-footer">

                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                    
              </div>
            </div>                    


            {{-- expr --}}
        @endfor

    </div>
    
@endsection