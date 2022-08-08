<div id="profile">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="card position-relative inner-page-bg" style="height:350px;">
               <div class="iq-card">
                  <div class="iq-card-body profile-page p-0">
                     <div class="profile-header">
                        <div class="cover-container">
                           <img src="img/profile-bg1.jpg" style="height: 270px; width:1100px" alt="profile-bg" class="rounded img-fluid">
                           <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                              <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                              <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                           </ul>
                        </div>
                        <div class="user-detail text-center mb-3">
                           <div class="profile-img">
                              <i class="ri-pencil-line upload-button"></i>
                              <input class="file-upload" type="file">
                           </div>
                           <div class="profile-detail" style="margin-top: 5px">
                              <h3 class="">{{Auth::user()->flname  }}</h3>
                           </div>
                        </div>
                     </div>
                     <div class="profile-info p-4 d-flex align-items-center justify-content-between">
                        <div class="social-info" style="margin-left: 80%">
                           <ul class="d-flex list-inline">
                              <li class="text-center pl-3" style="margin-right: 10px">
                                 <h6>Posts</h6>
                                 <p class="mb-0">690</p>
                              </li>
                              <li class="text-center pl-3" style="margin-left: 3px">
                                 <h6>Followers</h6>
                                 <p class="mb-0">206</p>
                              </li>
                              <li class="text-center pl-3" style="margin-left: 5px">
                                 <h6>Following</h6>
                                 <p class="mb-0">100</p>
                              </li>
                           </ul>
                        </div>
                    </div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="iq-card-body p-0">
                  <div class="user-tabing">
                     <ul class="nav nav-pills d-flex align-items-center justify-content-center profile-feed-items p-0 m-0">
                        <li class="col-sm-3 p-0">
                           <a class="nav-link active" data-toggle="pill" href="#timeline">Timeline</a>
                        </li>
                        <li class="col-sm-3 p-0">
                           <a class="nav-link" data-toggle="pill" href="#about">About</a>
                        </li>
                        <li class="col-sm-3 p-0">
                           <a class="nav-link" data-toggle="pill" href="#friends">Friends</a>
                        </li>
                        <li class="col-sm-3 p-0">
                           <a href="/alumni/tracer" class="nav-link ">Alumni Tracer</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>  
        </div> 
         <div class="col-sm-12">
            <div class="tab-content">
               <div class="tab-pane fade active show" id="timeline" role="tabpanel">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="card inner-page-bg">
                           <div class="iq-card-header d-flex justify-content-between"  style="margin:20px">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Friends</h4>
                              </div>
                              <div class="iq-card-header-toolbar d-flex align-items-center">
                                 <p class="m-0"><a href="javacsript:void();">Add New </a></p>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
                                    <a href="javascript:void();">
                                    <img src="images/user/05.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Anna Rexia</h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
                                    <a href="javascript:void();"><img src="images/user/06.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Tara Zona</h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
                                    <a href="javascript:void();"><img src="images/user/07.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Polly Tech</h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
                                    <a href="javascript:void();"><img src="images/user/08.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Bill Emia</h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
                                    <a href="javascript:void();"><img src="images/user/09.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Moe Fugga</h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-3">
                                    <a href="javascript:void();"><img src="images/user/10.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Hal Appeno </h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-0">
                                    <a href="javascript:void();"><img src="images/user/07.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Zack Lee</h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-0">
                                    <a href="javascript:void();"><img src="images/user/06.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Terry Aki</h6>
                                 </li>
                                 <li class="col-md-4 col-6 pl-2 pr-0 pb-0">
                                    <a href="javascript:void();"><img src="images/user/05.jpg" alt="gallary-image" class="img-fluid" /></a>
                                    <h6 class="mt-2">Greta Life</h6>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8">
                        <div style="height:250px;">
                           <div id="post-modal-data" class="card card-block card-stretch card-height">
                              <div class="card-header d-flex justify-content-between">
                                 <div class="header-title">
                                    <h4 class="card-title">Create Post</h4>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="d-flex align-items-center">
                                    <div class="user-img">
                                          <img src="{{ asset('socialv/images/user/1.jpg') }}" alt="userimg" class="avatar-60 rounded-circle">
                                    </div>
                                    <form class="post-text ms-3 w-100 "  data-bs-toggle="modal" data-bs-target="#post-modal" action="javascript:void();">
                                          <input type="text" class="form-control rounded" placeholder="Write something here..." style="border:none;">
                                    </form>
                                 </div>
                                 <hr>
                                 <ul class=" post-opt-block d-flex list-inline m-0 p-0 flex-wrap"  style="height:50px;">
                                    <li class="me-3 mb-md-0 mb-2">
                                       <a href="#" class="btn btn-soft-primary">
                                       <img src="{{ asset('socialv/images/small/07.png') }}" alt="icon" class="img-fluid me-2"> Photo/Video
                                       </a>
                                    </li>
                                    <li class="me-3 mb-md-0 mb-2">
                                       <a href="#" class="btn btn-soft-primary">
                                       <img src="{{ asset('socialv/images/small/08.png') }}" alt="icon" class="img-fluid me-2"> Tag Friend
                                       </a>
                                    </li>
                                    <li class="me-3">
                                       <a href="#" class="btn btn-soft-primary">
                                       <img src="{{ asset('socialv/images/small/09.png') }}" alt="icon" class="img-fluid me-2"> Feeling/Activity
                                       </a>
                                    </li>
                                    <li>
                                       <button class="btn btn-soft-primary">
                                          <div class="card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <div class="dropdown-toggle" id="post-option"   data-bs-toggle="dropdown">
                                                   <i class="ri-more-fill"></i>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-option" style="">
                                                   <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Check in</a>
                                                   <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Live Video</a>
                                                   <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Gif</a>
                                                   <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Watch Party</a>
                                                   <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#post-modal">Play with Friend</a>
                                                </div>
                                             </div>
                                          </div>
                                       </button>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div>
                           @foreach ($posts as $post)
                              @livewire('post.post.post-view-livewire', ['post_id' => $post['id']], key("post-view-{$post['id']}"))
                           @endforeach
                        </div>
                        {{-- <div class="col-sm-12 text-center">
                           <img wire:loading wire:target="load_posts" src="{{ asset('socialv/images/page-img/page-load-loader.gif') }}" alt="loader" style="height: 100px;" id="bottom-loader">
                           <div wire:loading.remove wire:target="load_posts" style="height: 100px;"></div>
                        </div> --}}

                        {{-- Nasama ang tab panel sa loading pag kasama ang loader sa taas --}}
                     </div>
                     <div wire:ignore>
                        @livewire('post.post.post-livewire', key('post-livewire'))
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="about" role="tabpanel">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-3"  style="margin-top: 15px">
                              <ul class="nav nav-pills basic-info-items list-inline d-block p-0 m-0">
                                 <li>
                                    <a class="nav-link active" data-toggle="pill" href="#basicinfo">Contact and Basic Info</a>
                                 </li>
                                 {{-- <li>
                                    <a class="nav-link" data-toggle="pill" href="#family">Family and Relationship</a>
                                 </li> --}}
                                 <li>
                                    <a class="nav-link" data-toggle="pill" href="#work">Work and Education</a>
                                 </li>
                                 {{-- <li>
                                    <a class="nav-link" data-toggle="pill" href="#lived">Places You've Lived</a>
                                 </li> --}}
                                 {{-- <li>
                                    <a class="nav-link" data-toggle="pill" href="#details">Details About You</a>
                                 </li> --}}
                              </ul>
                           </div>
                           <div class="col-md-9 pl-4"  style="margin-top: 15px">
                              <div class="tab-content">
                                 <div class="tab-pane fade active show" id="basicinfo" role="tabpanel">
                                    <h4>Contact Information</h4>
                                    <hr>
                                    @isset($alum)
                                    <div class="row">
                                       <div class="col-3">
                                          <h6>Email</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0"> {{ $alum->email }} </p>
                                       </div>
                                       <div class="col-3">
                                          <h6>Mobile</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">{{ $alum->phone }}</p>
                                       </div>
                                       <div class="col-3">
                                          <h6>Address</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">{{ $alum->address }}</p>
                                       </div>
                                    </div>
                                    <h4 class="mt-3">Websites and Social Links</h4>
                                    <hr>
                                    <div class="row">
                                       <div class="col-3">
                                          <h6>Website</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">www.bootstrap.com</p>
                                       </div>
                                       <div class="col-3">
                                          <h6>Social Link</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">www.bootstrap.com</p>
                                       </div>
                                    </div>
                                    <h4 class="mt-3">Basic Information</h4>
                                    <hr>
                                    <div class="row">
                                       <div class="col-3">
                                          <h6>Birth Date</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">{{ $alum->birthday }} </p>
                                       </div>
                                       <div class="col-3">
                                          <h6>Gender</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">{{ $alum->sex }}</p>
                                       </div>
                                       <div class="col-3">
                                          <h6>interested in</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">Designing</p>
                                       </div>
                                       <div class="col-3">
                                          <h6>language</h6>
                                       </div>
                                       <div class="col-9">
                                          <p class="mb-0">English, French</p>
                                       </div>
                                    </div>
                                       
                                    @endisset
                                    
                                 </div>
                                 {{-- <div class="tab-pane fade" id="family" role="tabpanel">
                                    <h4 class="mb-3">Relationship</h4>
                                    <ul class="suggestions-lists m-0 p-0">
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Add Your Relationship Status</h6>
                                          </div>
                                       </li>
                                    </ul>
                                    <h4 class="mt-3 mb-3">Family Members</h4>
                                    <ul class="suggestions-lists m-0 p-0">
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Add Family Members</h6>
                                          </div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Paul Molive</h6>
                                             <p class="mb-0">Brother</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Anna Mull</h6>
                                             <p class="mb-0">Sister</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Paige Turner</h6>
                                             <p class="mb-0">Cousin</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                    </ul>
                                 </div> --}}
                                 <div class="tab-pane fade" id="work" role="tabpanel">
                                    <h4 class="mb-3">Work</h4>
                                    <ul class="suggestions-lists m-0 p-0">
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Add Work Place</h6>
                                          </div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Themeforest</h6>
                                             <p class="mb-0">Web Designer</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>iqonicdesign</h6>
                                             <p class="mb-0">Web Developer</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/03.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>W3school</h6>
                                             <p class="mb-0">Designer</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                    </ul>
                                    <h4 class="mb-3">Professional Skills</h4>
                                    <ul class="suggestions-lists m-0 p-0">
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Add Professional Skills</h6>
                                          </div>
                                       </li>
                                    </ul>
                                    <h4 class="mt-3 mb-3">College</h4>
                                    <ul class="suggestions-lists m-0 p-0">
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Add College</h6>
                                          </div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Lorem ipsum</h6>
                                             <p class="mb-0">USA</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                    </ul>
                                 </div>
                                 {{-- <div class="tab-pane fade" id="lived" role="tabpanel">
                                    <h4 class="mb-3">Current City and Hometown</h4>
                                    <ul class="suggestions-lists m-0 p-0">
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/01.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Georgia</h6>
                                             <p class="mb-0">Georgia State</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><img src="images/user/02.jpg" alt="story-img" class="rounded-circle avatar-40"></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Atlanta</h6>
                                             <p class="mb-0">Atlanta City</p>
                                          </div>
                                          <div class="edit-relation"><a href="javascript:void();"><i class="ri-edit-line mr-2"></i>Edit</a></div>
                                       </li>
                                    </ul>
                                    <h4 class="mt-3 mb-3">Other Places Lived</h4>
                                    <ul class="suggestions-lists m-0 p-0">
                                       <li class="d-flex mb-4 align-items-center">
                                          <div class="user-img img-fluid"><i class="ri-add-fill"></i></div>
                                          <div class="media-support-info ml-3">
                                             <h6>Add Place</h6>
                                          </div>
                                       </li>
                                    </ul>
                                 </div> --}}
                                 {{-- <div class="tab-pane fade" id="details" role="tabpanel">
                                    <h4 class="mb-3">About You</h4>
                                    <p>Hi, I’m Bni, I’m 26 and I work as a Web Designer for the iqonicdesign.</p>
                                    <h4 class="mt-3 mb-3">Other Name</h4>
                                    <p>Bini Rock</p>
                                    <h4 class="mt-3 mb-3">Favorite Quotes</h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                 </div> --}}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="friends" role="tabpanel">
                  <div class="card">
                     <div class="iq-card-body" style="margin: 30px">
                        <h2>Friends</h2>
                        <div class="friend-list-tab mt-2">
                           <div class="tab-content">
                              <div class="row">
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/05.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>Petey Cruiser</h5>
                                                <p class="mb-0">15  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/05.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>Petey Cruiser</h5>
                                                <p class="mb-0">15  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/05.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>Petey Cruiser</h5>
                                                <p class="mb-0">15  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton01" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton01">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/06.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>Anna Sthesia</h5>
                                                <p class="mb-0">50  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton02" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton02">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/07.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>Paul Molive</h5>
                                                <p class="mb-0">10  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton03" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton03">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/08.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>Gail Forcewind</h5>
                                                <p class="mb-0">20  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton04" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton04">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/09.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>Paige Turner</h5>
                                                <p class="mb-0">12  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton05" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton05">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-lg-6 mb-3">
                                    <div class="iq-friendlist-block">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="#">
                                             <img src="images/user/10.jpg" alt="profile-img" class="img-fluid">
                                             </a>
                                             <div class="friend-info ml-3">
                                                <h5>b Frapples</h5>
                                                <p class="mb-0">6  friends</p>
                                             </div>
                                          </div>
                                          <div class="iq-card-header-toolbar d-flex align-items-center">
                                             <div class="dropdown">
                                                <span class="dropdown-toggle btn btn-secondary mr-2" id="dropdownMenuButton06" data-toggle="dropdown" aria-expanded="true" role="button">
                                                <i class="ri-check-line mr-1 text-white font-size-16"></i> Friend
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton06">
                                                   <a class="dropdown-item" href="#">Get Notification</a>
                                                   <a class="dropdown-item" href="#">Close Friend</a>
                                                   <a class="dropdown-item" href="#">Unfollow</a>
                                                   <a class="dropdown-item" href="#">Unfriend</a>
                                                   <a class="dropdown-item" href="#">Block</a>
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
            </div>
         </div>
      </div>
   </div>
   <script>
         $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()-100 && $('#bottom-loader').css('display') == 'none') {
                  @this.load_posts();
            }
         });
   </script>
</div>


    <script src="js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
     <script src="{{ asset('js/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('js/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('js/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('js/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('js/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('js/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('js/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('js/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('js/js/lottie.js') }}"></script>
    <!-- am core JavaScript -->
    <script src="{{ asset('js/js/core.js') }}"></script>
    <!-- am charts JavaScript -->
    <script src="{{ asset('js/js/charts.js') }}"></script>
    <!-- am animated JavaScript -->
    <script src="{{ asset('js/js/animated.js') }}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ asset('js/js/kelly.js') }}"></script>
    <!-- am maps JavaScript -->
    <script src="{{ asset('js/js/maps.js') }}"></script>
    <!-- am worldLow JavaScript -->
    <script src="{{ asset('js/js/worldLow.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('js/js/custom.js') }}"></script>



