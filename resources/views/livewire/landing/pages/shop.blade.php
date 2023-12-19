<div>
    <x-slot:title>
        Shop&nbsp;-&nbsp;
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>collection</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">collection</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> back</span></div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">Category</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach ($category as $key => $valueCategory)
                                            <div class="form-check collection-filter-checkbox">
                                                <input type="checkbox" class="form-check-input"
                                                    wire:model="idCategory.{{ $valueCategory->id }}"
                                                    value="{{ $valueCategory->id }}">
                                                <label class="form-check-label" for="{{ $valueCategory->id }}">
                                                    {{ $valueCategory->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- color filter start here -->
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">colors</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="color-selector">
                                        <ul>
                                            @foreach ($colors as $color)
                                                <li style="background-color: {{ $color->color }};"
                                                    wire:click="toggleColor('{{ $color->color }}')"
                                                    class="{{ $choiceColor === $color->color ? 'active' : '' }}">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">size</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach ($sizes as $size)
                                            <div class="form-check collection-filter-checkbox">
                                                <input type="checkbox" class="form-check-input"
                                                    wire:model='choiceSize.{{ $size->size }}'
                                                    value="{{ $size->size }}">
                                                <label class="form-check-label">{{ $size->size ?? '' }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card" wire:ignore>
                            <h5 class="title-border">new product</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    @foreach ($new as $item)
                                        <div class="media">
                                            <a href="{{ route('detail', ['slug' => $item->slug]) }}"><img
                                                    class="img-fluid blur-up lazyload"
                                                    src="{{ route('helper.show-picture', ['path' => $item->gambar_satu->img1]) }}"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <a href="{{ route('detail', ['slug' => $item->slug]) }}">
                                                    <h6>{{ $item->name }}</h6>
                                                </a>
                                                <h4>@currency($item->price)</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    @foreach ($new1 as $item)
                                        <div class="media">
                                            <a href="{{ route('detail', ['slug' => $item->slug]) }}"><img
                                                    class="img-fluid blur-up lazyload"
                                                    src="{{ route('helper.show-picture', ['path' => $item->gambar_satu->img1]) }}"
                                                    alt=""></a>
                                            <div class="media-body align-self-center">
                                                <a href="{{ route('detail', ['slug' => $item->slug]) }}">
                                                    <h6>{{ $item->name }}</h6>
                                                </a>
                                                <h4>@currency($item->price)</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <div class="top-banner-content small-section">
                                            <input type="text" class="form-control" placeholder="search"
                                                wire:model="search">
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span
                                                            class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing Products 1-24 of 10 Result</h5>
                                                        </div>
                                                        <div class="product-page-per-view">
                                                            <select wire:model="limit">
                                                                <option value="24">24 Products Par Page
                                                                </option>
                                                                <option value="50">50 Products Par Page
                                                                </option>
                                                                <option value="100">100 Products Par Page
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select wire:model="order">
                                                                <option value="DESC">Latest
                                                                    added</option>
                                                                <option value="ASC">Oldest
                                                                    added</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res">

                                                @foreach ($products as $product)
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <livewire:landing.component.product-list :productId="$product->id"
                                                                :wire:key="'pro'.$product->id">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        @if (count($products))
                                            {{ $products->links('pagination') }}
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- section End -->
@push('js')
    <script>
        window.addEventListener('change-color', event => {
            $(".color-selector ul li").removeClass("active");
            $("#".event.detail.color)..addClass("active")
        });
    </script>
@endpush
