<section class="section mt-2">
    <x-m.page.breadcrumb>
        <li class="breadcrumb-item">
            <a href="{{ route('user.management') }}">User Management</a>
        </li>
        <li class="breadcrumb-item active">
            <a>{{ isset($user_id)? 'Update': 'Create' }} User</a>
        </li>
    </x-m.page.breadcrumb>

    <div>
        <div id="Form-advance" class="card card card-default">
            <div class="card-content">
                <h5 class="card-title">{{ isset($user_id)? 'Update': 'Create' }} User</h5>
                <div class="row">
                    <div class="col m4 s12 mb-2">
                        <label for="firstname">First Name</label>
                        <input id="firstname" wire:model.lazy="user_info.firstname" type="text" class="mb-0">
                        @error('user_info.firstname') <small class="red-text">{{ $message }}</small> @enderror
                    </div>
                    <div class="col m4 s12 mb-2">
                        <label for="middlename">Middle Name</label>
                        <input id="middlename"  wire:model.lazy="user_info.middlename" type="text" class="mb-0">
                        @error('user_info.middlename') <small class="red-text">{{ $message }}</small> @enderror
                    </div>
                    <div class="col m4 s12 mb-2">
                        <label for="lastname">Last Name</label>
                        <input id="lastname" wire:model.lazy="user_info.lastname" type="text" class="mb-0">
                        @error('user_info.lastname') <small class="red-text">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m8 mb-2">
                        <label for="email">Email</label>
                        <input id="email" wire:model.lazy="user_info.email" type="email" class="mb-0">
                        @error('user_info.email') <small class="red-text">{{ $message }}</small> @enderror
                    </div>
                    <div class="col s12 m4 mb-2">
                         <label for="sex">Sex</label>
                         <select wire:model="user_info.sex" id="sex" class="browser-default mb-0">
                            <option value="">Select Sex</option>
                             <option value="male">Male</option>
                             <option value="female">Female</option>
                         </select>
                         @error('user_info.sex') <small class="red-text">{{ $message }}</small> @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col s12 m8 mb-2">
                        <label for="phone">Phone Number</label>
                        <input id="phone" wire:model.lazy="user_info.phone" type="text" class="mb-0">
                        @error('user_info.phone') <small class="red-text">{{ $message }}</small> @enderror
                    </div>
                    <div class="col s12 m4 mb-2">
                         <label for="civil_status">Civil Status</label>
                         <select wire:model="user_info.civil_status" id="civil_status" class="browser-default mb-0">
                             <option value="">Select Civil Status</option>
                             <option value="single">Single</option>
                             <option value="married">Married</option>
                             <option value="divorced">Divorced</option>
                             <option value="separated">Separated</option>
                             <option value="widowed">Widowed</option>
                         </select>
                         @error('user_info.civil_status') <small class="red-text">{{ $message }}</small> @enderror
                    </div>
                </div>

                @empty( $user_id )
                    <div class="row">
                        <div class="col s12 mb-2">
                            <label for="password">Password</label>
                            <input id="password" wire:model.lazy="password" type="password" class="mb-0">
                            @error('password') <small class="red-text">{{ $message }}</small> @enderror
                        </div>
                    </div>
                @endempty

                <div class="row">
                    <div class="col s12 text-end right-align">
                        <x-m.button.a href="{{ route('user.management') }}">
                            <span class="bi bi-x-circle"></span>
                            Cancel
                        </x-m.button.a>
                        <x-m.button.a onclick="save()" :isGood="true" >
                            <span class="bi bi-save"></span>
                            {{ isset($user_id)? 'Update': 'Save' }}
                        </x-m.button.a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function save() {
            swal({
                title: @this.user_id? 'Update the record?': 'Add a record?',
				text: @this.user_id? 'Your record will be modified': 'New record will be added',
				icon: 'warning',
				buttons: true,
				dangerMode: false,
                buttons: ['Cancel', @this.user_id? 'Yes, Update It': 'Yes, Add It'],
            }).then((agree) => {
				if (agree) {
                    @this.save();
				}
            });
        }
    </script>
</section>
