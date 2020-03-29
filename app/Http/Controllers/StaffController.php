<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Staff[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
		$objStaff = new Staff();

		return $objStaff->all();
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StaffRequest $request)
    {
        $objStaff = new Staff();
        $staff = $objStaff->create($request->validated());
        if($staff) {
        	return response()->json(['message' => 'Success']);
		}

		return response()->json(['message' => 'Error'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StaffRequest $request, Staff $staff)
    {
		$staff->name = $request->input('name');
		$staff->email = $request->input('email');

		if($staff->save()) {
			return response()->json(['message' => 'Success']);
		}

		return response()->json(['message' => 'Error'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Staff $staff)
    {
        try{
        	$staff->delete();
			return response()->json(['message' => 'Success']);
		}catch (\Exception $e) {
			return response()->json(['message' => 'Error'], 400);
		}
    }
}
