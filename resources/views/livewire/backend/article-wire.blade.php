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
