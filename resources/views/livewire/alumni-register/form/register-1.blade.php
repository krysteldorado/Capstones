<fieldset id="register-1">
    <div class="form-card text-start">
    <div class="row register-form">
        <div class="col-md-6">
            <div class="form-group">
                <input wire:model="register.firstname" type="text" class="form-control" name="firstname" placeholder="First Name *" />
                @error('register.firstname') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <input wire:model="register.middlename" type="text" class="form-control" name="middlename" placeholder="Middle Name *" />
                @error('register.middlename') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <input wire:model="register.lastname" class="form-control" name="lastname" type="text" placeholder="Last Name *">
                @error('register.lastname') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <input wire:model="register.sex" value="female" class="radio inline" type="radio" name="sex" id="radio-female">
                <label class="radio inline" for="radio-female"> Female </label>
                @error('register.sex') <small class="text-danger">{{ $message }}</small> @enderror
            
                <input wire:model="register.sex" value="male" class="radio inline" type="radio" name="sex" id="radio-male">
                <label class="radio inline" for="radio-male"> Male</label>
                @error('register.sex') <small class="text-danger">{{ $message }}</small> @enderror
            </div><br>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <input wire:model="register.civil_status" type="text" class="form-control" name="civil_status" placeholder="Civil Status *" />
                @error('register.civil_status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <input wire:model="register.phone" type="text" class="form-control" name="phone" placeholder="Phone *" />
                @error('register.phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <input wire:model="register.email" type="text" class="form-control" name="email" placeholder="Email *" />
                @error('register.email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <input wire:model="register.password" class="form-control" name="password" type="password" placeholder="Password *">
                @error('register.password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
        </div>
    </div>
    </div>
</fieldset>
