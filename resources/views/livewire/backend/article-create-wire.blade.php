@section('title', 'Articles - Create')

<div class="container-fluid px-4">
    <h1 class="mt-4">Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Articles</li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <form wire:submit="store">
        <div class="row">
            <div class="col-sm-7 mb-3">
                <label for="title" class="form-label">Title</label>
                <input wire:model.blur="title" type="text" class="form-control @error('title') is-invalid @enderror"
                    id="title" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-sm-auto mb-3">
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
            <label for="image" class="form-label">Image <small class="text-muted">(Max. 2 MB)</small></label>
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
            <button wire:click="cancel" type="button" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>

</div>
