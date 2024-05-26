<div class="container-fluid px-4">
    <h1 class="mt-4">Blog Config</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Application Setting</li>
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


    <x-partial.modal-edit title="Edit Config" dataTarget="editConfig">

        <div class="mb-3 row">
            <label for="name" class="col-sm-4 col-form-label">Config Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control @error('name') is-invalid @enderror  " id="name"
                    name="name" wire:model="name" readonly disabled autocomplete="name">

                @error('name')
                    <div class="invalid-feedback">
                        <span class="error">{{ $message }}</span>
                    </div>
                @enderror

            </div>
        </div>

        <div class="mb-3 row">
            <label for="value" class="col-sm-4 col-form-label">Config Value</label>
            <div class="col-sm-8">
                <textarea cols="30" rows="5" class="form-control @error('value') is-invalid @enderror  " id="value"
                    name="value" wire:model="value"></textarea>

                @error('value')
                    <div class="invalid-feedback">
                        <span class="error">{{ $message }}</span>
                    </div>
                @enderror

            </div>
        </div>

        <div class="text-end">
            <button wire:click="cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button wire:click="update({{ $configId }})" type="button" class="btn btn-success">Update</button>
        </div>

    </x-partial.modal-edit>

    <div class="card mb-4">

        <div class="card-body overflow-x-scroll">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Config Name</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($configs as $config)
                        <tr :key="{{ $config->id }}">
                            <td>{{ $config->id }}</td>
                            <td>{{ $config->name }}</td>
                            <td>{{ $config->value }}</td>
                            <td>
                                <div>
                                    <button wire:click="edit({{ $config->id }})" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#editConfig">Edit</button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
