<?php

namespace App\Http\Controllers;

use App\Models\EmployeeKPI;
use Illuminate\Http\Request;

class EmployeeKPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmployeeKPI::all();
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kpi = new EmployeeKPI();
        $kpi->fill($request->all());
        if ($kpi->save()) {
            return response()->json([
                'data' => $kpi
            ], 200);
        } else {
            return response()->json([
                'EmployeeKPI' => 'EmployeeKPI could not be added'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeKPI  $employeeKPI
     * @return \Illuminate\Http\Response
     */
    public function show($employeeKPI)
    {
        return EmployeeKPI::find($employeeKPI);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeKPI  $employeeKPI
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeKPI $employeeKPI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeKPI  $employeeKPI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employeeKPI)
    {
        var_dump($employeeKPI);
        $ekpi = EmployeeKPI::find($employeeKPI)->first();
        if ($ekpi) {
            $ekpi->update($request->all());
            if ($ekpi->save()) {
                return response()->json([
                    'data' => $ekpi
                ], 200);
            } else {
                return response()->json([
                    'EmployeeKPI' => 'EmployeeKPI could not be updated'
                ], 500);
            }
        }
        return response()->json([
            'EmployeeKPI' => 'EmployeeKPI could not be found'
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeKPI  $employeeKPI
     * @return \Illuminate\Http\Response
     */
    public function destroy($employeeKPI)
    {
        $ekpi = EmployeeKPI::find($employeeKPI)->first();
        if ($ekpi->delete()) { //returns a boolean
            return response()->json([
                'EmployeeKPI' => "kpi deleted"
            ], 200);
        } else {
            return response()->json([
                'EmployeeKPI' => 'EmployeeKPI could not be deleted'
            ], 500);
        }
    }
}