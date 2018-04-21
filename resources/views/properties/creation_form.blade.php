@extends('layouts.app')

@php $editing = (strpos(Request::url(), 'edit') !== false); @endphp

@section('title')
    <title>{{($editing)? 'Edit' : 'Add A' }} Property {{($editing)? $property->id : '' }}</title>
@stop

@section('content')
    <div style="text-align: center;">
        <h1>{{($editing)? 'Edit Your' : 'Add A' }} Property</h1>
        <form method="post" action="{{ ($editing)? url('properties/'.$property->id) : url('properties') }}"  enctype="multipart/form-data" class="dauntless-form">
            {{csrf_field()}}
            @if($editing) <input type="hidden" name="_method" value="PUT"> @endif
            <div class="input-wrapper">
                <label for="name">Property Name</label>
                <input type="text" name="name" id="name" value="{{($editing)? $property->name : '' }}" />
            </div>
            <div class="input-wrapper">
                <label for="address">Location</label>
                <input type="text" name="address" id="address" value="{{($editing)? $property->address : '' }}" />
            </div>
            <div class="input-wrapper">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5" cols="30">{{($editing)? $property->description : '' }}</textarea>
            </div>
            <div class="input-wrapper">
                <label for="image">{{($editing)? 'Upload New ' : '' }}Photo</label> <input type="file" name="image" id="image" />
                @if($editing && !empty($property->image))
                    <img src="/images/{{ $property->image }}" style="max-width: 200px;"/>
                @endif
            </div>
            <div class="input-wrapper">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{($editing)? $property->start_date : '' }}" />
            </div>
            <div class="input-wrapper">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="{{($editing)? $property->end_date : '' }}" />
            </div>
            <div class="input-wrapper"><div></div><input type="submit"name="submit" value="{{($editing)? 'Edit' : 'Add' }} Property"></div>
        </form>
    </div>
@stop
