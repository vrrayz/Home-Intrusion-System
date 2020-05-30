@extends('layouts.app')
@section('main')
    <div class="col-md-6 mx-auto text-center mid-section">
        <img src="/img/padlock.svg" class="img-fluid padlock">
        <p class="title-text text-light">Home Intrusion System</p>
        <div class="d-flex justify-content-between">
            <a href="/login" class="btn btn-outline-light btn-block mr-2">Login</a>
            <a href="/register" class="btn btn-dark btn-block ml-2 mt-0 pb-2">Register</a>
        </div>
    </div>
@endsection