<nav class="bg-background-primary border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="lg:hidden mr-2 text-text-description-black cursor-pointer p-2 hover:bg-background-secondary/80 focus:bg-background-secondary/80 focus:ring-2 ring-1 ring-gray-300 focus:ring-gray-500 bg-background-secondary/20 rounded">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <x-logo />
            </div>
            <div class="flex items-center group">
                <div class="flex items-center mr-1 text-text-description-black">
                    <span class="text-sm font-normal">{{ Str::limit(Auth::user()->username, 6, '...') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-3.5 mx-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>

                </div>
                <div class='relative'>
                    <div>
                        <button type='button'
                            class='relative flex rounded-full bg-slate-800 focus:outline-none focus:ring-2 focus:ring-mine'
                            id='user-menu-button'>
                            <img class='h-7 w-7 rounded-full' src={{ Auth::user()->photo['url'] }} alt='Foto Profil' />
                        </button>
                    </div>
                    <div class='hidden group-hover:block top-full pt-5 right-1 w-max absolute'>
                        <div
                            class='rounded-lg text-sm bg-white p-4! shadow **:block [&_a]:p-2 [&_a]:text-slate-600 [&_a]:rounded-lg [&_a]:hover:text-primary [&_a]:hover:bg-background-secondary focus:[&_a]:outline-none [&_a]:w-full [&_a]:flex [&_a]:my-1 [&_a]:text-left [&_svg]:size-5 [&_svg]:opacity-80 [&_svg]:mr-3'>
                            <div class="mb-3 max-w-44 [&_span]:line-clamp-1!">
                                <span class="text-sm block font-medium text-gray-700 dark:text-gray-400">
                                    Musharof Chowdhury
                                </span>
                                <span class="text-xs mt-0.5 text-gray-500 dark:text-gray-400">
                                    {{ auth()->user()->email }}
                                </span>
                            </div>

                            <a class="{{ $page == 'Profil' ? 'text-primary! bg-background-secondary' : '' }}"
                                href="{{ route('dashboard.profile.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Profil
                            </a>

                            <a class="{{ $page == 'Reset Password' ? 'text-primary! bg-background-secondary' : '' }}"
                                href="{{ route('dashboard.reset-password.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                </svg>

                                Reset Password
                            </a>

                            <span class='h-px bg-slate-100 my-2'></span>
                            <form action={{ route('dashboard.logout') }} method="POST">
                                @csrf
                                <button type="submit" class="w-full">
                                    <a><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        Logout</a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
