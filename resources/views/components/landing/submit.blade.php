<div class="w-full col-span-full text-right mt-2">
    @if (!request()->routeIs(['login', 'signup']) && ENV('APP_ENV') == 'production')
        <div class="g-recaptcha w-full mb-4" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif
    <button class="btn-primary w-full" type="submit">Submit</button>
</div>
