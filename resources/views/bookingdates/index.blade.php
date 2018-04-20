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
    <title>Available Dates</title>
</head>
<body>
<form name="book-dates" id="book-dates" method="post" action="{{url('bookingdates')}}">
    {{csrf_field()}}
    <ul>
    @foreach($properties as $property)
        <li>Property: {{ $property['name'] }}<br>
            <?php
                $available_dates = array_filter($property['dates'], function($date){
                	return empty($date['booked_by']);
                });
            ?>
            {{ count($available_dates) }} dates available for this property between {{ $start_date }} &amp; {{ $end_date }}
            <ol>
            @foreach($property['dates'] as $date)
                <li class="@if(empty($date['booked_by'])) available @else unavailable @endif">
                    @if(empty($date['booked_by']))
                        <label for="book_date_{{$date['id']}}">
                        <input type="checkbox" name="book_date[]" id="book_date_{{$date['id']}}" value="{{$date['id']}}" />
                    @endif
                        {{$date['date']}}
                    @if(empty($date['booked_by']))
                        </label>
                    @endif

                </li>
            @endforeach
            </ol>
       </li>
    @endforeach
    </ul>
    <div class="input-wrapper"><input type="submit"name="submit" value="Book Selected Dates"></div>

</form>
</body>
</html>

