<div class="card">
    <div class="card-header bg-body-light">
        <div class="row">
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                    <input wire:model.live.debounce.300ms="search" type="text" class="form-control"
                        placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="col-sm-auto ms-auto row">
                <div class="col-sm-auto row">
                    <div class="col-auto">
                        <label for="status" class="col-form-label">Category : </label>
                    </div>
                    <div class="col-auto">
                        <select wire:model.change="categoryFilter" id="status" class="form-select"
                            aria-label="select">
                            <option value="">All status</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-auto row">
                    <div class="col-auto">
                        <label for="status" class="col-form-label">Status : </label>
                    </div>
                    <div class="col-auto">
                        <select wire:model.change="status" id="status" class="form-select" aria-label="select">
                            <option value="">All status</option>
                            <option value="0">Draft</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="card-body overflow-x-scroll">
        <table class="table table-hover fs-8">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" wire:click="setSortBy('title')">Title <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('category_id')">Category <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('status')">Status <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('publish_date')">Published Data <i class="fas fa-sort"></i>
                    </th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr :key={{ $article->id }}>
                        <td>{{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>
                            @if ($article->status == 0)
                                <small class="badge bg-danger">Draft</small>
                            @else
                                <small class="badge bg-success">Published</small>
                            @endif
                        </td>
                        <td>{{ $article->publish_date }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td>
                            <div>
                                <button class="btn btn-outline-secondary">Detail</button>
                                <button wire:click="edit({{ $article->id }})" class="btn btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#editarticle">Edit</button>
                                <button type="button" wire:click="$parent.delete({{ $article->id }})"
                                    wire:confirm ="Are you sure want to delete this article ? : {{ $article->title }}"
                                    class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deletearticle">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-5">
                        <label for="perPage" class="col-form-label">Per page : </label>
                    </div>
                    <div class="col-5">
                        <select wire:model.change="perPage" id="perPage" class="form-select"
                            aria-label="Default select example">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-auto">
                {{ $articles->links() }}
            </div>


        </div>

    </div>
</div>
