<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return User::with('reservation')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConnectorRequest $request)
    {
        $user = User::create([
            'name' => $request->nom,
            'email' => $request->regemail,
            'password'=> Hash::make($request->regPassword),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message'=>'User registered successfully',
            'user'=>$user,
            'token'=>$token
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
