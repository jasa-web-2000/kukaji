<nav class="bg-background-primary border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="lg:hidden mr-2 text-text-description-black cursor-pointer p-2 hover:bg-background-secondary/80 focus:bg-background-secondary/80 focus:ring-2 ring-1 ring-gray-300 focus:ring-gray-500 bg-background-secondary rounded">
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
                    <div class='hidden group-hover:block top-full pt-5 right-1 lg:-right-1 absolute w-48'>
                        <div
                            class='rounded-md text-sm bg-white py-1 shadow [&_a]:px-4 [&_a]:py-2 **:block [&_a]:text-slate-600 [&_a]:hover:text-primary focus:[&_a]:outline-none [&_a]:w-full [&_a]:text-left'>
                            <a class="{{ $page == 'Profil' ? 'text-primary!' : '' }}"
                                href="{{ route('dashboard.profile.index') }}">
                                Profil
                            </a>

                            <a class="{{ $page == 'Reset Password' ? 'text-primary!' : '' }}"
                                href="{{ route('dashboard.reset-password.index') }}">
                                Reset Password
                            </a>

                            <span class='h-px bg-slate-100'></span>
                            <form action={{ route('dashboard.logout') }} method="POST">
                                @csrf
                                <button type="submit" class="w-full">
                                    <a>Logout</a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
