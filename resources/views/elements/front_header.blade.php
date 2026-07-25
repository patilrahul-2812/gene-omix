    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="left">
                        <li><span><i class="far fa-clock"></i></span> {{ getSettingData('config_company_office_time') }}</li>
                        @foreach(explode(',', getSettingData('config_company_mobile_number_header_footer')) as $key => $value)
                            <li><span><i class="fas fa-phone-alt"></i><a href="tel: {{ $value }}"> {{ $value }}</a></span> </li>
                        @endforeach
                        <!-- <li><span><i class="fas fa-phone-alt"></i><a href="tel: +91 9717243231"> +91 9717243231</a></span> </li> -->
                    </ul>
                    <ul class="right">
                        @if(getSettingData('config_facebook'))
                            <li><a href="{{ getSettingData('config_facebook') }}" target='_blank'><i class="fab fa-facebook"></i></a></li>
                        @endif
                        @if(getSettingData('config_instagram'))
                            <li><a href="{{ getSettingData('config_instagram') }}" target='_blank'><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(getSettingData('config_linkedin'))
                            <li><a href="{{ getSettingData('config_linkedin') }}" target='_blank'><i class="fab fa-linkedin"></i></a></li>
                        @endif
                        @if(getSettingData('config_twitter'))
                            <li><a href="{{ getSettingData('config_twitter') }}" target='_blank'><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if(getSettingData('config_you_tube'))
                            <li><a href="{{ getSettingData('config_you_tube') }}" target='_blank'><i class="fab fa-youtube"></i></a></li>
                        @endif
                        @if(getSettingData('config_whatsapp_number'))
                            <li><a href="https://api.whatsapp.com/send?phone=91{{ getSettingData('config_whatsapp_number') }}" target='_blank'><i class="fab fa-whatsapp"></i></a></li>
                        @endif
                    </ul>
                    <ul class="left">
                        <li><span><i class="fas fa-map-marker-alt"></i></span> {{ getSettingData('config_company_address') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2">
                    <div class="logo logo-2">
                        <a href="{{ route('home') }}"><img src="{{ asset(getImage(getSettingData('company_logo'))) }}" alt="Geneomix Logo" style="max-width:120px;width:100%"></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10">
                    <div class="main-menu f-right">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('brand') }}">Brand</a></li>
                                <li>
                                    <a href="{{ route('service') }}">Services +</a>
                                    <ul class="submenu">
                                        @foreach(servicelist() as $key => $value)
                                            <li><a href="{{ route('service.service_detail', $value['seo_url']) }}">{{ $value['service_name'] }}</a></li>
                                        @endforeach
                                        <!-- <li><a href="javascript:void(0);">NGS Sequencing</a></li> -->
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('ourproduct') }}">Our Products +</a>
                                    <ul class="submenu">
                                        @foreach(ourproductlist() as $key => $ovalue)
                                            <li><a href="{{ route('ourproduct.ourproduct_detail', $ovalue['seo_url']) }}">{{ $ovalue['product_name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">Blog </a>
                                </li>
                                <li><a href="javascript:void(0);">Knowledge Hub</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>