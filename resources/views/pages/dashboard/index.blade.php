@extends('layouts.dashboard')

@section('content-dashboard')
    @if (auth()->user()->role != 'user')
        @if (auth()->user()->role == 'admin')
            <div class="sm:col-span-6! lg:col-span-4!">
                <x-dashboard.data-count title="Pengguna" count="{{ $count['user'] }}" percent="{{ $growth['user'] }}"
                    icon="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </div>

            <div class="sm:col-span-6! lg:col-span-4!">
                <x-dashboard.data-count title="Pembicara" count="{{ $count['speaker'] }}" percent="{{ $growth['speaker'] }}"
                    icon="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
            </div>
            <div class="sm:col-span-6! lg:col-span-4!">
                <x-dashboard.data-count title="Tema" count="{{ $count['theme'] }}" percent="{{ $growth['theme'] }}"
                    icon="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />

            </div>
        @endif



        <div class="sm:col-span-6!">
            <x-dashboard.data-count title="Event" count="{{ $count['event'] }}" percent="{{ $growth['event'] }}"
                icon="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
        </div>
        <div class="col-span-full! lg:col-span-6!">
            <x-dashboard.data-count title="Peserta" count="{{ $count['eventParticipant'] }}"
                percent="{{ $growth['eventParticipant'] }}"
                icon="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
        </div>
    @endif

    <div class="lg:col-span-6!">
        <h2 class="mb-4">User Terbaru</h2>
        <div class="my-table">
            <table>
                <thead>
                    <tr>
                        <th>
                            <div
                                class="hover:cursor-pointer hover:[&_svg]:stroke-slate-700! hover:[&_svg]:stroke-4! flex gap-x-2.5">
                                <span>No</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Username</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Phone</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Role</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Status</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $item)
                        <tr>
                            <td>
                                <div>{{ $loop->iteration }}</div>
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
                                    class="option w-fit border  {{ $item->role == 'admin' ? 'bg-sky-500' : ($item->role == 'eo' ? 'bg-emerald-500' : 'bg-amber-500') }}">
                                    {{ $item->role }}
                                </div>
                            </td>
                            <td>
                                <div class="w-20 text-left flex">
                                    <span class="w-6 grid place-items-center">{!! $item->status == 'accept' ? '&#10004;' : ($item->status == 'pending' ? '&#9203;' : '&#10006;') !!}</span>
                                    {{ $item->status }}

                                </div>
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
    </div>
    <div class="lg:col-span-6!">
        <h2 class="mb-4">User Terbaru</h2>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
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
                                <span>Judul</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Pembicara</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Pemilik</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Tema</span>
                            </div>
                        </th>
                        <th>
                            <div>
                                <span>Status</span>
                            </div>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($event as $item)
                        <tr>
                            <td>
                                <div>{{ $loop->iteration }}</div>
                            </td>
                            <td>
                                <div>
                                    <a href="{{ $item->thumbnail['url'] }}">
                                        <img class="max-w-[70px]! aspect-square" src="{{ $item->thumbnail['url'] }}" />
                                    </a>
                                </div>
                            </td>

                            <td>
                                <div>{{ $item->name }}</div>
                            </td>
                            <td>
                                <div>
                                    {{ $item->speaker->name }}
                                </div>
                            </td>
                            <td>
                                <div class="">{{ $item->user->username }}</div>
                            </td>
                            <td>

                                <div class="">{{ $item->theme->name }}</div>
                            </td>
                            <td>
                                <div class="w-20 text-left flex">
                                    <span class="w-6 grid place-items-center">{!! $item->status == 'accept' ? '&#10004;' : ($item->status == 'pending' ? '&#9203;' : '&#10006;') !!}</span>
                                    {{ $item->status }}

                                </div>
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
    </div>
@endsection
