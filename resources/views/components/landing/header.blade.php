<header class="bg-background-primary top-0 sticky z-99 shadow-lg">
    <div class="my-container">
        <div class="w-full py-1">
            <div class="flex justify-between">

                <!-- Logo -->
                <x-logo />

                <!-- Nav Laptop-->
                <div class="hidden md:flex items-center">
                    @include('components.landing.nav')
                </div>


                <!-- Nav Mobile-->
                <div class="block md:hidden! my-auto relative">
                    <button title="menu toggle" id="menu-toggle" class="btn-primary" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4 block in-[.active-menu_&]:hidden!">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4 hidden in-[.active-menu_&]:block! stroke-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>

                        Menu
                    </button>

                    <div class="hidden [.active-menu~&]:block! absolute top-9 right-0">
                        <div class="p-5 w-[200px] block md:hidden rounded-sm shadow-sm bg-background-primary">
                            @include('components.landing.nav')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
