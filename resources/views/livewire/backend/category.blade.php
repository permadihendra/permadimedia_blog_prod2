<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Category</li>
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

    <x-partial.modal-create title="Create Category" dataTarget="modalCreate">
        <form wire:submit="store">
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Category Name</label>
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


    <x-partial.modal-edit title="Edit Category" dataTarget="editCategory">

        <div class="mb-3 row">
            <label for="categoryId" class="col-sm-4 col-form-label">Category ID</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="categoryId" name="categoryId" wire:model="categoryId"
                    disabled>

            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-4 col-form-label">Category Name</label>
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
            <button wire:click="update({{ $categoryId }})"type="button" class="btn btn-success">Update</button>
        </div>

    </x-partial.modal-edit>

    {{-- <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <div>
                                    <button wire:click="edit({{ $category->id }})" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#editCategory">Edit</button>
                                    <button type="button" wire:click="delete({{ $category->id }})"
                                        wire:confirm ="Are you sure want to delete this category ? : {{ $category->name }}"
                                        class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteCategory">Delete</button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
        </div>


        </tbody>
        </table>
    </div> --}}
    <livewire:datatables.category-table-wire />
</div>
