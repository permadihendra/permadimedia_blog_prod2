<div class="container-fluid px-4">
    <h1 class="mt-4">Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List of articles</li>
    </ol>


    {{-- Toast Notification

    dispatch event from livewire blade, if the session 'success' is true <- this from the livewire class component --}}
    @if (session('success'))
        @script
            <script>
                $wire.dispatch('success-toast', {
                    message: '{{ session('success') }}'
                });
            </script>
        @endscript
    @endif

    <livewire:toast-notif />

    {{-- Button to send the dispatch data --}}
    <button wire:click="$dispatch('showToast', { message: 'Article is created successfully.' })" type="button"
        class="btn btn-primary" id="liveToastBtn">Show live toast</button>

    {{-- Template for toast --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <i class="fa-regular fa-message text-white me-1"></i>
                <strong class="me-auto text-white">Alert Message</strong>

                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            {{-- Pass the toastMessage by getElementByID on Javascript --}}
            <div class="toast-body" id="toastMessage">

            </div>
        </div>
    </div>


    {{-- use offcanvas balde component and insert livewire component inside it --}}
    <x-offcanvas>
        <x-slot name="title">
            Create Article
        </x-slot>

        {{-- insert form into slot --}}
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input wire:model="title" type="title" class="form-control" id="title"
                    class="@error('title') is-invalid @enderror" />
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Title</label>
                <select wire:model="category_id" name="category_id" id="category" class="form-control"
                    class="@error('category_id') is-invalid @enderror">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea wire:model="desc" class="form-control" id="description" rows="5"
                    class="@error('desc') is-invalid @enderror"></textarea>
                @error('desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input wire:model="img" type="file" class="form-control" id="image"
                    class="@error('img') is-invalid @enderror">
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date</label>
                <input wire:model="publish_date" type="publish_date" class="form-control" id="publish_date"
                    class="@error('publish_date') is-invalid @enderror">
                @error('publish_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end mt-4">
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button wire:click="store" type="button" class="btn btn-success">Save</button>
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



@push('scripts')
    {{-- <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('showToast', (data) => {
                //
                console.log(data);
                const toastLiveExample = document.getElementById('liveToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)

                document.getElementById('toastMessage').textContent = data.message
                toastBootstrap.show()
            });
        });
    </script> --}}
@endpush
