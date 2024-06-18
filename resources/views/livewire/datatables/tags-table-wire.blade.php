<div>
    <div class="card mb-4">

        <div class="card-header bg-body-light">
            <div class="row">
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                        <input wire:model.live.debounce.300ms="search" id="serach_filter" type="text"
                            class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="basic-addon1">
                    </div>
                </div>

            </div>
        </div>

        <div class="card-body overflow-x-scroll">
            <table class="table table-hover fs-8">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" wire:click="setSortBy('name')">Tags Name <i class="fas fa-sort"></th>
                        <th scope="col" wire:click="setSortBy('created_at')">Created at <i class="fas fa-sort"></th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr :key={{ $tag->id }}>
                            <td>{{ ($tags->currentPage() - 1) * $tags->perPage() + $loop->iteration }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->created_at }}</td>
                            <td>
                                <div>
                                    <button wire:click="$parent.edit({{ $tag->id }})"
                                        class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editTag">Edit</button>
                                    <button type="button" wire:click="$parent.delete({{ $tag->id }})"
                                        wire:confirm ="Are you sure want to delete this Tag ? : {{ $tag->name }}"
                                        class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteTag">Delete</button>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td>No Data Found</td>
                        </tr>
                    @endforelse
        </div>


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
                {{ $tags->links() }}
            </div>


        </div>
    </div>
</div>
