<div class="container">
    <div class="row">
        <div class="col-lg-8 row m-0 p-0">
            <div class="col-sm-12">
                @include('livewire.newsfeed.newsfeed-part-top-livewire')
            </div>
            
            @foreach ($posts as $post)
                @livewire('post.post.post-view-livewire', ['post_id' => $post['id']], key("post-view-{$post['id']}"))
            @endforeach
        </div>

        @include('livewire.newsfeed.newsfeed-part-left-livewire')
        
        <div class="col-sm-12 text-center">
            <img wire:loading wire:target="load_posts" src="{{ asset('socialv/images/page-img/page-load-loader.gif') }}" alt="loader" style="height: 100px;" id="bottom-loader">
            <div wire:loading.remove wire:target="load_posts" style="height: 100px;"></div>
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
