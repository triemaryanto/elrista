@push('css')
    <style rel="stylesheet" type="text/css">
        body {
            background-image: url("https://bit.ly/3nFVqJh");
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
        <a class="link" href="#" target="_blank">
            Website Elrista
        </a>
        </a>
    </div>

    <div id="hashtag">
        #BeHappy❤
    </div>
</div>
