<?php

namespace App\Http\Controllers;

use App\BookingDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingDateController extends Controller
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
		$start_date = (empty($request->get('start_date')))? '' : $request->get('start_date');
		$end_date = (empty($request->get('end_date')))? '' : $request->get('end_date');
		//if (empty($request->get('start_date')) && empty($request->get('end_date'))) {
			$dates = BookingDate::all()->sortBy( 'property_id' );
//		} else {
//
//		}

		// Reorganize for the display
		$display = [];

		foreach($dates as $date){
			if (!isset($display[$date->property_id])) {
				$property                 = [
					'property_id' => $date->property_id,
					'name'        => $date->property->name,
					'address'     => $date->property->address,
					'description' => $date->property->description,
					'image'       => $date->property->image,
					'dates' => []
				];
				$display[ $date->property_id ] = $property;
			}

			if (($start_date === '' || $date->date >= $start_date) && ($end_date === '' || $date->date <= $end_date)){
				$display[ $date->property_id ]['dates'][ $date->id ] = [
					'id'          => $date->id,
					'date'        => $date->date,
					'booked_by'   => $date->booked_by,
					'booked_when' => $date->booked_when
				];
			}
		}
		return view('bookingdates.index', ['properties' => $display, 'start_date' => $start_date, 'end_date' => $end_date]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Updates booking dates.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$uid = Auth::id();

		$dates_to_book = $request->get('book_date');
		if(!empty($dates_to_book)){
			BookingDate::whereIn('id', $dates_to_book)
				->update(['booked_by' => $uid, 'booked_when' => date('Y-m-d H:i:s')]);
		}

		return redirect('bookingdates');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
