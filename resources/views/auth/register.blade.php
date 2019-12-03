@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="securityPin" class="col-md-4 col-form-label text-md-right">{{ __('Security pin') }}</label>

                            <div class="col-md-6">
                                <input id="securityPin" type="text" class="form-control @error('securityPin') is-invalid @enderror" name="securityPin" value="{{ old('securityPin') }}" required autocomplete="securityPin" autofocus>

                                @error('securityPin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fathersName" class="col-md-4 col-form-label text-md-right">{{ __('Fathers Name') }}</label>

                            <div class="col-md-6">
                                <input id="fathersName" type="text" class="form-control @error('fathersName') is-invalid @enderror" name="fathersName" value="{{ old('fathersName') }}" required autocomplete="fathersName" autofocus>

                                @error('fathersName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mothersName" class="col-md-4 col-form-label text-md-right">{{ __('mothersName') }}</label>

                            <div class="col-md-6">
                                <input id="mothersName" type="text" class="form-control @error('mothersName') is-invalid @enderror" name="mothersName" value="{{ old('mothersName') }}" required autocomplete="mothersName" autofocus>

                                @error('mothersName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NID" class="col-md-4 col-form-label text-md-right">{{ __('NID') }}</label>

                            <div class="col-md-6">
                                <input id="NID" type="text" class="form-control @error('NID') is-invalid @enderror" name="NID" value="{{ old('NID') }}" required autocomplete="NID" autofocus>

                                @error('NID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('dateOfBirth') }}</label>

                            <div class="col-md-6">
                                <input id="dateOfBirth" type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autocomplete="dateOfBirth" autofocus>

                                @error('dateOfBirth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomenyName" class="col-md-4 col-form-label text-md-right">{{ __('nomenyName') }}</label>

                            <div class="col-md-6">
                                <input id="nomenyName" type="text" class="form-control @error('nomenyName') is-invalid @enderror" name="nomenyName" value="{{ old('nomenyName') }}" required autocomplete="nomenyName" autofocus>

                                @error('nomenyName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomenyRelation" class="col-md-4 col-form-label text-md-right">{{ __('nomenyRelation') }}</label>

                            <div class="col-md-6">
                                <input id="nomenyRelation" type="text" class="form-control @error('nomenyRelation') is-invalid @enderror" name="nomenyRelation" value="{{ old('nomenyRelation') }}" required autocomplete="nomenyRelation" autofocus>

                                @error('nomenyRelation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
