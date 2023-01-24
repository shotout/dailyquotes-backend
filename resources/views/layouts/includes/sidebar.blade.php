<nav class="pcoded-navbar {{ getThemeClass('navbar') }}">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ url('dashboard') }}" class="b-brand">

                <span class="b-title" title="{{ 'Mooti App' }}">{{ 'Mooti App' }}</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>{{ __('NAVIGATION') }}</label>
                </li>

                <li data-username="dashboard" class="nav-item {{ $menu == 'Admins' ? 'active' : '' }}">
                    <a href="{{ url('/admin/list') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">{{ __('Admins') }} </span></a>
                </li>
                <li data-username="app" class="nav-item pcoded-hasmenu {{ $menu == 'app' ? 'pcoded-trigger active' : '' }}">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">{{ __('Application Content') }} </span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ isset($sub_menu) && $sub_menu == 'groupcategory' ? 'active' : '' }}"><a href="{{ url('group/list') }}" class="">{{ __('Group Quotes Category') }}</a></li>
                        <li class="{{ isset($sub_menu) && $sub_menu == 'categories' ? 'active' : '' }}"><a href="{{ url('categories/list') }}" class="">{{ __('Quotes Category') }}</a></li>
                        <li class="{{ isset($sub_menu) && $sub_menu == 'quotes' ? 'active' : '' }}"><a href="{{ url('quotes/list') }}" class="">{{ __('Quotes') }}</a></li>
                    </ul>
                </li>
                <li data-username="setting" class="nav-item pcoded-hasmenu {{ $menu == 'setting' ? 'pcoded-trigger active' : '' }}">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">{{ __('Quotes Pool') }} </span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ isset($sub_menu) && $sub_menu == 'feels' ? 'active' : '' }}"><a href="{{ url('pool/feels') }}" class="">{{ __('How are you feeling recently?') }}</a></li>  
                        <li class="{{ isset($sub_menu) && $sub_menu == 'ways' ? 'active' : '' }}"><a href="{{ url('pool/ways') }}" class="">{{ __('What makes you feel that way?') }}</a></li>
                        <li class="{{ isset($sub_menu) && $sub_menu == 'pool' ? 'active' : '' }}"><a href="{{ url('pool/list') }}" class="">{{ __('What areas in life would you like to improve?') }}</a></li>                                      
                    </ul>
                </li>
                <li data-username="themes" class="nav-item pcoded-hasmenu {{ $menu == 'themes' ? 'pcoded-trigger active' : '' }}">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">{{ __('Themes') }} </span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ isset($sub_menu) && $sub_menu == 'themeslist' ? 'active' : '' }}"><a href="{{ url('themes/list') }}" class="">{{ __('Users Theme') }}</a></li>                                        
                    </ul>
                </li>

            </ul>
            </li><br><br>

            </ul>
        </div>
    </div>
</nav>