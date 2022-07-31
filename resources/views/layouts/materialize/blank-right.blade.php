<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">

    
    <link href="{{ asset('img/met.png') }}" rel="icon">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('materialize/vendors/vendors.min.css') }}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/themes/vertical-modern-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/themes/vertical-modern-menu-template/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/pages/login.css') }}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('c/m/custom.css') }}">
    <!-- END: Custom CSS-->

    @livewireStyles
</head>
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 1-column blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">

    <div class="row">
        <div class="col s12 l6 hide-on-med-and-down">
            <div class="container">
                <div id="login-page" class="row">
                    <img src="{{ asset('img/LOGO.png') }}" class="center-align" alt="" style="width: 320px;">
                </div>
            </div>
        </div>
        <div class="col s12 l6">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 l10 border-radius-6 login-card">
                        @yield('content')
                    </div>
                    <div class="col l2 hide-on-med-and-down"></div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>

    <script src="{{ asset('materialize/js/vendors.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/alphine.cdn.min.js') }}"></script>

    @livewireScripts
    <script>
        window.addEventListener('swal:modal', event => { 
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });

        window.addEventListener('modal-toggle', event => {
			$("#"+event.detail.id).modal(event.detail.action);
		});

    </script>
    @if ( session()->has('alert_success') )
        <script>
            swal({
                title: "{{ session()->get('alert_success')['messsage'] }}",
                text:  "{{ session()->get('alert_success')['text'] }}",
                icon: 'success',
            });
        </script>
    @endif
    @if ( session()->has('alert_info') )
        <script>
            swal({
                title: "{{ session()->get('alert_info')['messsage'] }}",
                text:  "{{ session()->get('alert_info')['text'] }}",
                icon: 'info',
            });
        </script>
    @endif
    @if ( session()->has('alert_error') )
        <script>
            swal({
                title: "{{ session()->get('alert_error')['messsage'] }}",
                text:  "{{ session()->get('alert_error')['text'] }}",
                icon: 'error',
            });
        </script>
    @endif
</body>
</html>