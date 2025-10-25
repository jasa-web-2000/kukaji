@php
    $contactItem = [
        [
            'label' => phoneNumber(),
            'href' => whatsapp(web()->adminWhatsapp),
            'icon' =>
                'M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z',
        ],
    ];
@endphp
<div class="my-space"></div>
<footer class="relative mt-10">
    <div class="hero-gradient"></div>
    <div class="relative my-container">
        <div
            class="py-12 grid gap-8 sm:gap-10 grid-cols-1 sm:grid-cols-2 md:grid-cols-12 [&_h3]:mb-3 [&_h3]:text-text-title-white [&_.footerList]:flex [&_.footerList]:flex-col [&_.footerList]:gap-y-2 [&_:is(p,.footerList_a)]:text-text-description-white [&_.footerList_a]:hover:text-primary/80 [&_.footerList_a]:flex [&_.footerList_a]:items-center [&_.footerList_a]:gap-1.5 [&_.footerList_a_svg]:shrink-0">



            <!-- Logo -->
            <div class="sm:col-span-full md:col-span-6 sm:max-w-3/4 md:max-w-full lg:max-w-[400px]">
                <x-logo />
                <p class="light">
                    Ayo jadwalkan travel anda bersama <strong>{{ web()->title }}</strong>, siap membantu 24 jam. -
                    {{ web()->tagline }}.
                </p>
            </div>

            <!-- Laman -->
            <div class="sm:col-span-1 md:col-span-2">
                <h3 class="light">Laman</h3>
                <div class="footerList">
                    @foreach (menu() as $item)
                        <a class="{{ $item[0] == request()->url() ? 'text-primary/95!' : '' }} "
                            href="{{ $item[0] }}" title="{{ $item[1] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>


                            {{ $item[1] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Kontak -->
            <div class="sm:col-span-1 md:col-span-4">
                <h3 class="light">Kontak</h3>
                <a target="_blank" rel="nofollow noindex"
                    class="animate-bounce bg-linear-to-bl hover:from-green-600 hover:to-green-800 from-green-700 to-green-900 rounded-full fixed right-5 bottom-5 p-3 shadow z-999 hover:rotate-12 duration-300"
                    href={{ whatsapp(web()->adminWhatsapp) }} title="whatsapp">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="text-slate-50 w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                    </svg>
                    <span class="hidden">{{ phoneNumber() }}</span>
                </a>
                <div class="footerList">

                    @foreach ($contactItem as $item)
                        <a target="_blank" href="{{ $item['href'] }}" rel="nofollow noindex"
                            title="{{ $item['label'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-[18px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                            </svg>

                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="text-center text-sm text-slate-300 border-t border-slate-700 py-5">
            <p>
                Copyright © since Oct 2025 - {{ date('M Y') }} |
                {{ web()->title }}.
            </p>
            <p>
                Developed by
                <a target="_blank" class="underline text-slate-300" href={{ developer()->url }}
                    title={{ developer()->name }}>
                    {{ developer()->name }}
                </a>
            </p>
        </div>
    </div>
</footer>
