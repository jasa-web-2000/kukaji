<?php

if (! function_exists('phoneNumber')) {
    function phoneNumber(?string $phoneNumber = null, bool $link = false)
    {
        $resultPhoneNumber = $phoneNumber ?? '+62 882-1453-5126';

        return $link ? str_replace(['-', '+', ' '], '', $resultPhoneNumber) : $resultPhoneNumber;
    }
}

if (! function_exists('whatsapp')) {
    function whatsapp(?string $phoneNumber = null, ?string $message = "")
    {

        $encodedMessage = urlencode($message);

        return "https://api.whatsapp.com/send/?phone=$phoneNumber&text=$encodedMessage&type=phone_number&app_absent=0";
    }
}

if (! function_exists('img')) {
    function img(?string $localImgUrl = null, ?string $defaultUrl = null)
    {
        $resultUrl = $defaultUrl;

        if (isset($localImgUrl) && file_exists($localImgUrl)) {
            $resultUrl = asset($localImgUrl);
        }

        return $resultUrl;
    }
}



if (! function_exists('web')) {
    function web()
    {
        $data = [
            "title" => env('APP_NAME'),
            "tagline" => "Tumukan Kajianmu",
            "transparentLogo" => img('img/logo-nav.png'),
            "defaultLogo" => img('img/logo-asli.jpg'),
            "adminWhatsapp" => whatsapp(phoneNumber(null, true)),
        ];

        return (object) $data;
    }
}


if (! function_exists('developer')) {
    function developer()
    {
        $data = [
            "name" => "Dion Zebua",
            "url" => "https://dionzebua.com"
        ];

        return (object) $data;
    }
}




if (! function_exists('menu')) {
    function menu()
    {
        $data = [
            [route('landing.index'), "Beranda"],
            [route('landing.event'), "Event"],
        ];

        return (object) $data;
    }
}

if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        // $formatter = new \NumberFormatter('id_ID', \NumberFormatter::CURRENCY);
        // return $formatter->formatCurrency($angka, 'IDR');
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        return isset($date) ? \Carbon\Carbon::parse($date)->format('Y-m-d') : null;
    }
}

if (!function_exists('exceptRoutes')) {
    function exceptRoutes()
    {
        $exceptRoutes = [
            'dashboard.user.update',
            'dashboard.profile.index',
            'dashboard.logout',
        ];

        return $exceptRoutes;
    }
}
