<div class="container-fluid px-4">
    <h1 class="mt-4">Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List of articles</li>
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
                    {{-- @foreach ($categories as $category)
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
                    @endforeach --}}
        </div>


        </tbody>
        </table>
    </div>
</div>
</div>
