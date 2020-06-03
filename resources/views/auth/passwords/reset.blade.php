@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-white bg-info  mb-3" style="margin-top: 85px"  >


                    <div class="card-body" >
                        @if(request()->cookie('id_verified') == 'true')
                            <a href="{{route('login.patient')}}">login</a>
                        @else
                            <form method="POST" action="{{ route('verify.post') }}">
                                @csrf
                                <div class="card-title">
                                    <p>On vient de vous envoyer un code de vérification</p>
                                </div>
                                <div class="card-text">

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                            Veuillez entrez votre code :
                                        </label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="text" name="phone_code" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-rounded btn-outline-light">
                                                Confirmer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
