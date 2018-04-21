@extends('layouts.app')

@section('title')
    <title>Current Properties</title>
@stop

@section('content')
<ul id="properties-list">
    @foreach($properties as $property)
        <li>Name: <a href="/properties/{{ $property->id }}">{{ $property->name }}</a><br>
        Address: {{ $property->address }}<br>
        Description: {{ $property->description }}<br>
            @if(!empty($property->image))
                <img class="thumbnail" src="/images/{{ $property->image }}"  style="max-width: 200px;"/>
            @endif
            @if(count($property->bookingDates) > 0)
                Dates:
                <ol class="property-dates">
                    @foreach($property->bookingDates as $date)
                        <li class="{{!empty($date->booked_by)? 'unavailable' : 'available'}}">{{ $date->date }}</li>
                    @endforeach
                </ol>
            @else
                <p>No available dates.</p>
            @endif
       </li>
    @endforeach
@stop

