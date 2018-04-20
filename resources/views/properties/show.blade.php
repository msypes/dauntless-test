@extends('layouts.app')

@section('title')
    <title{{ $property->name }}</title>
@stop

@section('content')
    <h1>{{ $property->name }}</h1>
    <p>Address: {{ $property->address }}</p>
    <p>Description: {{ $property->description }}</p>
    @if(!empty($property->image))
        <p><img src="/images/{{ $property->image }}" style="max-width: 200px;"/></p>
    @endif

    @if(!empty($property->bookingDates))
        @foreach($property->bookingDates as $date)
            <p>{{ $date->date }}</p>
        @endforeach
    @else
        <p>This property has no available dates.</p>
    @endif

    @if(Auth::id() === $property->owner)
        <p><a href="/properties/{{ $property->id }}/edit">Edit this property</a></p>
    @endif
@stop

