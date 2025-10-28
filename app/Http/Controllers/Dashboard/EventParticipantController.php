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
            ->with(['user:id,username', 'event:id,user_id,name,thumbnail'])
            ->when(auth()->user()->role != 'admin', function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhereHas('event', function ($q) {
                        $q->where('user_id', auth()->id());
                    });
            })
            ->where(function ($q) use ($search) {
                $q->WhereHas('user', function ($q1) use ($search) {
                    $q1->where('username', 'like', "%{$search}%");
                })->orWhereHas('event', function ($q2) use ($search) {
                    $q2->where('name', 'like', "%{$search}%");
                });
            })
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
        // return view('pages.dashboard.event-participant.create', [
        //     'page' => 'Tambah Pembicara',
        //     'title' => 'Halaman Tambah Pembicara',
        //     'desc' => 'Halaman Tambah Pembicara',
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store() {}

    /**
     * Display the specified resource.
     */
    public function show(EventParticipant $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventParticipant $speaker) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(EventParticipant $speaker) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventParticipant $event_participant)
    {
        $event_participant->delete();

        return redirect()->back()->withErrors(['Peserta berhasil dihapus!']);
    }
}
