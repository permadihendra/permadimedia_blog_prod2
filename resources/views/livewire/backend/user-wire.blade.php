@section('title', 'Users - Admin')

<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List of users</li>
    </ol>

    <x-partial.modal-create title="Register User" dataTarget="modalCreate">
        <form wire:submit="store">
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('form.name') is-invalid @enderror  " id="name"
                        name="name" wire:model="form.name">
                    @error('form.name')
                        <div class="invalid-feedback">
                            <span class="error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-4 col-form-label">Email Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('form.email') is-invalid @enderror  "
                        id="email" name="email" wire:model="form.email">
                    @error('form.email')
                        <div class="invalid-feedback">
                            <span class="error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('form.password') is-invalid @enderror  "
                        id="password" name="password" wire:model="form.password">
                    @error('form.password')
                        <div class="invalid-feedback">
                            <span class="error">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="text"
                        class="form-control @error('form.password_confirmation') is-invalid @enderror  "
                        id="password_confirmation" name="password_confirmation" wire:model="form.password_confirmation">
                    @error('form.password_confirmation')
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
    {{-- User Datatables livewire component --}}
    <livewire:datatables.user-table-wire />

</div>
