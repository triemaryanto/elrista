<section class="bag-product ratio_square section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title3">
                    <h4>exclusive products</h4>
                    <h2 class="title-inner3">special products</h2>
                    <div class="line"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row no-slider margin-default five-product">
                    @foreach ($product2 as $listProduk2)
                        <livewire:landing.component.product-list  :productId="$listProduk2->id"
                            :wire:key="'listProduk2'.$listProduk2->id">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
