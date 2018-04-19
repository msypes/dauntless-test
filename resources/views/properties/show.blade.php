<?php
/**
 * @file show.blade.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project dauntless
 *
 * @abstract
 */
?>
        <!DOCTYPE html>
<html>
<head>
    <title>Property {{ $property->id }}</title>
</head>
<body>
<h1>property {{ $property->id }}</h1>
<p>Name: {{ $property->name }}</p>
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


</body>
</html>

