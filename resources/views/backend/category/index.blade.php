<x-layouts.template>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol>

        <div class="row mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate"">
            <div class="col">
                <button class="btn btn-success">Create</button>
            </div>
        </div>

        <x-partial.modal-create-category>
            <p>this is modal static</p>
        </x-partial.modal-create-category>

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

</x-layouts.template>
