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


    {{-- use offcanvas balde component and insert livewire component inside it --}}
    <x-offcanvas>
        <x-slot name="title">
            Create Article
        </x-slot>

        {{-- insert form into slot --}}
        <form wire:submit="store">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input wire:model="title" type="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea wire:model="desc" class="form-control" id="description" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input wire:model="img" type="file" class="form-control" id="image">
            </div>
            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date</label>
                <input wire:model="publish_date" type="publish_date" class="form-control" id="publish_date">
            </div>

            <div class="text-end mt-4">
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </x-offcanvas>

    <div class="mb-2"></div>

    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Publish Date</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Publish Date</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->status }}</td>
                            <td>{{ $article->publish_date }}</td>
                            <td>{{ $article->updated_at }}</td>
                            <td>
                                <div>
                                    <button class="btn btn-outline-secondary">Detail</button>
                                    <button wire:click="edit({{ $article->id }})" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#editarticle">Edit</button>
                                    <button type="button" wire:click="delete({{ $article->id }})"
                                        wire:confirm ="Are you sure want to delete this article ? : {{ $article->name }}"
                                        class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deletearticle">Delete</button>
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
