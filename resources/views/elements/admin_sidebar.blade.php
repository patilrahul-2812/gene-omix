    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item ">
                <a class="navbar-brand" href="javascript:void(0);">
                    <span class="brand-logo">
                        <img src="{{ asset(getImage(getSettingData('company_fav_logo'))) }}" alt="">
                    </span>
                    <h2 class="brand-text"></h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    @php
        $action = request()->route()->getAction();
        $controller_action = explode('@', class_basename($action['controller']));
        $current_controller = $controller_action[0];
        $current_action = $controller_action[1];
    @endphp
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item @if($current_action == 'dashboard') active @endif">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
                </a>
            </li>
            @php
                $controller = array('DesignationController', 'DepartmentController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'has-sub menu-collapsed-open':'' }}">
                <a class="d-flex align-items-center" href="#"><i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Master</span>
                </a>
                <ul class="menu-content">
                    <li class="@if($current_controller == 'DesignationController') active @endif">
                        <a class="d-flex align-items-center" href="{{ route('designation.index') }}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Designation</span>
                        </a>
                    </li>
                    <li class="@if($current_controller == 'DepartmentController') active @endif">
                        <a class="d-flex align-items-center" href="{{ route('department.index') }}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Department</span>
                        </a>
                    </li>
                </ul>
            </li>
            @php
                $controller = array('SliderController', 'WhyChooseController', 'TestimonialController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'has-sub menu-collapsed-open':'' }}">
                <a class="d-flex align-items-center" href="#"><i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Home</span>
                </a>
                <ul class="menu-content">
                    <li class="@if($current_controller == 'SliderController') active @endif">
                        <a class="d-flex align-items-center" href="{{ route('slider.index') }}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Slider</span>
                        </a>
                    </li>
                    <li class="@if($current_controller == 'TestimonialController') active @endif">
                        <a class="d-flex align-items-center" href="{{ route('testimonial.index') }}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Testimonial</span>
                        </a>
                    </li>
                </ul>
            </li>
            @php
                $controller = array('AboutController');
                $action = array('index');
            @endphp
            <li class="nav-item @if(in_array($current_controller,$controller) && (($current_action == 'index') || ($current_action == 'create') || ($current_action == 'edit'))) active @else @endif">
                <a class="d-flex align-items-center" href="{{ route('about.index') }}"><i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">About</span>
                </a>
            </li>
            @php
                $controller = array('BrandController');
                $action = array('index');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('brand.index') }}"><i data-feather='list'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Brand</span>
                </a>
            </li>
            @php
                $controller = array('ServiceController');
                $action = array('index');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('service.index') }}"><i data-feather='list'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Service</span>
                </a>
            </li>
            @php
                $controller = array('OurProductController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('ourproduct.index') }}"><i data-feather='list'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Our Product</span>
                </a>
            </li>
            @php
                $controller = array('BlogController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('blog.index') }}"><i data-feather='list'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Blog</span>
                </a>
            </li>
            @php
                $controller = array('OurTeamController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('ourteam.index') }}"><i data-feather='list'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Our Team</span>
                </a>
            </li>
            @php
                $controller = array('WorkGalleryController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('workgallery.index') }}"><i data-feather='list'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Work Gallery</span>
                </a>
            </li>
                        
            @php
                $controller = array('SettingController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'active':'' }}">
                <a class="d-flex align-items-center" href="{{ route('setting.index') }}"><i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Setting</span>
                </a>
            </li>
            @php
                $controller = array('InquiryController', 'OurProductInquiryController');
            @endphp
            <li class="nav-item {{ in_array($current_controller,$controller)?'has-sub menu-collapsed-open':'' }}">
                <a class="d-flex align-items-center" href="#"><i data-feather="phone-call"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">All Inquiry</span>
                </a>
                <ul class="menu-content">
                    <li class="@if($current_controller == 'InquiryController') active @endif">
                        <a class="d-flex align-items-center" href="{{ route('inquiry.index') }}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Inquiry</span>
                        </a>
                    </li>
                    <li class="@if($current_controller == 'OurProductInquiryController') active @endif">
                        <a class="d-flex align-items-center" href="{{ route('ourproductinquiry.index') }}">
                            <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Product Inquiry</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>