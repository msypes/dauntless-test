<!DOCTYPE html>
<html>
<head>
    <title>Add A Property</title>
</head>
<body>
<h1>Add a Property</h1>
<form method="get" action="{{ url('bookingdates') }}">
    {{csrf_field()}}
    <div>Find a property to book by date</div>
    <div class="input-wrapper">
        <label for="start_date">Start Date</label> <input type="date" name="start_date" id="start_date" value="" />
    </div>
    <div class="input-wrapper">
        <label for="end_date">End Date</label> <input type="date" name="end_date" id="end_date" value="" />
    </div>
    <div class="input-wrapper"><input type="submit"name="submit" value="Find Available Dates"></div>
</form>
</body>
</html>