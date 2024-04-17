{{-- Dynamic title for livewire full page --}}

@section('title', 'Articles - Admin')

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

    {{-- Toast notification - livewire component  --}}
    <livewire:toast-notif />


    {{-- use offcanvas balde component and insert livewire component inside it --}}
    <x-offcanvas>
        <x-slot name="title">
            Create Article
        </x-slot>

        <x-slot name="color">
            success
        </x-slot>

        {{-- insert form into slot --}}
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input wire:model.blur="title" type="text" class="form-control @error('title') is-invalid @enderror"
                    id="title" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select wire:model.blur="category_id" name="category_id" id="category"
                    class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option :key={{ $category->id }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea wire:model.blur="desc" class="form-control @error('desc') is-invalid @enderror" id="description"
                    rows="5"></textarea>
                @error('desc')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input wire:model.blur="img" type="file" class="form-control @error('img') is-invalid @enderror"
                    id="image">
                @error('img')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="publish_date" class="form-label">Publish Date</label>
                <input wire:model.blur="publish_date" type="publish_date"
                    class="form-control @error('publish_date') is-invalid @enderror" id="publish_date" class="">
                @error('publish_date')
                    <span class="text-danger">{{ $message }}</span>
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
            <table wire:ignore.self id="datatablesSimple">
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
