<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'station'])->get();
        $MyReservations = Reservation::with(['user', 'station'])->where('user_id', auth()->id())->get();

        return response()->json([
            'reservations' => $reservations,
            'MyReservations' => $MyReservations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = Reservation::create([
            'start_time' => $request->start_time,
            'duration_minutes' => $request->duration_minutes,
            'status' => $request->status,
            'utilisateur_id' => $request->utilisateur_id,
            'station_id' => $request->station_id,
        ]);

        return response()->json([
            'reservation' => $reservation
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->start_time = $request->start_time;
        $reservation->duration_minutes = $request->duration_minutes;
        $reservation->status = $request->status;
        $updateReservation = $reservation->save();

        return response()->json([
            "message" => "update successfully",
            "station" => $updateReservation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->destroy();
        
        return response()->json([
            'message' => 'destroy successfully'
        ]);

    }
}
