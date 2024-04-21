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
                    <th scope="col" wire:click="setSortBy('name')">Name <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('email')">email <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('is_admin')">Role <i class="fas fa-sort"></i></th>
                    <th scope="col" wire:click="setSortBy('created_at')">Created <i class="fas fa-sort"></i></th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr :key={{ $user->id }}>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->is_admin)
                                <small class="badge bg-success">Admin</small>
                            @else
                                <small class="badge bg-secondary">User</small>
                            @endif
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <div class="row">
                                <button wire:click="$parent.delete({{ $user->id }})"
                                    wire:confirm="Are you sure want to delete user ID :{{ $user->id }}, {{ $user->name }} ?"
                                    class="btn btn-danger"> X </button>
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
                {{ $users->links() }}
            </div>


        </div>

    </div>
</div>
