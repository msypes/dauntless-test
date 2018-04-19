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
    <title>Current Properties</title>
</head>
<body>
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
</ul>
</body>
</html>

