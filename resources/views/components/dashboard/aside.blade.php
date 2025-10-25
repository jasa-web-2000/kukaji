@php
    $menu = [
        [
            'name' => 'Navigasi',
            'menu' => [
                [
                    'name' => 'Dashboard',
                    'svg' =>
                        'M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z',
                    'route' => route('dashboard.index'),
                ],
                [
                    'name' => 'Landing Page',
                    'svg' =>
                        'M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418',
                    'route' => route('landing.index'),
                ],
            ],
        ],
        [
            'name' => 'Data',
            'menu' => [
                [
                    'name' => 'Pengguna',
                    'svg' =>
                        'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z',
                    'route' => route('dashboard.user.index'),
                ],
                [
                    'name' => 'Event',
                    'svg' =>
                        'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z',
                    'route' => route('dashboard.event.index'),
                ],
                [
                    'name' => 'Peserta',
                    'svg' =>
                        'M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z',
                    'route' => route('dashboard.event-participant.index'),
                ],
                [
                    'name' => 'Pembicara',
                    'svg' =>
                        'M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z',
                    'route' => route('dashboard.speaker.index'),
                ],
                [
                    'name' => 'Tema',
                    'svg' =>
                        'M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59',
                    'route' => route('dashboard.theme.index'),
                ],
            ],
        ],
    ];
@endphp

<aside id="sidebar"
    class="fixed hidden z-20 h-full top-0 left-0 pt-16 lg:flex shrink-0 flex-col w-64 transition-width duration-75"
    aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-full max-h-full border-r border-gray-200 bg-white pt-0">
        <div class="flex-1 flex flex-col pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-background-primary divide-y space-y-1 pb-14">
                <ul class="space-y-2 pb-2 text-sm pt-5">
                    @foreach ($menu as $group)
                        <ul class="mb-7">
                            <div class="mb-3 flex items-center gap-x-2.5">
                                <span class="opacity-40 text-lg">{{ $group['name'] }}</span>
                                <span class="w-full h-px bg-gray-200/80"></span>
                            </div>
                            @foreach ($group['menu'] as $item)
                                <li class="mb-2!">

                                    <a href="{{ $item['route'] }}"
                                        class="text-slate-600 font-medium rounded-lg flex items-center p-2 hover:text-slate-800 hover:bg-background-secondary {{ $page == $item['name'] ? 'text-primary! bg-background-secondary! ' : '' }} group">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="size-[19px] text-gray-500 group-hover:text-primary stroke-current stroke-2 {{ $page == $item['name'] ? 'text-primary' : '' }}"
                                            fill="none" viewBox="0 0 24 24">
                                            <path d="{{ $item['svg'] }}" />
                                        </svg>
                                        <span class="ml-3">{{ $item['name'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</aside>
