@extends('medecin')



@section('content')         
     

    <div class="row">


        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
                    

                    <h4 class="card-title">Table des créneaux</h4>

                    



                    <!-- Trigger the modal with a button -->

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Ajouter un créneau </button>



                    <!-- Modal -->

                    <hr>

                    <div class="table-responsive"> 

                        <table class="table">

                            <thead>

                                <tr>

                                    <th>numéro</th>

                                    <th>debut</th>

                                    <th>fin</th>

                                    <th>max de visites</th>

                                    <th style="visibility: hidden;">777777777777777</th>

                                    <th>Modifier</th>

                                    <th>Supprimer</th>

                                </tr>

                            </thead>



                            <tbody>



                                @for ($i=0;$i<count($creneaus);$i++)

                                    <tr id="lotfi{{$i}}">

                                        <form method="POST" action="/medecin/creneaus/modifiercreneau/{{ $creneaus[$i]->id }}/post" id="f{{$creneaus[$i]->id}}">


                                            {{ csrf_field() }}  


                                            <td>

                                                {{ $i+1 }}                                                

                                            </td>

                                            <td> 

                                                <div class="">

                                                  <label><input class="form-control" type="time" name="debut" value="{!! substr($creneaus[$i]->debut,0,5) !!}"></label>

                                                </div>                                                    

                                                @if ($errors->has('debut'))

                                                    <span class="help-block">

                                                        <strong style="color: red;">{{ $errors->first('debut') }}</strong>

                                                    </span>

                                                @endif



                                                {{--  --}}

                                            </td>



                                            

                                            <td> 

                                                    

                                                <input type="time" name="fin" class="form-control" value="{!! substr($creneaus[$i]->fin,0,5) !!}"> 


                                                {{--  --}}
                                            </td>

                                            

                                            <td colspan="2">



                                                <input type="number" min="1" name="limit" class="col-md-4 form-control" value="{!! $creneaus[$i]->max_visite !!}">


                                                {{--  --}}
                                            </td>

                                            

                                            <td> 

                                                <button class="btn btn-success btn-sm modif" name="{{$i}}" id="{{$creneaus[$i]->id}}"> modifier</button> 

                                            </td>



                                            <td> 

                                                <a class="btn btn-danger btn-sm" href="/medecin/creneaus/supprimer/{{ $creneaus[$i]->id }}" type="submit"> supprimer</a> 

                                            </td>



                                        </form>



                                        {{--  --}}

                                    </tr>



                                    {{-- expr --}}

                                @endfor

                                {{--  --}}

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        {{--  --}}
    </div>

 {{--  --}}   

@endsection

@section('modals')
<div id="myModal" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

        <!-- Modal content-->

        <div class="modal-content">

           <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Nouveau créneau</h4>

          </div>

          

          <div class="modal-body">

                

                <form class="form-inline" action="/medecin/creneaus/ajouter" method="POST">



                    {{ csrf_field() }}  



                    <div class="form-group col-md-3">

                        <label for="debut">debut </label>

                        <input type="time" name="debut" class="form-control" id="debut">
                    </div>

                        



                    <div class="form-group col-md-3">

                        <label for="fin">fin </label>

                        <input type="time" name="fin" class="form-control" id="fin">

                    </div>



                    <div class="form-group col-md-3">

                        <label for="max">max de visites </label>

                        <input type="number" min="1" max="100" name="max" class="form-control col-md-6" id="max">
                    </div>



                  <button type="submit" class="btn btn-success col-md-3">Ajouter</button>

                </form>

                {{--  --}}

          </div>

          

          <div class="modal-footer">

               

                <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>

          </div>

        </div>



        {{--  --}}

  </div>

</div>                    

@endsection

@section('styles')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}




</style>
@endsection