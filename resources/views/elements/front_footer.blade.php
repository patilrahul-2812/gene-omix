    <div class="footer-area footer-height pt-40 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="footer-left-widget mb-40">
                        <div class="footer-logo text-center">
                            <img src="{{ asset(getImage(getSettingData('company_logo'))) }}" alt="Geneomix Logo" style="max-width:120px; width:100%">
                        </div>
                        @php
                            $about = getFooterAbout();
                        @endphp
                        <p>{!! substr($about->about_desc, 0, 300) !!}.. <a href="{{ route('about') }}">Read More</a></p>
                        <div class="footer-social">
                            @if(getSettingData('config_facebook'))
                                <a href="{{ getSettingData('config_facebook') }}" target='_blank'><i class="fab fa-facebook"></i></a>
                            @endif
                            @if(getSettingData('config_instagram'))
                                <a href="{{ getSettingData('config_instagram') }}" target='_blank'><i class="fas fa-instagram"></i></a>
                            @endif
                            @if(getSettingData('config_linkedin'))
                                <a href="{{ getSettingData('config_linkedin') }}" target='_blank'><i class="fab fa-linkedin"></i></a>
                            @endif
                            @if(getSettingData('config_twitter'))
                                <a href="{{ getSettingData('config_twitter') }}" target='_blank'><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(getSettingData('config_you_tube'))
                                <a href="{{ getSettingData('config_you_tube') }}"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if(getSettingData('config_whatsapp_number'))
                                <a href="https://api.whatsapp.com/send?phone=91{{ getSettingData('config_whatsapp_number') }}" target='_blank'><i class="fab fa-whatsapp"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-lg-6 col-md-6">
                    <div class="footer-widget footer-widget-space mb-40">
                        <h3>contact us</h3>
                        <ul class="footer-info">
                            <li>
                                <div class="footer-address mt-20">
                                    <span><i class="fas fa-map-marker-alt"></i></span>
                                    <h5>{{ getSettingData('config_company_address') }}</h5>
                                </div>
                            </li>
                            <li>
                                <div class="footer-address mt-20">
                                    <span><i class="fas fa-phone-alt"></i></span>
                                    @foreach(explode(',', getSettingData('config_company_mobile_number_header_footer')) as $key => $value)
                                        <h5><a href="tel: {{ $value }}"> {{ $value }}</a></h5>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <div class="footer-address mt-20">
                                    @foreach(explode(',', getSettingData('config_company_emails')) as $key => $value)
                                        <span><i class="fas fa-envelope-open-text"></i></span>
                                        <h5><a href="mailto:{{ $value }}">{{ $value }}</a></h5>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-1 offset-xl-1 col-lg-6 col-md-6 pr-0 mb-40">
                    <div class="footer-widget footer-link">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="{{ route('about') }}">About us</a></li>
                            <li><a href="{{ route('service') }}">Services</a></li>
                            <li><a href="{{ route('ourproduct') }}">Our Products</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('ourteam') }}">Our Team</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-lg-6 col-md-6 pr-0">
                    <div class="footer-widget footer-gallery">
                        <h3>Work Gallery</h3>
                        @php 
                            $image = getWorkgallery();
                        @endphp
                        @if($image->image)
                            @foreach(json_decode($image->image) as $spkey => $spvalue)
                                <div class="footer-gallery-item">
                                    <div class="footer-gallery-thumb">
                                        @if(($spvalue->image == 'null') || !Storage::exists('public/'.$spvalue->image))
                                            <img src="{{ asset('storage/'.$spvalue->image) }}" alt="image_not_found">
                                        @else
                                            <img src="{{ asset('default_images/no-image-600-400.jpg') }}" alt="image_not_found">
                                        @endif
                                    </div>
                                    <div class="link-img">
                                        @if(($spvalue->image == 'null') || !Storage::exists('public/'.$spvalue->image))
                                            <a class="popup-image" href="{{ asset('storage/'.$spvalue->image) }}"></a>
                                        @else
                                            <a class="popup-image" href="{{ asset('default_images/no-image-600-400.jpg') }}"></a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- <div class="footer-gallery-item">
                            <div class="footer-gallery-thumb">
                                <img src="images/no-image-600-400.jpg" alt="image_not_found">
                            </div>
                            <div class="link-img">
                                <a class="popup-image" href="images/no-image-600-400.jpg"></a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area pt-20 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-text text-center">
                        <p>Copyright by @ {{ getSettingData('config_company_name') }} - <?php echo date('Y'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>