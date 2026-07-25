<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{getSettingData('config_company_prefix').' '. getSettingData('config_company_name') }} | Admin</title>
        <link rel="apple-touch-icon" href="{{ asset('admin/app-assets/images/ico/apple-icon-120.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(getImage(getSettingData('company_fav_logo'))) }}">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/bordered-layout.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.min.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/plugins/forms/form-validation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/authentication.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
        <!-- END: Custom CSS-->

        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN Vendor JS-->
    </head>

    <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

        <!-- BEGIN: Content-->
        @yield('content')
        <!-- END: Content-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('admin/app-assets/js/core/app-menu.min.js') }}"></script>
        <script src="{{ asset('admin/app-assets/js/core/app.min.js') }}"></script>
        <!-- END: Theme JS-->

        <script>
            $(window).on('load', function () {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
    </body>
</html>