@extends('layouts.dashboard')

@section('content-dashboard')
    <div class="col-span-full!">

        <x-dashboard.header-table page="{{ $page }}" url="{{ route('dashboard.user.create') }}" />

        {{-- Filter --}}
        <x-dashboard.search-table search="username,phone" />

        {{-- Data --}}
        <div class="my-table">
            <table>
                <thead>
                    <tr>
                        <th>
                            @php
                                $currentDirection = request('orderDirection', '');
                                $newDirection = $currentDirection === 'asc' ? 'desc' : 'asc';
                            @endphp

                            <div onclick="window.location.href='{{ url()->current() }}?{{ http_build_query(request()->except('orderDirection')) }}&orderDirection={{ $newDirection }}'"
                                class="hover:cursor-pointer hover:[&_svg]:stroke-slate-700! hover:[&_svg]:stroke-4! flex gap-x-2.5">
                                <span>No</span>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="top-0.5 relative {{ $newDirection == 'desc' ? 'stroke-slate-700! stroke-[4px]' : '' }}">
                                        <polyline points="18 15 12 9 6 15"></polyline>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="bottom-0.5 relative {{ $newDirection == 'asc' ? 'stroke-slate-700! stroke-[4px]' : '' }}">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Thumbnail</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Name</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Speaker</span>
                            </div>
                        </th>

                        <th>
                            <x-dashboard.option-table name="Status" :list="['all', 'accept', 'pending', 'reject']" param="status" />
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>
                                <div>{{ $data->perPage() * ($data->currentPage() - 1) + $loop->iteration }}</div>
                            </td>
                            <td>
                                <div>{{ $item->username }}</div>
                            </td>
                            <td>
                                <div>
                                    <a class="text-slate-600/90" href="{{ whatsapp($item->phone) }}"
                                        target="_blank">{{ $item->phone }}
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div
                                    class="option w-16  {{ $item->role == 'admin' ? 'bg-sky-500' : ($item->role == 'eo' ? 'bg-emerald-500' : 'bg-amber-500') }}">
                                    {{ $item->role }}
                                </div>
                            </td>
                            <td>
                                <div class="w-20 text-left flex">
                                    <span class="w-6 grid place-items-center">{!! $item->status == 'accept' ? '&#10004;' : ($item->status == 'pending' ? '&#9203;' : '&#10006;') !!}</span>
                                    {{ $item->status }}

                                </div>
                            </td>
                            <td>
                                <x-dashboard.action-table :edit="route('dashboard.user.edit', ['user' => $item])" :destroy="route('dashboard.user.destroy', ['user' => $item])" :item="$item" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-5">
                                Data tidak ada!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        {{-- Pagination --}}
        <x-dashboard.pagination-table :pagination="$data" />


    </div>
@endsection
