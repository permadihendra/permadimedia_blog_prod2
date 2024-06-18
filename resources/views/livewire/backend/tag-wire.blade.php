<div class="container-fluid px-4">
    <h1 class="mt-4">Tags</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tags</li>
    </ol>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('successUpdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('successUpdate') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('successDelete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('successDelete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <x-partial.modal-create title="Create Tags" dataTarget="modalCreate">
        <form wire:submit="store">
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Tags Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('name') is-invalid @enderror  " id="name"
                        name="name" wire:model="name" autocomplete="name">

                    @error('name')
                        <div class="invalid-feedback">
                            <span class="error">{{ $message }}</span>
                        </div>
                    @enderror

                </div>

            </div>

            <div class="text-end">
                <button wire:click="cancel" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </x-partial.modal-create>


    <x-partial.modal-edit title="Edit tags" dataTarget="editTags">

        <div class="mb-3 row">
            <label for="tagsId" class="col-sm-4 col-form-label">Category ID</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="tagsId" name="tagsId" wire:model="tagsId" disabled>

            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-4 col-form-label">Tags Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control @error('name') is-invalid @enderror  " id="name"
                    name="name" wire:model="name" autocomplete="name">

                @error('name')
                    <div class="invalid-feedback">
                        <span class="error">{{ $message }}</span>
                    </div>
                @enderror

            </div>
        </div>

        <div class="text-end">
            <button wire:click="cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button wire:click="update({{ $tagsId }})"type="button" class="btn btn-success">Update</button>
        </div>

    </x-partial.modal-edit>

    <livewire:datatables.tags-table-wire />
</div>
