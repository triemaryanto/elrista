@if ($paginator->hasPages())
    <div class="theme-paggination-block">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @if ($paginator->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:;" wire:click="previousPage" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-chevron-left"
                                            aria-hidden="true"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="javascript:;" wire:click="previousPage"
                                    aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-chevron-left"
                                            aria-hidden="true"></i></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        @endif
                        @foreach ($elements as $element)
                            {{-- Make dots here --}}
                            @if (is_string($element))
                                <li class="page-item disabled"><a class="page-item"><span>{{ $element }}</span></a>
                                </li>
                            @endif

                            {{-- Links array Here --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="page-item " aria-current="page"><a href="javascript:;"
                                                wire:click="gotoPage({{ $page }})"
                                                class="page-link active"><span>{{ $page }}</span></a></li>
                                    @else
                                        <li class="page-item"><a href="javascript:;"
                                                wire:click="gotoPage({{ $page }})"
                                                class="page-link">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" wire:click="nextPage" href="javascript:;" aria-label="Next">
                                    <span aria-hidden="true">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </span>
                                    <span class="sr-only">Next</span></a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" wire:click="nextPage" href="javascript:;" aria-label="Next">
                                    <span aria-hidden="true">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </span>
                                    <span class="sr-only">Next</span></a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="product-search-count-bottom">
                    <h5>Showing Products 1-24 of 10 Result</h5>
                </div>
            </div>
        </div>
    </div>
@endif
