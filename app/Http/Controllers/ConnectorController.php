<?php

namespace App\Http\Controllers;

use App\Models\Connector;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConnectorRequest;
use App\Http\Requests\UpdateConnectorRequest;

class ConnectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Connector::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $connector = Connector::create([
            'name' => $request->name,
            'description' => $request->description,
            'station_id' => $request->station_id,

        ]);


        return response()->json([
            'message'=>'connector registered successfully',
            'connector'=>$connector
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Connector $connector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConnectorRequest $request, Connector $connector)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Connector $connector)
    {
        //
    }
}
