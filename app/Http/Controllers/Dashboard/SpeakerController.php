<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Speaker;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Speaker\IndexRequest;
use App\Http\Requests\Dashboard\Speaker\StoreRequest;
use App\Http\Requests\Dashboard\Speaker\UpdateRequest;

class SpeakerController extends Controller
{
    public function index(IndexRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->all();

        $perPage = $request->input('perPage', 10);
        $search = $request->input('search', '');
        $orderDirection = $request->input('orderDirection', 'desc');

        $speaker = Speaker::query()->select('id', 'name')
            ->where('name', 'like', "%{$search}%")
            ->orderBy('id', $orderDirection)
            ->paginate($perPage, ['id', 'name']);

        $speaker->appends($validated);

        return view('pages.dashboard.speaker.index', [
            'page' => 'Pembicara',
            'title' => 'Halaman Pembicara',
            'desc' => 'Halaman Pembicara',
            'data' => $speaker,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.speaker.create', [
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

        return redirect()->route('dashboard.speaker.index')->withErrors(['Pembicara berhasil ditambahkan!']);
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
        return view('pages.dashboard.speaker.edit', [
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
        if ($speaker->id == 1) {
            return back()->withErrors(['Pembicara default tidak boleh dihapus!']);
        }
        $speaker->delete();

        return redirect()->back()->withErrors(['Pembicara berhasil dihapus!']);
    }
}
