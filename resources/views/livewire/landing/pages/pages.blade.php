<div>
    <x-slot:title>
        {{ $data->title }}&nbsp;-&nbsp;
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ $data->title }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- about section start -->
    <section class="about-page section-b-space">
        <div class="container">
            <div class="row">
                @if ($data->picture)
                    <div class="col-lg-12">
                        <div class="banner-section"><img
                                src="{{ route('helper.show-picture', ['path' => $data->picture]) }}"
                                class="img-fluid blur-up lazyload" alt="{{ $data->description_picture }}"></div>
                    </div>
                @endif
                <div class="col-sm-12">
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->
</div>
