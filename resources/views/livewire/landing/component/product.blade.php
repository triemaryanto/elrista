<section class="section-b-space bg-light bag-product ratio_square">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title3">
                    <h4>{{ get_setting()->site_name }}</h4>
                    <h2 class="title-inner3">limited period offer</h2>
                    <div class="line"></div>
                </div>
                <div class="product-5 product-m no-arrow">
                    @foreach ($product2 as $listProduk)
                        <div class="product-box product-wrap product-style-2">
                            <livewire:landing.component.product-list :productId="$listProduk->id"
                                :wire:key="'listProduk'.$listProduk->id">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
