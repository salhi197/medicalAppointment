@extends('medecin')

@section('content')         

    <div class="row">

        <div class="col-lg-12 col-md-12">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Table de travail</h4>

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

                                                <div class="">

                                                  <label><input class="form-control" type="number" min="0" max="1" name="dispo" id="dispo{{$journees[$i]->id}}" value="{!! $journees[$i]->disponible !!}"></label>

    {{-- <select class="show-tick form-control" name="dispo">

        <option> Oui </option>
        <option> Non </option>

    </select>
 --}}
                                                </div>                                                    

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

                                                <button class="btn btn-success" id="{{$journees[$i]->id}}" onclick="registerjournee(event,this)"> Enregistrer</button> 
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
        </div>

        <script src="{{ asset('js/enregistrerjournee.js') }}"></script>
        {{--  --}}
    </div>
 {{--  --}}   
@endsection