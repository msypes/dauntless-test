@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p>
                        <p>Choose from the following:</p>
                        <ul class="navbar-nav mr-auto">
                            <li><a href="{{url('properties')}}">View Properties</a></li>
                            <li><a href="{{url('properties/create')}}">Add A Property</a></li>
                            <li><a href="{{url('bookingdates/search')}}">Search Booking Dates</a></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
