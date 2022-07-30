<x-m.page.modal-form id="designation-form-modal">
    <x-slot name="header">{{ isset($designation_id)? 'Update': 'Add' }} Designation</x-slot>

    <div class="row">
        <div class="col s12 mb-2">
            <label for="designation" class="active">Designation</label>
            <select wire:model="user_designation.designation_id" id="designation" class="browser-default">
                <option value="">Select Designation</option>
                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                @endforeach
            </select>
            @error('user_designation.designation_id') <small class="red-text">{{ $message }}</small> @enderror
        </div>

        @if ( in_array($access, ['campus','college','program']) )
            <div class="col s12 mb-2" wire:key='campus-select'>
                <label for="campus" class="active">Campus</label>
                <select wire:model="user_designation.campus_id" id="campus" class="browser-default">
                    <option selected>Select Campus</option>
                    @foreach ($campuses as $campus)
                        <option value="{{ $campus->id }}">
                            {{ $campus->campus }}
                        </option>
                    @endforeach
                </select>
                @error('user_designation.campus_id') <small class="red-text">{{ $message }}</small> @enderror
            </div>
        @endif
        
        @if ( in_array($access, ['college','program']) )
            <div class="col s12 mb-2" wire:key='college-select'>
                <label for="college" class="active">College</label>
                <select wire:model="user_designation.college_id" id="college" class="browser-default" {{ empty($user_designation->campus_id)? 'disabled': '' }}>
                    <option selected>Select College</option>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}">
                            {{ $college->college }}
                        </option>
                    @endforeach
                </select>
                @error('user_designation.college_id') <small class="red-text">{{ $message }}</small> @enderror
            </div>
        @endif
        
        @if ( in_array($access, ['program']) )
            <div class="col s12 mb-2" wire:key='program-select'>
                <label for="program" class="active">Program</label>
                <select wire:model="user_designation.program_id" id="college" class="browser-default" {{ empty($user_designation->college_id)? 'disabled': '' }}>
                    <option selected>Select Program</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">
                            {{ $program->program }}
                        </option>
                    @endforeach
                </select>
                @error('user_designation.program_id') <small class="red-text">{{ $message }}</small> @enderror
            </div>
        @endif
    </div>
    
    <x-slot name="footer">
        <x-m.button.a onclick="save()" wire:loading.class="disabled" wire:target="save" :isGood="true" >
            {{ isset($designation_id)? 'Update': 'Add' }}
        </x-m.button.a>
    </x-slot>

    <script>
        function save() {
            swal({
                title: 'Add a record?',
                text: 'New record will be added',
                icon: 'warning',
                buttons: true,
                dangerMode: false,
                buttons: ['Cancel', 'Yes, Add It'],
            }).then((agree) => {
                if (agree) {
                    @this.save();
                }
            });
        }
    </script>
</x-m.page.modal-form>
