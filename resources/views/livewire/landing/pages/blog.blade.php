<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>blog</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space blog-page ratio2_3">
    <div class="container">
        <div class="row">
            <!--Blog List start-->
            <div class="col-xl-12 col-lg-8 col-md-7 order-sec">
                @foreach ($data as $item)
                    <div class="row blog-media">
                        <div class="col-xl-6">
                            <div class="blog-left">
                                <a href="{{ route('detailblog', ['slug' => $item->slug]) }}"><img
                                        src="{{ route('helper.show-picture', ['path' => $item->picture]) }}"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="blog-right">
                                <div>
                                    <h6>{{ $item->created_at->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, j F Y') }}
                                    </h6><a href="{{ route('detailblog', ['slug' => $item->slug]) }}">
                                        <h4>{{ $item->title }}</h4>
                                    </a>
                                    <ul class="post-social">
                                        <li>Posted By : {{ $item->user->name }}</li>
                                        {{-- <li><i class="fa fa-heart"></i> 5 Hits</li>
                                        <li><i class="fa fa-comments"></i> 10 Comment</li> --}}
                                    </ul>
                                    @php
                                        $contentParagraphs = explode('</p>', $item->content);
                                        $firstParagraph = trim($contentParagraphs[0]);
                                    @endphp
                                    {!! $firstParagraph !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--Blog List start-->
        </div>
    </div>
</section>
<!-- Section ends -->
