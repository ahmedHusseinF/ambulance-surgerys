@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Given_ID" class="col-md-4 col-form-label text-md-right">{{ 'Given_ID' }}</label>

                            <div class="col-md-6">
                                <input id="Given_ID" type="text" class="form-control{{ $errors->has('Given_ID') ? ' is-invalid' : '' }}" name="Given_ID" value="{{ old('Given_ID') }}" required>

                                @if ($errors->has('Given_ID'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Given_ID') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Gender" class="col-md-4 col-form-label text-md-right">{{ 'Gender' }}</label>

                            <div class="col-md-6">
                                <input id="Gender" type="text" class="form-control{{ $errors->has('Gender') ? ' is-invalid' : '' }}" name="Gender" value="{{ old('Gender') }}" required>

                                @if ($errors->has('Gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Age" class="col-md-4 col-form-label text-md-right">{{ 'Age' }}</label>

                            <div class="col-md-6">
                                <input id="Age" type="number" class="form-control{{ $errors->has('Age') ? ' is-invalid' : '' }}" name="Age" value="{{ old('Age') }}" required>

                                @if ($errors->has('Age'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Profession" class="col-md-4 col-form-label text-md-right">{{ 'Profession' }}</label>

                            <div class="col-md-6">
                                <input id="Profession" type="text" class="form-control{{ $errors->has('Profession') ? ' is-invalid' : '' }}" name="Profession" value="{{ old('Profession') }}" required>

                                @if ($errors->has('Profession'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Profession') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
