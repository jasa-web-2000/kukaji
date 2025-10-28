<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Event;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Requests\Dashboard\Event\IndexRequest;
use App\Http\Requests\Dashboard\Event\StoreRequest;
use App\Http\Requests\Dashboard\Event\UpdateRequest;

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

        $event = Event::query()->select('id', 'user_id', 'thumbnail', 'speaker_id', 'theme_id', 'slug', 'name', 'featured', 'status')
            ->with(['speaker:id,name', 'theme:id,name', 'user:id,username'])
            ->withCount(['eventParticipant', 'eventLike'])
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when(auth()->user()->role != 'admin', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%") // nama event
                    ->orWhereHas('speaker', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%{$search}%"); // nama speaker
                    })
                    ->orWhereHas('theme', function ($q3) use ($search) {
                        $q3->where('name', 'like', "%{$search}%"); // nama theme
                    })
                    ->orWhereHas('user', function ($q4) use ($search) {
                        $q4->where('username', 'like', "%{$search}%"); // username user
                    });
            })
            ->orderBy('id', $orderDirection)
            ->paginate($perPage, ['id', 'thumbnail', 'slug', 'name', 'status']);

        $event->appends($validated);

        // dd($event);
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
        return view('pages.dashboard.event.create', [
            'page' => 'Tambah Event',
            'title' => 'Halaman Tambah Event',
            'desc' => 'Halaman Tambah Event',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::user()->id;

        try {
            if ($request->hasFile('thumbnail')) {

                $file = $request->file('thumbnail');

                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                $destination = public_path('img/events');
                if (!file_exists($destination)) {
                    mkdir($destination, 0777, true);
                }

                $file->move($destination, $filename);

                $data['thumbnail'] = 'img/events/' . $filename;
            }

            Event::create($data);

            return redirect()->route('dashboard.event.index')->withErrors(['Event berhasil ditambahkan!']);
        } catch (Exception $e) {
            return back()->withErrors(['Gagal menyimpan data: ' . $e->getMessage()]);
        }
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
        $auth = auth()->user();
        if ($auth->role != 'admin' && $auth->id != $event->user_id) {
            return redirect()->back()->withErrors(['Akses ditolak!']);
        }

        return view('pages.dashboard.event.edit', [
            'page' => 'Edit Event',
            'title' => 'Halaman Edit Event',
            'desc' => 'Halaman Edit Event',
            'data' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Event $event)
    {
        $auth = auth()->user();
        if ($auth->role != 'admin' && $auth->id != $event->user_id) {
            return redirect()->back()->withErrors(['Akses ditolak!']);
        }

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        try {
            if ($request->hasFile('thumbnail')) {
                if (file_exists($event->thumbnail['path'])) {
                    unlink($event->thumbnail['path']);
                }

                $file = $request->file('thumbnail');

                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                $destination = public_path('img/events');
                if (!file_exists($destination)) {
                    mkdir($destination, 0777, true);
                }

                $file->move($destination, $filename);

                $data['thumbnail'] = 'img/events/' . $filename;
            }

            $event->update($data);

            return redirect()->back()->withErrors(['Event berhasil diperbaharui!']);
        } catch (Exception $e) {
            return back()->withErrors(['Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {

        $auth = auth()->user();
        if ($auth->role != 'admin' && $auth->id != $event->user_id) {
            return redirect()->back()->withErrors(['Akses ditolak!']);
        }

        $event->delete();

        return redirect()->back()->withErrors(['Event berhasil dihapus!']);
    }
}
