<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $station = Station::all();

        return $station;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $station = Station::create([
            'name' => $request->name,
            'location' => $request->location,
            'power_kw' => $request->power_kw,
            'status' => $request->status,
            'connector_id' => $request->connector_id,
        ]);

        return response()->json([
            'station' => $station
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Station $station)
    {

        $station->name = $request->name;
        $updateStation = $station->save();

        return response()->json([
            "message" => "update successfully",
            "station" => $updateStation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Station $station)
    {
        $station->delete();

        return response()->json([
            "message" => "destroy successfully"
        ]);
    }
}
