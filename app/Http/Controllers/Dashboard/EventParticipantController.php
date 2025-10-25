<?php

namespace App\Http\Controllers;

use App\Models\EventParticipant;
use App\Http\Requests\StoreEventParticipantRequest;
use App\Http\Requests\UpdateEventParticipantRequest;
use App\Http\Controllers\Controller;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventParticipantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventParticipantRequest $request, EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventParticipant $eventParticipant)
    {
        //
    }
}
