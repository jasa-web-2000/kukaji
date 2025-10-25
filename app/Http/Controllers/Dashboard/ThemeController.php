<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Theme;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Theme\IndexRequest;
use App\Http\Requests\Dashboard\Theme\StoreRequest;
use App\Http\Requests\Dashboard\Theme\UpdateRequest;
use App\Models\Event;

class ThemeController extends Controller
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

        $theme = Theme::query()->select('id', 'name')
            ->where('name', 'like', "%{$search}%")
            ->orderBy('id', $orderDirection)
            ->paginate($perPage, ['id', 'name']);

        $theme->appends($validated);

        return view('pages.dashboard.theme.index', [
            'page' => 'Tema',
            'title' => 'Halaman Tema',
            'desc' => 'Halaman Tema',
            'data' => $theme,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.theme.create', [
            'page' => 'Tambah Tema',
            'title' => 'Halaman Tambah Tema',
            'desc' => 'Halaman Tambah Tema',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        Theme::create($data);

        return redirect()->route('dashboard.theme.index')->withErrors(['Tema berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        return view('pages.dashboard.theme.edit', [
            'page' => 'Edit Tema',
            'title' => 'Halaman Edit Tema',
            'desc' => 'Halaman Edit Tema',
            'data' => $theme,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Theme $theme)
    {
        $data = $request->validated();

        $theme->update($data);

        return redirect()->back()->withErrors(['Tema berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();

        return redirect()->back()->withErrors(['Tema berhasil dihapus!']);
    }
}
