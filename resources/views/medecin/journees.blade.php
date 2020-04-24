@extends('medecin')

@section('content')         

    <div class="col-md-7 col-lg-8 col-xl-9">

            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Table de travail</h4>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            </div>                        
                        </div>                        
                    </div>
                    

                    <h6 class="card-subtitle">jour de travail</code></h6>

                    <div class="table-responsive">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th>Jour</th>

                                    <th>disponibililé</th>

                                    <th>heure debut</th>

                                    <th style="visibility: hidden;">ggggg</th>

                                    <th>heure fin</th>

                                    <th style="visibility: hidden;">ggggg</th>
                                    
                                    <th>modifier</th>
                                </tr>
                            </thead>

                            <tbody>

                                @for($i=0; $i<count($journees);$i++)

                                    <tr id="j{{$journees[$i]->id}}">

                                        <form>

                                            {{ csrf_field() }}

                                            <td>{!! $journees[$i]->jour !!}</td>

                                            <td> 

                                            
                                                <label class="switch">
                                                    <input type="checkbox" class="powerButton" id="dispo{{$journees[$i]->id}}"  
                                                    value="{!! $journees[$i]->disponible !!}"
                                                    @if($journees[$i]->disponible==1) checked @endif>
                                                    <div class="slider "></div>
                                                </label>
                                            <label>                                            
                                                <input class="form-control" type="hidden" min="0" max="1" name="dispo" id="dispo{{$journees[$i]->id}}" >
                                            </label>

                                                {{--  --}}
                                            </td>

                                            <td colspan="2"> 

                                                @if($journees[$i]->disponible==1)                                                    
                                                    <select class="show-tick form-control" name="heuredeb" id="heuredeb{{$i}}">

                                                        <option>{!! substr($journees[$i]->heuredeb,0,5) !!}</option>

                                                        @foreach ($debuts as $debut)                                                            
                                                            <option value="{{substr($debut->debut,0,5)}}">{!! substr($debut->debut,0,5) !!}</option>

                                                            {{-- expr --}}
                                                        @endforeach

                                                        {{--  --}}
                                                    </select>
                                                @endif

                                                @if($journees[$i]->disponible==0)

                                                    <select class="show-tick form-control" name="heuredeb" id="heuredeb{{$i}}">

                                                        <option>--:--</option>

                                                        @foreach ($debuts as $debut)

                                                            <option value="{{substr($debut->debut,0,5)}}">{!! substr($debut->debut,0,5) !!}</option>

                                                            {{-- expr --}}
                                                        @endforeach


                                                        {{--  --}}
                                                    </select>
                                                @endif 

                                                {{--  --}}
                                            </td>

                                            <td colspan="2">

                                                @if($journees[$i]->disponible==1)

                                                    <select class="show-tick form-control" name="heurefin" id="heurefin{{$i}}">

                                                        <option>{!! substr($journees[$i]->heurefin,0,5) !!}</option>

                                                        @foreach ($fins as $fin)

                                                            <option value="{{substr($fin->fin,0,5)}}">{!! substr($fin->fin,0,5) !!}</option>

                                                            {{-- expr --}}
                                                        @endforeach
                                                    </select>
                                                @endif

                                                @if($journees[$i]->disponible==0)

                                                    <select class="show-tick form-control" name="heurefin" id="heurefin{{$i}}">

                                                        <option>--:--</option>

                                                        @foreach ($fins as $fin)

                                                            <option value="{{substr($fin->fin,0,5)}}">{!! substr($fin->fin,0,5) !!}</option>

                                                            {{-- expr --}}
                                                        @endforeach

                                                        {{--  --}}
                                                    </select>
                                                @endif 

                                                {{--  --}}
                                            </td>

                                            <td> 

                                                <button class="btn btn-success save" id="{{$journees[$i]->id}}" onclick="registerjournee(event,this)"> Enregistrer</button> 
                                            </td>

                                            {{--  --}}
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

        <script src="{{ asset('js/enregistrerjournee.js') }}"></script>
        {{--  --}}
    </div>
 {{--  --}}   
@endsection



@section('styles')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

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

</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  var checkbox = document.querySelector('input[type="checkbox"]');

  $('.powerButton').on('change', function () {
    
    console.log($(this)[0].id);
    $('#'+$(this)[0].id).val(Number($(this)[0].checked))    
  });
});



</script>
@endsection