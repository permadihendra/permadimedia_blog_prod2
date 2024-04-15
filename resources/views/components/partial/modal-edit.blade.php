<!-- Modal -->
<div wire:ignore.self class="modal fade" id="{{ $dataTarget }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="2" aria-labelledby="{{ $dataTarget }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="{{ $dataTarget }}">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}

            </div>

        </div>
    </div>
</div>
