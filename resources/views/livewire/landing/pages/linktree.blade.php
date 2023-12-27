@push('css')
    <style type="text/css" rel="stylesheet">
        body {
            background-image: url({{ route('helper.show-picture', ['path' => get_setting()->background_image]) }});

        }
    </style>
@endpush

<div>
    <!-- Parallax Pixel Background Animation -->
    <section class="animated-background">
        <div id="stars1"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    </section>
    <!-- End of Parallax Pixel Background Animation -->

    <a id="profilePicture">
        <img src="{{ get_setting()->logo ? route('helper.show-picture', ['path' => get_setting()->logo]) : asset('multikart_all_in_one/assets/images/icon/logo/f5.png') }}"
            alt="Profile Picture">
    </a>

    <div id="userName">
        @elrista
    </div>

    <div id="links">
        @foreach ($data as $item)
            <a class="link" href="{{ $item->url }}" target="_blank">
                {{ $item->title }}
            </a>
        @endforeach
    </div>

    <div id="hashtag">
        #BeHappy❤
    </div>
</div>
