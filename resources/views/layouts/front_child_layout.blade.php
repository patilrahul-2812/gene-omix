<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $meta_title ?? '' }}</title>
        <meta name="description" content="{{ $meta_description ?? '' }}">
        <meta name="image" content="">
        <meta name="keywords" content="{{ $meta_keyword ?? '' }}" />
        <!-- Fav Icon -->
        <link rel="shortcut icon" href="{{ asset('storage/'.getSettingData('company_fav_logo')) }}" type="image/x-icon" />

        @include('elements.front_header_assets')
    </head>

    <body>
        <header class="bg-white shadow fixed-top">
            @include('elements.front_header')
        </header>

        <div class="bg-light content-wrapper">
            @yield('content')
        </div>

        @include('elements.front_footer_assets')
    </body>
</html>