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

    <body class="overflow-hidden-g">
        @if(check_curtain_data() == 1)
            <div class="modal inog-modal " tabindex="-1" role="dialog">
                <div class="modal-dialog modal-fl" role="document">
                    <div class="modal-content">
                        <div class="modal-body h-100 py-0">
                            <div class="inaugrate-img">
                                <img src="{{ asset('frontend/images/inaugration.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="weblogin-screen" style="display: none;">
                                <div class="w-100">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-7">
                                            <img src="{{ asset('storage/'.getSettingData('company_logo'))}}" class="img-fluid mx-auto d-block mb-3" alt="">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10 col-lg-7 px-5 py-2 web-login-form">
                                                    <div class="form-group">
                                                        <label>Enter Password</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text h-100"><i class="fas fa-key"></i></span>
                                                            </div>
                                                            <input style="-webkit-text-security: disc;" type="text" class="form-control password_enter" placeholder="" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).on('keypress',function(e) {
                    if(e.which == 13 && $(".password_enter").is(":focus")) {
                        if ($(".password_enter").val()!="789") {
                            alert("please enter valid password");
                            return false;
                        }else{
                            $('.inog-modal').modal('hide');
                        }
                    }
                });

                $(window).on('load', function() {
                    $('.inog-modal').modal('show');
                });

                // Hide Show btn
                $(document).ready(function(){
                    $(".inaugrate-img").click(function(){
                        $(this).hide();
                    });
                    $(".inaugrate-img").click(function(){
                        $(this).next().show();
                    });
                });
            </script>

            <div class="curtain">
                <div class="curtain__wrapper">
                    <input type="checkbox" checked class="parda-checkbox">
                    <div class="curtain__panel curtain__panel--left">
                        <div class='rnInner'>
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                        </div>
                    </div> <!-- curtain__panel -->

                    <div class="curtain__content">
                        <div class="cr-wrap">
                            <header class="bg-white shadow fixed-top">
                                @include('elements.front_header')
                            </header>

                            <div class="bg-light login-screen-wrapper">
                                @yield('content')
                            </div>

                            @include('elements.front_footer_assets')
                        </div>
                    </div>

                    <div class="curtain__panel curtain__panel--right">
                        <div class='rnInner'>
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                            <div class='rnUnit'></div>
                            <!--
                            -->
                        </div>
                    </div> <!-- curtain__panel -->

                </div> <!-- curtain__wrapper -->

            </div> <!-- curtain -->

            <script>
                var token = "{{ csrf_token() }}";
                $(".parda-checkbox").click(function(){

                    if ($(".password_enter").val()!="789") {
                        return false;
                    }else{
                        $("body").removeClass("overflow-hidden-g");

                        setTimeout(function () {
                            $('link[title=mystyle]')[0].disabled=true;
                        }, 10000);

                        $(".parda-checkbox").hide();

                        $.ajax({
                            type:'POST',
                            url:"{{ route('frontend.check_correct_password') }}",
                            data:{
                                corrent_value_check:$(".password_enter").val(),
                                '_token': token
                            },
                            beforeSend: function(){

                            },
                            success:function(data) {
                                console.log("success");
                            }
                        });
                    }
                });
            </script>
        @else
            <header class="bg-white shadow fixed-top">
                @include('elements.front_header')
            </header>

            <div class="bg-light login-screen-wrapper">
                @yield('content')
            </div>

            @include('elements.front_footer_assets')
        @endif
    </body>
</html>