
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ALTEA</title>
    
    <link rel="apple-touch-icon" href="{{ asset('img/LOGO.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/LOGO.png') }}">
    <link rel="stylesheet" href="{{ asset('socialv/css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('socialv/css/socialv.css?v=4.0.0') }}">
    <link rel="stylesheet" href="{{ asset('socialv/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('socialv/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('socialv/vendor/vanillajs-datepicker/dist/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('socialv/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('socialv/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">

    <link href="{{ asset('includes/fontawesome-free-6.1.1/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('includes/fontawesome-free-6.1.1/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('includes/fontawesome-free-6.1.1/css/solid.css') }}" rel="stylesheet">
    
    <link rel = "stylesheet" type = "text/css" href="{{asset ('c/b/custom.css')}}">
    
    @livewireStyles
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
  </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <div class="iq-sidebar  sidebar-default ">
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="active">
                            <a href="../dashboard/index.html" class=" "> 
                                <i class="las la-newspaper"></i><span>Newsfeed</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="../app/profile.html" class=" ">
                                <i class="las la-user"></i><span>Profile</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="../app/group.html" class=" ">
                                <i class="las la-users"></i><span>Group</span>
                            </a>
                        </li>
                        
                       
                        <li class=" ">
                            <a href="../dashboard" class=" ">
                                <i class="las la-bell"></i><span>Notification</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="../dashboard/friend-request.html" class=" ">
                                <i class="las la-anchor"></i><span>Friend Request</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="../app/chat.html" class=" ">
                                <i class="lab la-rocketchat"></i><span>Chat</span>
                            </a>
                        </li>
                      
                       
                   
                        <li class=" ">
                                 
                                <li class="">
                                    <a href="../dashboard/market2.html"><i class="ri-list-check-2"></i>Jobs</a>
                                </li>
                        </li>
                     
                
                    </nav>
                    <div class="p-5"></div>
                </div>
            </div>
        
                <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex justify-content-between">
                        <a href="../dashboard/index.html">
                            <img src="{{ asset('img/LOGO.png') }}" class="img-fluid" alt="">
                            <span>ALTEA</span>
                        </a>
                        <div class="iq-menu-bt align-self-center">
                            <div class="wrapper-menu">
                                <div class="main-circle"><i class="ri-menu-line"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="iq-search-bar device-search">
                        <form action="#" class="searchbox">
                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            <input type="text" class="text search-input form-control" placeholder="Search here...">
                        </form>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ms-auto navbar-list">
                            <li>
                                <a href="../dashboard/index.html" class="  d-flex align-items-center">
                                    <i class="ri-home-line"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" id="group-drop" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i class="ri-group-line"></i></a>
                                <div class="sub-drop sub-drop-large dropdown-menu" aria-labelledby="group-drop">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header d-flex justify-content-between bg-primary">
                                        <div class="header-title">
                                        <h5 class="mb-0 text-white">Friend Request</h5>
                                        </div>
                                        <small class="badge  bg-light text-dark ">4</small>
                                    </div>
                                        <div class="card-body p-0">
                                            <div class="iq-friend-request">
                                                <div
                                                    class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                            <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/01.jpg') }}"
                                                                alt="">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 ">Jaques Amole</h6>
                                                            <p class="mb-0">40 friends</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-primary rounded">Confirm</a>
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-secondary rounded">Delete Request</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="iq-friend-request">
                                                <div
                                                    class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                            <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/02.jpg') }}"
                                                                alt="">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 ">Lucy Tania</h6>
                                                            <p class="mb-0">12 friends</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-primary rounded">Confirm</a>
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-secondary rounded">Delete Request</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="iq-friend-request">
                                                <div
                                                    class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                            <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/03.jpg') }}"
                                                                alt="">
                                                        <div class=" ms-3">
                                                            <h6 class="mb-0 ">Manny Petty</h6>
                                                            <p class="mb-0">3 friends</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-primary rounded">Confirm</a>
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-secondary rounded">Delete Request</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="iq-friend-request">
                                                <div
                                                    class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                            <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/04.jpg') }}"
                                                                alt="">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 ">Marsha Mello</h6>
                                                            <p class="mb-0">15 friends</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-primary rounded">Confirm</a>
                                                        <a href="javascript:void();"
                                                            class="me-3 btn btn-secondary rounded">Delete Request</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="#" class=" btn text-primary">View More Request</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                        <a href="#" class="search-toggle   dropdown-toggle" id="notification-drop" data-bs-toggle="dropdown">
                                            <i class="ri-notification-4-line"></i>
                                        </a>
                                        <div class="sub-drop dropdown-menu" aria-labelledby="notification-drop">
                                            <div class="card shadow-none m-0">
                                                <div class="card-header d-flex justify-content-between bg-primary">
                                                <div class="header-title bg-primary">
                                                            <h5 class="mb-0 text-white">All Notifications</h5>
                                                            </div>
                                                        <small class="badge  bg-light text-dark">4</small>
                                                </div>
                                                <div class="card-body p-0">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                            <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/01.jpg') }}" alt="">
                                                                </div>
                                                            <div class="ms-3 w-100">
                                                                <h6 class="mb-0 ">Emma Watson Bni</h6>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                <p class="mb-0">95 MB</p>
                                                                <small class="float-right font-size-12">Just Now</small>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/02.jpg') }}" alt="">
                                                            </div>
                                                            <div class="ms-3 w-100">
                                                                <h6 class="mb-0 ">New customer is join</h6>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                        <p class="mb-0">Cyst Bni</p>
                                                                    <small class="float-right font-size-12">5 days ago</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/03.jpg') }}" alt="">
                                                                    </div>
                                                            <div class="ms-3 w-100">
                                                                <h6 class="mb-0 ">Two customer is left</h6>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="mb-0">Cyst Bni</p>
                                                                    <small class="float-right font-size-12">2 days ago</small>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/04.jpg') }}" alt="">
                                                            </div>
                                                            <div class="w-100 ms-3">
                                                                <h6 class="mb-0 ">New Mail from Fenny</h6>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="mb-0">Cyst Bni</p>
                                                                    <small class="float-right font-size-12">3 days ago</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                            </li>
                            <li class="nav-item dropdown">
                                        <a href="#" class="dropdown-toggle" id="mail-drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-mail-line"></i>
                                        </a>
                                        <div class="sub-drop dropdown-menu" aria-labelledby="mail-drop">
                                            <div class="card shadow-none m-0">
                                                <div class="card-header d-flex justify-content-between bg-primary">
                                                <div class="header-title bg-primary">
                                                            <h5 class="mb-0 text-white">All Message</h5>
                                                            </div>
                                                        <small class="badge bg-light text-dark">4</small>
                                                        </div>
                                                <div class="card-body p-0 ">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex  align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/01.jpg') }}" alt="">
                                                            </div>
                                                            <div class=" w-100 ms-3">
                                                                <h6 class="mb-0 ">Bni Emma Watson</h6>
                                                                <small class="float-left font-size-12">13 Jun</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/02.jpg') }}" alt="">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                                                <small class="float-left font-size-12">20 Apr</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/03.jpg') }}" alt="">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0 ">Why do we use it?</h6>
                                                                <small class="float-left font-size-12">30 Jun</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/04.jpg') }}" alt="">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0 ">Variations Passages</h6>
                                                                <small class="float-left font-size-12">12 Sep</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img class="avatar-40 rounded" src="{{ asset('socialv/images/user/05.jpg') }}" alt="">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                                                <small class="float-left font-size-12">5 Dec</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="   d-flex align-items-center dropdown-toggle" id="drop-down-arrow" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('socialv/images/user/1.jpg') }}" class="img-fluid rounded-circle me-3" alt="user">
                                    <div class="caption">
                                        <h6 class="mb-0 line-height">{{ Auth::user()->flname }}</h6>
                                    </div>
                                </a>
                                <div class="sub-drop dropdown-menu caption-menu" aria-labelledby="drop-down-arrow">
                                    <div class="card shadow-none m-0">
                                        <div class="card-header  bg-primary">
                                            <div class="header-title">
                                                <h5 class="mb-0 text-white">Hello Bni Cyst</h5>
                                                <span class="text-white font-size-12">Available</span>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 ">
                                            <a href="../app/profile.html" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded card-icon bg-soft-primary">
                                                        <i class="ri-file-user-line"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">My Profile</h6>
                                                        <p class="mb-0 font-size-12">View personal profile details.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="../app/profile-edit.html" class="iq-sub-card iq-bg-warning-hover">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded card-icon bg-soft-warning">
                                                        <i class="ri-profile-line"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">Edit Profile</h6>
                                                        <p class="mb-0 font-size-12">Modify your personal details.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="../app/account-setting.html" class="iq-sub-card iq-bg-info-hover">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded card-icon bg-soft-info">
                                                        <i class="ri-account-box-line"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">Account settings</h6>
                                                        <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="../app/privacy-setting.html" class="iq-sub-card iq-bg-danger-hover">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded card-icon bg-soft-danger">
                                                        <i class="ri-lock-line"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 ">Privacy Settings</h6>
                                                        <p class="mb-0 font-size-12">Control your privacy parameters.
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="d-inline-block w-100 text-center p-3">
                                                <a class="btn btn-primary iq-sign-btn" href="{{ route('signout') }}" role="button">
                                                    Sign out
                                                    <i class="ri-login-box-line ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>               
                    </div>
                </nav>
            </div>
        </div>       
        <div class="right-sidebar-mini right-sidebar">
           <div class="right-sidebar-panel p-0">
              <div class="card shadow-none">
                 <div class="card-body p-0">
                    <div class="media-height p-3" data-scrollbar="init">
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-online">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/01.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Anna Sthesia</h6>
                             <p class="mb-0">Just Now</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-online">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/02.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Paul Molive</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-online">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/03.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Anna Mull</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-online">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/04.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Paige Turner</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-online">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/11.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Bob Frapples</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-online">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/02.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Barb Ackue</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-online">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/03.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Greta Life</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-away">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/12.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Ira Membrit</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center mb-4">
                          <div class="iq-profile-avatar status-away">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/01.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Pete Sariya</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                       <div class="d-flex align-items-center">
                          <div class="iq-profile-avatar">
                             <img class="rounded-circle avatar-50" src="{{ asset('socialv/images/user/02.jpg') }}" alt="">
                          </div>
                          <div class="ms-3">
                             <h6 class="mb-0">Monty Carlo</h6>
                             <p class="mb-0">Admin</p>
                          </div>
                       </div>
                    </div>
                    <div class="right-sidebar-toggle bg-primary text-white mt-3">
                       <i class="ri-arrow-left-line side-left-icon"></i>
                       <i class="ri-arrow-right-line side-right-icon"><span class="ms-3 d-inline-block">Close Menu</span></i>
                    </div>
                 </div>
              </div>
           </div>
        </div>       
        <div id="content-page" class="content-page">
            @yield('content')
        </div>
    </div>

    <!-- Wrapper End-->
    <footer class="iq-footer bg-white">
       <div class="container-fluid">
          <div class="row">
             <div class="col-lg-6">
                <ul class="list-inline mb-0">
                   <li class="list-inline-item"><a href="../dashboard/privacy-policy.html">Privacy Policy</a></li>
                   <li class="list-inline-item"><a href="../dashboard/terms-of-service.html">Terms of Use</a></li>
                </ul>
             </div>
             <div class="col-lg-6 d-flex justify-content-end">
                Copyright 2020 <a href="#">SocialV</a> All Rights Reserved.
             </div>
          </div>
       </div>
    </footer>
    <nav class="iq-float-menu">
       <input type="checkbox" class="iq-float-menu-open" name="menu-open" id="menu-open" />
       <label class="iq-float-menu-open-button" for="menu-open">
          <span class="lines line-1"></span>
          <span class="lines line-2"></span>
          <span class="lines line-3"></span>
       </label>
       <button class="iq-float-menu-item bg-info"  data-toggle="tooltip" data-placement="top" title="Direction Mode" data-mode="rtl"><i class="ri-text-direction-r"></i></button>
       <button class="iq-float-menu-item bg-danger"  data-toggle="tooltip" data-placement="top" title="Color Mode" id="dark-mode" data-active="true"><i class="ri-sun-line"></i></button>
       <button class="iq-float-menu-item bg-warning" data-toggle="tooltip" data-placement="top" title="Comming Soon"><i class="ri-palette-line"></i></button> 
    </nav>
    
    @livewireScripts
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('socialv/js/libs.min.js') }}"></script>
    <!-- slider JavaScript -->
    <script src="{{ asset('socialv/js/slider.js') }}"></script>
    <!-- masonry JavaScript --> 
    <script src="{{ asset('socialv/js/masonry.pkgd.min.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('socialv/js/enchanter.js') }}"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('socialv/js/sweetalert.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('socialv/js/customizer.js') }}"></script>
    <!-- app JavaScript -->
    <script src="{{ asset('socialv/js/charts/weather-chart.js') }}"></script>
    <script src="{{ asset('socialv/js/app.js') }}"></script>
    <script src="{{ asset('socialv/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('socialv/js/lottie.js') }}"></script>

    <script>
        window.addEventListener('modal-toggle', event => {
			$("#"+event.detail.id).modal((event.detail.action=='open')? 'show':'hide');
		});
        
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.processed', (message, component) => {
                $(function () {
                    $('.tooltipped').tooltip();
                    // $('.material-tooltip').css("visibility", "hidden"); 
                });
            });
        });
    </script>
    

    <!-- offcanvas start -->
 
    <div class="offcanvas offcanvas-bottom share-offcanvas" tabindex="-1" id="share-btn" aria-labelledby="shareBottomLabel">
       <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="shareBottomLabel">Share</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
       </div>
       <div class="offcanvas-body small">
          <div class="d-flex flex-wrap align-items-center">
             <div class="text-center me-3 mb-3">
                <img src="{{ asset('socialv/images/icon/08.png') }}" class="img-fluid rounded mb-2" alt="">
                <h6>Facebook</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="{{ asset('socialv/images/icon/09.png') }}" class="img-fluid rounded mb-2" alt="">
                <h6>Twitter</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="{{ asset('socialv/images/icon/10.png') }}" class="img-fluid rounded mb-2" alt="">
                <h6>Instagram</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="{{ asset('socialv/images/icon/11.png') }}" class="img-fluid rounded mb-2" alt="">
                <h6>Google Plus</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="{{ asset('socialv/images/icon/13.png') }}" class="img-fluid rounded mb-2" alt="">
                <h6>In</h6>
             </div>
             <div class="text-center me-3 mb-3">
                <img src="{{ asset('socialv/images/icon/12.png') }}" class="img-fluid rounded mb-2" alt="">
                <h6>YouTube</h6>
             </div>
          </div>
       </div>
    </div>
  </body>
</html>