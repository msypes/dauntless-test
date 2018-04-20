@extends('layouts.app')

@section('title')
    <title>Current Properties</title>
@stop

@section('content')
<ul>
    @foreach($properties as $property)
        <li>Name: <a href="/properties/{{ $property->id }}">{{ $property->name }}</a><br>
        Address: {{ $property->address }}<br>
        Description: {{ $property->description }}<br>
            @if(!empty($property->image))
                <img class="thumbnail" src="/images/{{ $property->image }}"  style="max-width: 200px;"/>
            @endif
            @if(!empty($property->bookingDates))
                @foreach($property->bookingDates as $date)
                    {{ $date->date }}<br>
                @endforeach
            @endif
       </li>
    @endforeach
@stop

