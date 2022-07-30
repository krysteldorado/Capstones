<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-active-rounded">
    @php
        $route_name=Route::currentRouteName();
    @endphp
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{ route('signin') }}">
                <div class="valign-wrapper">
                    <img class="hide-on-med-and-down batis-logo" src="{{ asset('img/LOGO.png') }}" alt="materialize logo" />
                    {{-- <img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('materialize/images/logo/materialize-logo-color.png') }}" alt="materialize logo" /> --}}
                    <span class="logo-text hide-on-med-and-down">ALTEA</span>
                </div>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li @class([
                'bold', 
                'active' => in_array($route_name, [
                    'university', 
                    'campus', 
                    'program', 
                    'college', 
                ]),
            ])>
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)">
                <i class="bi bi-menu-button-wide"></i>
                <span class="menu-title" data-i18n="Dashboard">University Setup</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li>
                        <a href="{{ route('university') }}" @class(['active' => $route_name==='university'])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">University</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('campus') }}" @class(['active' => $route_name==='campus'])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Campus</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('college') }}" @class(['active' => $route_name==='college'])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="eCommerce">College</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program') }}" @class(['active' => $route_name==='program'])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Analytics">Program</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="bold">
            <a href="{{ route('user.management') }}" @class([
                    'waves-effect waves-cyan', 
                    'active' => in_array($route_name, [
                        'user.management',
                        'user.form',
                    ]),
                ])>
                <i class="bi bi-person-video3"></i>
                <span class="menu-title" data-i18n="Mail">User Management</span>
            </a>
        </li>

        <li @class([
                'bold', 
                'active' => in_array(($designation_id??0), [
                    1, 
                    2, 
                    4, 
                    5, 
                    6, 
                    9, 
                    10, 
                    11,
                ]) || $route_name==='user.alumni',
            ])>
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)">
                <i class="bi bi-people"></i>
                <span class="menu-title" data-i18n="Dashboard">Academe</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li>
                        <a href="{{ route('user.university', ['designation'=>1]) }}" @class([ 'active' => 1==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">University President</span>
                        </a>

                        <a href="{{ route('user.university', ['designation'=>2]) }}" @class([ 'active' => 2==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">VPAA</span>
                        </a>

                        <a href="{{ route('user.campus', ['designation'=>4]) }}" @class(['active' => 4==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Chancellor</span>
                        </a>

                        <a href="{{ route('user.campus', ['designation'=>5]) }}" @class([ 'active' => 5==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Campus Director</span>
                        </a>

                        <a href="{{ route('user.campus', ['designation'=>6]) }}" @class([ 'active' => 6==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">VCAA</span>
                        </a>

                        <a href="{{ route('user.college', ['designation'=>9]) }}" @class([ 'active' => 9==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">College Dean</span>
                        </a>

                        <a href="{{ route('user.program', ['designation'=>10]) }}" @class([ 'active' => 10==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Program Chairperson</span>

                        
                        <a href="{{ route('user.alumni') }}"  @class(['active' => $route_name==='user.alumni'])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Alumni</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li @class([
                'bold', 
                'active' => in_array(($designation_id??0), [
                    3,
                    7,
                    8,
                ]),
            ])>
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)">
                <i class="bi bi-people"></i>
                <span class="menu-title" data-i18n="Dashboard">Administrative</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li>
                        <a href="{{ route('user.university', ['designation'=>3]) }}" @class([ 'active' => 3==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">VPDEA</span>
                        </a>

                        <a href="{{ route('user.campus', ['designation'=>7]) }}" @class([ 'active' => 7==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">VCDEA</span>
                        </a>

                        <a href="{{ route('user.campus', ['designation'=>8]) }}" @class([ 'active' => 8==($designation_id??0)])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Head, External Affairs</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li @class([
                'bold', 
                'active' => in_array($route_name, [
                    'employer', 
                ]),
            ])>
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)">
                <i class="bi bi-people"></i>
                <span class="menu-title" data-i18n="Dashboard">Industry</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li>
                        <a href="{{ route('employer') }}" @class(['active' => $route_name==='employer'])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Employer</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li @class([
                'bold', 
                'active' => in_array($route_name, [
                    'designation', 
                ]),
            ])>
            <a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)">
                <i class="bi bi-gear"></i>
                <span class="menu-title" data-i18n="Dashboard">Other Settings</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li>
                        <a href="{{ route('designation') }}" @class(['active' => $route_name==='designation'])>
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Modern">Designation</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
