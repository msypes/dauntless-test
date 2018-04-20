<?php

namespace App\Http\Controllers;

use App\BookingDate;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PropertyController extends Controller
{
	/**
	 * Display a search form to find booking dates
	 *
	 * @param \Illuminate\Http\Request $request
	 */
	public function search(Request $request){
		return view('bookingdates.search_form');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if (empty($request->get('start_date')) && empty($request->get('end_date'))) {
			$properties = Property::all();
		} else {
		}

		return view('properties.index', ['properties' => $properties]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('properties.creation_form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$property = new Property( [
			'name' => $request->get('name'),
			'address'  => $request->get('address'),
			'description' => $request->get('description'),
			'owner' => Auth::id()
		]);

		$property->save();

		if (!empty($request->file( 'image' ))) {
			$imageName = $property->id . '.' .
			             $request->file( 'image' )
			                     ->getClientOriginalExtension();
			$request->file( 'image' )->move(
				base_path() . '/public/images/', $imageName
			);
			$property->update( [ 'image' => $imageName ] );
		}

		// Create Booking dates for each date from start to end
		$start_date = $request->get('start_date');
		$end_date = $request->get('end_date');

		$booking_date = $start_date;
		while($booking_date <= $end_date){
			$date = new BookingDate(['date' => $booking_date, 'property' => $property->id]);
			$date->save();
			$booking_date = date('Y-m-d', strtotime($booking_date . ' +1 day'));
		}

		return \Redirect::route('properties.index',
			array($property->id))->with('message', 'Property added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$property = Property::find($id);
		return view('properties.show', array('property' => $property));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$property = Property::find($id);

		// Only property owners can edit or delete properties.
		if($property->owner !== Auth::id()){
			return redirect('properties');
		}

		return view('properties.creation_form', ['property' => $property]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = Input::all();
		$property = Property::find($id);

		// Easy updates
		$property->update(['name' => $input['name'], 'address' => $input['address'], 'description' => $input['description']]);
		if (!empty($request->file( 'image' ))) {
			$imageName = $property->id . '.' .
			             $request->file( 'image' )
			                     ->getClientOriginalExtension();
			$request->file( 'image' )->move(
				base_path() . '/public/images/', $imageName
			);
			$property->update( [ 'image' => $imageName ] );
		}

		/*
		 * Ignoring updates to dates, because this is just a test.
		 * I'd need to check for dates that already exist, handle cases where
		 * they've already been booked, e.g.
		 */

		return redirect('properties/'.$id);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Not bothering with this as I want to focus on the core issues for the test.
	}
}
