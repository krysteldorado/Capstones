<form wire:submit.prevent="signin" class="login-form">
    <div class="row">
        <div class="input-field col s12">
            <h5 class="center-align">
                Welcome to BATIS!
            </h5>
            <a href="">
                <h6 class="center-align" style="font-size: 13.5px;">
                    FAQ | How It Works
                </h6>
            </a>
        </div>
    </div>
    <div class="row margin mb-2">
        <div class="input-field col s12 mb-0">
            <i wire:ignore.self class="material-icons prefix pt-2">person_outline</i>
            <input wire:model.lazy='email' id="username" type="text">
            <label wire:ignore.self for="username" class="center-align">Username</label>
        </div>
        @error('email') <small class="red-text col s12">{{ $message }}</small> @enderror
    </div>
    <div class="row margin mb-2">
        <div class="input-field col s12 mb-0" x-data="{ show: true }">
            <i wire:ignore.self class="material-icons prefix pt-2">lock_outline</i>
            <input wire:model.lazy='password' id="password" :type="show?'password':'text'">
            <i class="material-icons prefix pt-2 cursor-pointer" @click="show=!show" x-text="show?'visibility':'visibility_off'" style="margin-left: -30px;">visibility</i>
            <label wire:ignore.self for="password">Password</label>
        </div>
        @error('password') <small class="red-text col s12">{{ $message }}</small> @enderror
    </div>
    <div class="row px-2">
        <div class="col s12 m12 l12 ml-2 mt-1">
        <p>
            <label>
                <input wire:model="remember_me" type="checkbox" class="filled-in"/>
                <span>Remember Me</span>
            </label>
        </p>
        </div>
    </div>
    <div class="row px-2">
        <div class="input-field col s12 my-0">
            <button class="btn waves-effect waves-light border-round purple lighten-3 col s12 gradient-45deg-button-good">Sign in</button>
        </div>
        <h6 class="col s12 center-align mb-0">
            or
        </h6>
        <div class="input-field col s12 my-2">
            <a href="{{--  route('signin.google')  --}}" class="btn waves-effect waves-dark border-round col s12 gradient-45deg-button-good">
                <span style="text-transform: none;">
                    Sign in with Google
                </span>
            </a>
            <a href="{{--  route('signin.google')  --}}" class="btn waves-effect waves-dark border-round col s12 mt-3 gradient-45deg-button-good">
                <span style="text-transform: none;">
                    Sign up with Google
                </span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <p class="margin right-align medium-small"><a href="{{--  route('forgot.password')  --}}">Forgot password ?</a></p>
        </div>
    </div>
    
    <script>
        window.addEventListener('swal:modal:error:signin', event => { 
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
            })
            .then((value) => {
                $("#signin-username").focus();
            })
        });
    </script>
</form>

