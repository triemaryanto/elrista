<div>
    <div id="modal_title_basic" class="modal fade @if ($isShow) show @endif"
        @if ($isShow) style="display: block;" @else style="display: none;" aria-hidden="true" @endif
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <span class="font-weight-semibold modal-title">Delete Data</span>
                    <button type="button" class="close" data-dismiss="modal" wire:click='showModal'>&times;</button>
                </div>

                <div class="modal-body">
                    <p><i class="icon-warning22 mr-3 icon-2x text-danger"></i> Are you sure you want to delete data
                        This?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-warning" data-dismiss="modal"
                        wire:click='showModal'>Cancel</button>
                    <button type="button" class="btn bg-primary" wire:click="confirm">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
