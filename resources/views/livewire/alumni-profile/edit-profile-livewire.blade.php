<div>
   <div id="content-page" class="content-page">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="card inner-page">
                  <div class="iq-card-body p-0">
                     <div class="iq-edit-list">
                        <ul class="iq-edit-profile d-flex nav nav-pills">
                           <li class="col-md-3 p-0">
                              <a class="nav-link active" data-toggle="pill" href="#personal-information">
                              Personal Information
                              </a>
                           </li>
                           <li class="col-md-3 p-0">
                              <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                              Change Password
                              </a>
                           </li>
                           <li class="col-md-3 p-0">
                              <a class="nav-link" data-toggle="pill" href="#emailandsms">
                              Email and SMS
                              </a>
                           </li>
                           <li class="col-md-3 p-0">
                              <a class="nav-link" data-toggle="pill" href="#manage-contact">
                              School and Work Related
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-12" >
               <div class="iq-edit-list-data">
                  <div class="tab-content">
                     <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="card inner-page">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title" style="margin: 20px">
                                 <h4 class="card-title">Personal Information</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <form style="margin: 20px" wire:submit.prevent="save">
                                 <div class="form-group row align-items-center">
                                    <div class="col-md-12">
                                       <div class="profile-img-edit">
                                          <img class="profile-pic" src="img/sunset.jfif" alt="profile-pic">
                                          <div class="p-image">
                                             <i class="ri-pencil-line upload-button"></i>
                                             <input class="file-upload" type="file" accept="image/">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" row align-items-center" >
                                    <div class="form-group col-sm-6">
                                       <label for="firstname">First Name:</label>
                                       <input wire:model="user.firstname" type="text" class="form-control" id="firstname" value="">
                                       @error('user.firstname') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="lastname">Last Name:</label>
                                       <input wire:model="user.lastname" type="text" class="form-control" id="lastname" value="">
                                       @error('user.lastname') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="email">User Name:</label>
                                       <input wire:model="user.email" type="text" class="form-control" id="email" value="">
                                       @error('user.email') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="phone">Phone Number:</label>
                                       <input wire:model="user.phone" type="text" class="form-control" id="phone" value="">
                                       @error('user.phone') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label class="d-block">Gender:</label>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input wire:model="user.sex" value="male" type="radio" id="customRadio6" name="customRadio1" class="custom-control-input" checked="">
                                          <label class="custom-control-label" for="customRadio6"> Male </label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input wire:model="user.sex" value="female" type="radio" id="customRadio7" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label" for="customRadio7"> Female </label>
                                       </div>
                                       @error('user.sex') <small class="red-text">{{ $message }}</small> @enderror
                                       
                                    </div>

                                    <div class="form-group col-sm-6">
                                       <label for="birthday">Date Of Birth:</label>
                                       <input wire:model="user.birthday" class="form-control" id="birthday" value="">
                                       @error('user.birthday') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-sm-6" >
                                       <label for="civil_status" >Marital Status:</label>
                                       <input wire:model="user.civil_status" class="form-control" id="civil_status">
                                       @error('user.civil_status') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="age">Age:</label>
                                       <input wire:model="user.age" class="form-control" id="age" value="">
                                       @error('user.age') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-sm-12">
                                       <label>Address:</label>
                                       <textarea wire:model="user.address" class="form-control" id="address" rows="3" style="line-height: 20px;">
                                       </textarea>
                                       @error('user.address') <small class="red-text">{{ $message }}</small> @enderror
                                    </div>
                                 </div>
                                 <button wire:click="save" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancel</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                        <div class="iq-card">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Change Password</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <form>
                                 <div class="form-group">
                                    <label for="cpass">Current Password:</label>
                                    <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                    <input type="Password" class="form-control" id="cpass" value="">
                                 </div>
                                 <div class="form-group">
                                    <label for="npass">New Password:</label>
                                    <input type="Password" class="form-control" id="npass" value="">
                                 </div>
                                 <div class="form-group">
                                    <label for="vpass">Verify Password:</label>
                                    <input type="Password" class="form-control" id="vpass" value="">
                                 </div>
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancle</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                        <div class="iq-card">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Email and SMS</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <form>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                    <div class="col-md-9 custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                       <label class="custom-control-label" for="emailnotification"></label>
                                    </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                    <div class="col-md-9 custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                       <label class="custom-control-label" for="smsnotification"></label>
                                    </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="npass">When To Email</label>
                                    <div class="col-md-9">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email01">
                                          <label class="custom-control-label" for="email01">You have new notifications.</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email02">
                                          <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                          <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row align-items-center">
                                    <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                    <div class="col-md-9">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email04">
                                          <label class="custom-control-label" for="email04"> Upon new order.</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email05">
                                          <label class="custom-control-label" for="email05"> New membership approval</label>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                          <label class="custom-control-label" for="email06"> Member registration</label>
                                       </div>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancle</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                        <div class="iq-card">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Manage Contact</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <form>
                                 <div class="form-group">
                                    <label for="cno">Contact Number:</label>
                                    <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" value="Bnijone@demo.com">
                                 </div>
                                 <div class="form-group">
                                    <label for="url">Url:</label>
                                    <input type="text" class="form-control" id="url" value="https://getbootstrap.com">
                                 </div>
                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                 <button type="reset" class="btn iq-bg-danger">Cancle</button>
                              </form>
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
{{-- 
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
    <script src="{{ asset('js/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('js/js/custom.js') }}"></script> --}}
