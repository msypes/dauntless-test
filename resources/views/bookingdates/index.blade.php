@extends('layouts.app')

@section('title')
    <title>Available Dates</title>
@stop

@section('content')
<h1>Select Dates to Book</h1>
<p><strong>Please note that you cannot cancel any bookings at this time.</strong></p>

<form name="book-dates" id="book-dates" method="post" action="{{url('bookingdates')}}">
    {{csrf_field()}}
    <ul>
    @foreach($properties as $property)
        <li>Property: {{ $property['name'] }}<br>
            @php
                $available_dates = array_filter($property['dates'], function($date){
                	return empty($date['booked_by']) || $date['booked_by'] === Auth::id();
                });
            @endphp
            {{ count($available_dates) }} dates available for this property between {{ $start_date }} &amp; {{ $end_date }}
            <ol>
            @foreach($property['dates'] as $date)
                <li class="{{(empty($date['booked_by']))? 'available' : 'unavailable'}}">
                    @if(empty($date['booked_by']) || $date['booked_by'] === Auth::id())
                        <label for="book_date_{{$date['id']}}">
                        <input type="checkbox" name="book_date[]" id="book_date_{{$date['id']}}" value="{{$date['id']}}"
                        {{$date['booked_by'] === Auth::id()? 'checked' : ''}}
                        />
                    @endif
                        {{$date['date']}}
                    @if(empty($date['booked_by']) || $date['booked_by'] === Auth::id())
                        </label>
                    @endif
                    @if($date['booked_by'] === Auth::id())
                            <em class="you_booked">You booked this date</em>
                    @endif
                </li>
            @endforeach
            </ol>
       </li>
    @endforeach
    </ul>
    <div class="input-wrapper"><input type="submit"name="submit" value="Book Selected Dates"></div>

</form>
@stop
