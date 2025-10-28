<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\IndexRequest;
use App\Http\Requests\Dashboard\User\StoreRequest;
use App\Http\Requests\Dashboard\User\UpdateRequest;
use Exception;

class UserController extends Controller
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
        $role = $request->input('role', '');
        $orderDirection = $request->input('orderDirection', 'desc');

        $user = User::query()->select('id', 'username', 'role', 'phone', 'status')
            ->withCount(['eventCreate', 'eventParticipant'])
            ->when($role, function ($query, $role) {
                $query->where('role', $role);
            })
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->where(function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            })
            ->orderBy('id', $orderDirection)
            ->paginate($perPage, ['id', 'username', 'role', 'phone', 'status']);

        $user->appends($validated);

        return view('pages.dashboard.user.index', [
            'page' => 'Pengguna',
            'title' => 'Halaman Pengguna',
            'desc' => 'Halaman Pengguna',
            'data' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.user.create', [
            'page' => 'Tambah Pengguna',
            'title' => 'Halaman Tambah Pengguna',
            'desc' => 'Halaman Tambah Pengguna',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');

                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                $destination = public_path('img/photos');
                if (!file_exists($destination)) {
                    mkdir($destination, 0777, true);
                }

                $file->move($destination, $filename);

                $data['photo'] = 'img/photos/' . $filename;
            }

            User::create($data);

            return redirect()->route('dashboard.user.index')->withErrors(['Pengguna berhasil ditambahkan!']);
        } catch (Exception $e) {
            return back()->withErrors(['Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.dashboard.user.edit', [
            'page' => 'Edit Pengguna',
            'title' => 'Halaman Edit Pengguna',
            'desc' => 'Halaman Edit Pengguna',
            'data' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {

        $auth = auth()->user();
        if ($auth->role != 'admin' && $auth->id != $user->id) {
            return redirect()->back()->withErrors(['Akses ditolak!']);
        }

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }


        try {
            if ($request->hasFile('photo')) {
                if (file_exists($user->photo['path'])) {
                    unlink($user->photo['path']);
                }

                $file = $request->file('photo');

                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                $destination = public_path('img/photos');
                if (!file_exists($destination)) {
                    mkdir($destination, 0777, true);
                }

                $file->move($destination, $filename);

                $data['photo'] = 'img/photos/' . $filename;
            }

            $user->update($data);

            return redirect()->back()->withErrors(['Pengguna berhasil diperbaharui!']);
        } catch (Exception $e) {
            return back()->withErrors(['Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if ($user->id == 1) {
            return back()->withErrors(['Pengguna
             default tidak boleh dihapus!']);
        }

        if ($user->id == auth()->user()->id) {
            return back()->withErrors(['Akun sendiri tidak boleh dihapus!']);
        }

        $user->delete();

        return redirect()->back()->withErrors(['Pengguna berhasil dihapus!']);
    }
}
