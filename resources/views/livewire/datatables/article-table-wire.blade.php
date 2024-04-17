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

            <div class="col-sm-auto row ms-auto">
                <div class="col-auto">
                    <label for="usertype" class="col-form-label">User Type : </label>
                </div>
                <div class="col-auto">
                    <select wire:model.change="userType" id="usertype" class="form-select" aria-label="select">
                        <option value="">Select user type</option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>


        </div>
    </div>
    <div class="card-body overflow-x-scroll">
        <table class="table table-hover fs-8">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" wire:click="setSortBy('name')">Title <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('email')">Category <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('is_admin')">Status <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('created_at')">Published Data <i class="fas fa-sort"></i>
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
                                <small class="badge bg-danger">{{ $article->status }}</small>
                            @else
                                <small class="badge bg-success">{{ $article->status }}</small>
                            @endif
                        </td>
                        <td>{{ $article->created_at }}</td>
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

            </tbody>
        </table>

        <div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-5">
                        <label for="usertype" class="col-form-label">Per page : </label>
                    </div>
                    <div class="col-5">
                        <select wire:model.change="perPage" id="usertype" class="form-select"
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
