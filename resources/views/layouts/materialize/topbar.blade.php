<nav class="white hide-on-med-and-down" id="horizontal-nav">
    <div class="nav-wrapper">
        <ul class="left hide-on-med-and-down" id="ul-horizontal-nav" data-menu="menu-navigation">
            <li>
                <a class="active" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>
                        <span class="dropdown-title">Dashboard</span>
                    </span>
                </a>
            </li>

            <li>
                <a class="dropdown-menu" href="Javascript:void(0)" data-target="TemplatesDropdown">
                    <i class="material-icons">dvr</i>
                    <span>
                        <span class="dropdown-title" data-i18n="Templates">University</span>
                        <i class="material-icons right">keyboard_arrow_down</i>
                    </span>
                </a>
                <ul class="dropdown-content dropdown-horizontal-list" id="TemplatesDropdown">
                    <li>
                        <a href="{{ route('campus') }}">
                            <span>Campus</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('college') }}">
                            <span>College</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program') }}">
                            <span>Program</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END: Horizontal nav start-->
</nav>