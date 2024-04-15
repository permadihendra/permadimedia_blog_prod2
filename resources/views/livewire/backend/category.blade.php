<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Category</li>
    </ol>
    {{-- @error('categoryName')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror --}}

    <x-partial.modal-create title="Create Category" dataTarget="modalCreate">
        <form wire:submit="store">
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Category Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('name') is-invalid @enderror  " id="name"
                        name="name" wire:model="name">

                    @error('name')
                        <div class="invalid-feedback">
                            <span class="error">{{ $message }}</span>
                        </div>
                    @enderror

                </div>

            </div>

            <div class="text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>

    </x-partial.modal-create>

    <div class="card mb-4">
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
                                    <button class="btn btn-outline-primary">Edit</button>
                                    <button class="btn btn-outline-danger">Delete</button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
        </div>


        </tbody>
        </table>
    </div>
</div>
</div>
