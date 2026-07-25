<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $meta_title ?? '' }}</title>
        <meta name="description" content="{{ $meta_description ?? '' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ $meta_keyword ?? '' }}" />

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/'.getSettingData('company_fav_logo')) }}">
        
        <!-- CSS here -->
        @include('elements.front_header_script')

        {!! $schema_tag ?? '' !!}
    </head>
    <body>
        <!-- preloader start -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- preloader end  -->

        <!-- header start -->
        <header>
            @include('elements.front_header')
        </header>
        <!-- header end -->

        <main>
            @yield('content')
        </main>

        <!-- footer start -->
        <footer>
            @include('elements.front_footer')
        </footer>
        <!-- footer end -->

        <!-- JS here -->
        @include('elements.front_footer_script')

        @stack('script')
    </body>
</html>