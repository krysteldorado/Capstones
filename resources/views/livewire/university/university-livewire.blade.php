<section class="section mt-2">
    <div class="row">
        <div class="col s12 m6">
            <div class="card card-content mb-3 pr-4 pl-4 pt-4 text-center mx-auto center-align" style="max-width: 500px; height: 425px;">
                <img wire:click='$emit("edit_logo")' src="{{ route('file.university.logo') }}" alt="university" id="logo-{{ $logo_refresh }}" class="mb-3 circle" style="max-width: 180px; height: 180px; ">
                <div wire:click='$emit("edit")' class="center-align">
                    <h4>
                        {{ $university->university?? 'University' }}
                    </h4>
                    <p class="">
                        {{ $university->about?? 'About' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col m6">
            <div class="card card-content mb-3 pr-4 pl-4 pt-4 text-center mx-auto center-align" style="max-width: 500px; height: 425px;">
                <img src="{{ asset('img/extension.jpg') }}" alt="extension" id="logo-extension" class="mb-3 circle" style="max-width: 180px; height: 180px;">
                <h4>
                    Extension Services
                </h4>
                <p class="">
                    At BatStateU, we are committed to render extension service to depressed and underserved communities, 
                    as well as to share our expertise in science, technology, education, management and 
                    research to public and private agencies/organizations that need our services.
                </p>
            </div>
        </div>
    </div>

    @can('updateLogo', $university)
        <div wire:ignore>
            @livewire('university.university-logo-livewire', key('university-logo-livewire'))
        </div>
    @endcan
    @can('update', $university)
        <div wire:ignore>
            @livewire('university.university-form-livewire', key('university-form-livewire'))
        </div>
    @endcan
</section>
