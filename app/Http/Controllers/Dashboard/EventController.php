<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Event\IndexRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {

        $validated = $request->validated();
        $validated = $request->safe()->all();

        $perPage = $request->input('perPage', 10);
        $status = $request->input('status');
        $search = $request->input('search', '');
        $orderDirection = $request->input('orderDirection', 'desc');

        $event = Event::query()->select('id', 'thumbnail', 'slug', 'name', 'speaker', 'status')
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when(auth()->user()->role != 'admin', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })
            ->orderBy('id', $orderDirection)
            ->paginate($perPage, ['id', 'thumbnail', 'slug', 'name', 'speaker', 'status']);

        $event->appends($validated);

        return view('pages.dashboard.event.index', [
            'page' => 'Event',
            'title' => 'Halaman Event',
            'desc' => 'Halaman Event',
            'data' => $event,
        ]);
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
    public function store(StoreEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
