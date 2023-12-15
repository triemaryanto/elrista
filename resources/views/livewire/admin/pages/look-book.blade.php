@push('css')
    <link href="{{ asset('costum/') }}/lookbook.css" rel="stylesheet" type="text/css">
    <style rel="stylesheet" type="text/css">
        .image-container {
            height: 523px;
            width: 100%;
            max-width: 520px;
            text-align: center;
            position: relative;
        }

        .inner-div {
            position: absolute;
            position: absolute;
            top: 50%;
            left: 75%;
            transform: translate(-50%, -50%);
            width: 520px;
            height: 523px;
            {{-- background: url('{{ $image->temporaryUrl() }}') center center / cover; --}}
        }

        @media (max-width: 767px) {
            .image-container {
                height: 300px;
            }
        }
    </style>
@endpush
<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Look Book" subjudul="" :breadcrumb="['List Look Book', '(Tahap Pengembangan Developer)']" />
    </x-slot>

    <div class="card">
        <div class="card-header">
            @if ($isEdit)
                <a href="#" wire:click='cancel' class="btn btn-warning mt-md-0 mt-2 ml-md-8">Cancel</a>
            @else
                <a href="#" wire:click='add' class="btn btn-primary mt-md-0 mt-2">Create LookBook</a>
            @endif

        </div>

        <div class="card-body">
            @if ($isEdit)
                <form action="#" wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="lookbook">
                                <label class="font-weight-semibold">Image:</label>
                                <div class="lookbook-block">
                                    @if ($image || $edit_image)
                                        @if ($image)
                                            <div class="image-container">
                                                <div class="inner-div"
                                                    style="background: url('{{ $image->temporaryUrl() }}') center center / cover;"">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        @endif
                                        @foreach (range(1, 42) as $number)
                                            <div class="lookbook-dot dot{{ $number }}"
                                                wire:click="AddProduct_link({{ $number }})">
                                                <i class="ml-2">
                                                    {{ $number }}</i>

                                            </div>
                                        @endforeach

                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Judul:</label>
                                <div class="col-lg-10">
                                    <input wire:model="name" class="form-control" type="text" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Image</label>
                                <div class="col-lg-10">
                                    <input wire:model="image" class="form-control" type="file"
                                        accept="image/png, image/jpeg">
                                </div>
                            </div>
                            @if ($pilih)
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"></label>
                                    <div class="col-lg-10">
                                        <table class="table table-strip text-center">
                                            <thead>
                                                <th>Nomor</th>
                                                <th>Nama Product</th>
                                                <th>Harga</th>
                                                <th>Image</th>
                                                <th></th>
                                            </thead>
                                            <tbody>

                                                @foreach ($pilih as $index => $item)
                                                    <tr>
                                                        <td>{{ $item['dots'] }}</td>
                                                        <td style="width: 25%;">
                                                            {{ get_product($item['product_id'])->name }}</td>
                                                        <td style="width: 25%;">Rp.
                                                            {{ number_format(get_product($item['product_id'])->price, 0, ',', '.') }}
                                                        </td>
                                                        <td style="width: 10%;">
                                                            <img src="{{ route('helper.show-picture', ['path' => get_product($item['product_id'])->gambar_satu->img1]) }}"
                                                                class="kecil" alt="">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning"
                                                                wire:click="KonfirmasiHapus({{ $index }})"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save LookBook</button>
                            </div>
                        </div>

                    </div>
                </form>
            @else
                <livewire:admin.table.look-book-list>
            @endif

        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="Modalproduct" tabindex="-1" data-backdrop="static"
        data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="closeModalProduct">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <livewire:admin.pages.setting.banner.product-add-table />
                </div>
            </div>
        </div>
    </div>
    <livewire:admin.global.konfirmasi-hapus />
    <div id="modal_title_basic" class="modal fade @if ($tampilModal) show @endif"
        @if ($tampilModal) style="display: block;" @else style="display: none;" aria-hidden="true" @endif
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <span class="font-weight-semibold modal-title">Hapus Data</span>
                    <button type="button" class="close" wire:click='showModal'>&times;</button>
                </div>

                <div class="modal-body">
                    <p><i class="icon-warning22 mr-3 icon-2x text-danger"></i> Apakah Anda yakin akan menghapus
                        data ini?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-warning" wire:click='showModal'>Tidak</button>
                    <button type="button" class="btn bg-primary" wire:click="Kofirm">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            window.addEventListener('show-product-modal', event => {
                $('#Modalproduct').modal('show');
            });

            window.addEventListener('close-product-modal', event => {
                $('#Modalproduct').modal('hide');
            });
        });
    </script>
@endpush
