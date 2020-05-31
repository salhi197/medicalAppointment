@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                @if(request()->cookie('id_verified') == 'true')
                    <a href="{{route('login.patient')}}">login</a>
                @else
                <form method="POST" action="{{ route('verify.post') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">confirmer numéro de téléphone :</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" name="phone_code" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    confirmer
                                </button>
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
