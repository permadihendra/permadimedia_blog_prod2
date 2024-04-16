<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
    aria-controls="staticBackdrop">
    {{ $title }}
</button>

{{-- Add wire ignore self -  to prevent offcanvas closed before validation --}}
<div wire:ignore.self class="offcanvas offcanvas-end w-sm-70 " data-bs-backdrop="static" data-bs-scroll="true"
    tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header bg-success text-white">
        <h5 class="offcanvas-title" id="staticBackdropLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
