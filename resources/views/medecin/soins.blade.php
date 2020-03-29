@extends('medecin')

@section('content')         



<div class="col-md-7 col-lg-8 col-xl-9">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Table des soins</h4>

                    <h6 class="card-subtitle">soins disponibles</code></h6>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Ajouter un soins </button>



                    <hr>

                    <div class="table-responsive">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th>numéro</th>

                                    <th>nom</th>

                                    <th style="visibility: hidden;">gggggg</th>

                                    <th>description</th>

                                    <th style="visibility: hidden;">ggggggggggggg</th>

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

                                            <td colspan="2"> 

                                                <div class="form-group col-md-12 col-sm-12">

                                                  <label><textarea type="text" rows="4" name="nom" class=" form-control" id="nomsoin{{$soins[$i]->id}}" value="{!! $soins[$i]->nom !!}">{!! $soins[$i]->nom !!}</textarea></label>
                                                </div>                                                    

                                                
                                            </td>

                                            <td colspan="2"> 

                                                <textarea type="text" rows="10" class="form-control" name="description" id="description{{$soins[$i]->id}}" value="{!! ($soins[$i]->description) !!}">{!! ($soins[$i]->description) !!}</textarea> 

                                                
                                            </td>

                                            <td> 

                                                <button class="btn btn-success btn-sm" id="{{$soins[$i]->id}}" onclick="modifiersoin(event,this)"> Enregistrer</button> 
                                            </td>

                                            <td> 

                                                @if ($soins[$i]->id!=0)

    

                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalsup-{{$soins[$i]->id}}" style="color: #fff;"> supprimer</a>

                                                    <div id="myModalsup-{{$soins[$i]->id}}" class="modal fade" role="dialog">

                                                      <div class="modal-dialog modal-lg">

                                                            <!-- Modal content-->

                                                            <div class="modal-content">

                                                               <div class="modal-header">

                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                    <h4 class="modal-title">Voulez-vous vraiment supprimer ce soin</h4>
                                                              </div>

                                                              <div class="modal-body">

                                                                    <button class="col-md-5 btn btn-success" onclick="supprimersoin(event,this)" data-dismiss="modal" id="mod{{$soins[$i]->id}}">OUI,je supprime</button>

                                                                    <a data-dismiss="modal" class="col-md-6 btn btn-danger">NON,je ne veux pas supprimer</a>
                                                                    
                                                              </div>

                                                              

                                                              <div class="modal-footer">

                                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                                                              </div>
                                                            </div>
                                                            
                                                      </div>
                                                    </div>                    
                                                    
                                                @endif
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
                    <h4 class="modal-title">Nouveau soin</h4>
            </div>
                <div class="modal-body">
                    <form class="form-inline">
                        {{ csrf_field() }}  
                        <div class="form-group col-md-4">
                            <label for="nom">nom </label>
                            <textarea type="text" id="nomdusoin" required name="nom" class="form-control" id="nom"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="description">description </label>
                            <textarea type="text" id="descdusoin" rows="10" cols="50" required name="description" class="form-control" id="description"></textarea>
                        </div>
                    <button style="margin-top: 5%;" id="ajout{{ $last_id }}" data-dismiss="modal" onclick="ajoutersoin(event,this)" class="btn btn-success col-md-6">Ajouter</button>
                    </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
            </div>
            </div>
        </div>

    </div>                    



@endsection