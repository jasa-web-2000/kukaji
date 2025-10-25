<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\EventParticipant;
use App\Http\Requests\StoreEventParticipantRequest;
use App\Http\Requests\UpdateEventParticipantRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EventParticipant\IndexRequest;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->all();

        $perPage = $request->input('perPage', 10);
        $search = $request->input('search', '');
        $orderDirection = $request->input('orderDirection', 'desc');

        $participant = EventParticipant::query()->select('id', 'user_id', 'event_id')
            // ->where('name', 'like', "%{$search}%")
            ->orderBy('id', $orderDirection)
            ->paginate($perPage, ['id', 'user_id', 'event_id']);

        $participant->appends($validated);

        return view('pages.dashboard.event-participant.index', [
            'page' => 'Peserta',
            'title' => 'Halaman Peserta',
            'desc' => 'Halaman Peserta',
            'data' => $participant,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.event-participant.create', [
            'page' => 'Tambah Pembicara',
            'title' => 'Halaman Tambah Pembicara',
            'desc' => 'Halaman Tambah Pembicara',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        Speaker::create($data);

        return redirect()->route('dashboard.event-participant.index')->withErrors(['Pembicara berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speaker $speaker)
    {
        return view('pages.dashboard.event-participant.edit', [
            'page' => 'Edit Pembicara',
            'title' => 'Halaman Edit Pembicara',
            'desc' => 'Halaman Edit Pembicara',
            'data' => $speaker,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Speaker $speaker)
    {
        $data = $request->validated();

        $speaker->update($data);

        return redirect()->back()->withErrors(['Pembicara berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        $speaker->delete();

        return redirect()->back()->withErrors(['Pembicara berhasil dihapus!']);
    }
}
