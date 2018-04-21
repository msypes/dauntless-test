@extends('layouts.app')

@section('title')
    <title>Find A Property To Book</title>
@stop
</head>
<body>
@section('content')
    <h1>Find A Property To Book By Date</h1>
<form method="get" action="{{ url('bookingdates') }}" class="dauntless-form">
    {{csrf_field()}}
    <div class="input-wrapper">
        <label for="start_date">Start Date</label> <input type="date" name="start_date" id="start_date" value="" required/>
    </div>
    <div class="input-wrapper">
        <label for="end_date">End Date</label> <input type="date" name="end_date" id="end_date" value="" required />
    </div>
    <div class="input-wrapper"><input type="submit"name="submit" value="Find Available Dates"></div>
</form>
@stop