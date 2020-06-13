@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 5vh">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            {{-- First Name --}}
                            <div class="col-md-4">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Last Name --}}
                            <div class="col-md-4">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <div class="form-group row">                                
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Middle Name --}}
                            <div class="col-md-4">
                                <label for="middle_name" class="col-form-label">Middle Name</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                            value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>
                                
                                        @error('middle_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Email Address --}}
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">E-Mail Address</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="col-md-6">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">
                                
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Password Confirmation --}}
                            <div class="col-md-6">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            {{-- Phone Number --}}
                            <div class="col-md-4">
                                <label for="phone_number" class="col-form-label">{{ __('Phone Number') }}</label>
                                <div class="form-group row">                                
                                    <div class="col-md-12">
                                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number') }}" required autocomplete>
                                
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @if(session('phone_err'))
                                        <div class="text-danger text-center font-weight-bold">
                                            <small>{{ session('phone_err') }}</small>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- Date Of Birth --}}
                            <div class="col-md-4">
                                <label for="date_of_birth" class="col-form-label">{{ __('Date Of Birth') }}</label>
                                <div class="form-group row">                                
                                    <div class="col-md-12">
                                        <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth" required autocomplete>
                                
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @if(session('age_err'))
                                            <div class="text-danger text-center font-weight-bold">
                                                <small>{{ session('age_err') }}</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- Gender--}}
                            <div class="col-md-4">
                                <label for="gender" class="col-form-label">Gender</label>
                                <div class="form-group row">
                                    <div class="col-md-12 mt-2 d-flex justify-content-start">
                                        <div class="mx-2">
                                            <input type="radio" class=" @error('gender') is-invalid @enderror" name="gender" value="Male" required autofocus> Male
                                        </div>
                                        <div class="mx-2">
                                            <input type="radio" class=" @error('gender') is-invalid @enderror" name="gender" value="Male" required autofocus> Female
                                        </div>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Security Question --}}
                            <div class="col-md-6">
                                <label for="security_question" class="col-form-label">Security Question</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="security_question" type="text" class="form-control @error('security_question') is-invalid @enderror"
                                            name="security_question" value="{{ old('security_question') }}" required autocomplete="security_question"
                                            autofocus>
                                
                                        @error('security_question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Security Answer --}}
                            <div class="col-md-6">
                                <label for="security_answer" class="col-form-label">Security Answer</label>
                                <div class="form-group row">                                
                                    <div class="col-md-12">
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
