@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 10vh">
            <div class="card">
                <div class="card-header">{{ __('Security Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('security.register') }}">
                        @csrf

                        {{-- Branch Name --}}
                        <div class="form-group row">
                            <label for="branch_name" class="col-md-4 col-form-label text-md-right">Branch Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('branch_name') is-invalid @enderror" name="branch_name"
                                    value="{{ old('branch_name') }}" required autocomplete="branch_name" autofocus>

                                @error('branch_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email Address --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Security Question --}}
                        <div class="form-group row">
                            <label for="security_question" class="col-md-4 col-form-label text-md-right">Security Question</label>
                        
                            <div class="col-md-6">
                                <input id="security_question" type="text" class="form-control @error('security_question') is-invalid @enderror" name="security_question"
                                    value="{{ old('security_question') }}" required autocomplete="security_question" autofocus>
                        
                                @error('security_question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Security Answer --}}
                        <div class="form-group row">
                            <label for="security_answer" class="col-md-4 col-form-label text-md-right">Security Answer</label>
                        
                            <div class="col-md-6">
                                <input id="security_answer" type="text" class="form-control @error('security_answer') is-invalid @enderror"
                                    name="security_answer" value="{{ old('security_answer') }}" required autocomplete="security_answer"
                                    autofocus>
                        
                                @error('security_answer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Security Key --}}
                        <div class="form-group row">
                            <label for="security_key" class="col-md-4 col-form-label text-md-right">Security Key</label>
                        
                            <div class="col-md-6">
                                <input id="security_key" type="text" class="form-control @error('security_key') is-invalid @enderror"
                                    name="security_key" value="{{ old('security_key') }}" required autocomplete="security_key"
                                    autofocus>
                        
                                @error('security_key')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password Confirmation --}}
                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
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