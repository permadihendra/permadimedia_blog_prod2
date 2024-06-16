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
                <label for="title" class="form-label" id="title-label">Title</label>
                <input wire:model.blur="form.title" name="title" type="text"
                    class="form-control @error('form.title') is-invalid @enderror" id="title" />
                @error('form.title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-sm-auto mb-3">
                <label for="category" class="form-label" id="category-label">Category</label>
                <select wire:model.blur="form.category_id" name="category_id" id="category"
                    class="form-control @error('form.category_id') is-invalid @enderror">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option :key={{ $category->id }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('form.category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- <div class="mb-3">
            <label for="description" class="form-label" id="description-label">Description</label>
            <div wire:ignore>
                <textarea wire:model="desc" name="desc" class="form-control @error('desc') is-invalid @enderror" id="myEditor"
                    rows="5"></textarea>
            </div>

            @error('desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="description" class="form-label" id="description-label">Description</label>
            <div wire:ignore>
                <textarea id="editor" wire:model.blur="form.desc" name="content"
                    class="form-control @error('form.desc') is-invalid @enderror" style="display: none" rows="5"></textarea>
                <div id="ckeditorContainer">{!! $form->desc !!}</div> {{-- Editor Container --}}
            </div>

            @error('form.desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- markup -->



        <div class="mb-3">
            <label for="image" class="form-label" id="image_label">Image <small class="text-muted">(Max. 2
                    MB)</small></label>
            <input wire:model.blur="form.img" name="img" type="file"
                class="form-control @error('form.img') is-invalid @enderror" id="image">
            @error('form.img')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-3">
            <label for="publish_date" class="form-label" id="publishdate_label">Publish Date</label>
            <input wire:model.blur="form.publish_date" name="publish_date" type="date"
                class="form-control @error('form.publish_date') is-invalid @enderror" id="publish_date" class="">
            @error('form.publish_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-end mt-4">
            <button wire:click="cancel" id="button_cancel" type="button" class="btn btn-secondary">Cancel</button>
            <button type="submit" id="button_submit" class="btn btn-success">Save</button>
        </div>
    </form>


    @assets
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>

        <script src="{{ asset('js/ckeditor4/ckeditor.js') }}"></script>
        <script src="{{ asset('js/ckeditor4/adapters/jquery.js') }}"></script>
        <script src="{{ asset('js/ckeditor4/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>

        <link rel="stylesheet"
            href="{{ asset('js/ckeditor4/plugins/codesnippet/lib/highlight/styles/atom-one-dark.min.css') }}">
    @endassets

    @script
        <script>
            CKEDITOR.replace('ckeditorContainer', {
                filebrowserBrowseUrl: '/filemanager?type=Files',
                filebrowserUploadUrl: '/filemanager/upload?type=Files&_token=' + $('meta[name="scrf-token"]').attr(
                    'content'),
                extraPlugins: 'codesnippet',
                codeSnippet_theme: 'atom-one-dark.min',
                on: {
                    // This event is fired every time the editor data is changed
                    change: function(evt) {
                        // Get the data from the editor and display it in the '$wire.form.desc'
                        var data = evt.editor.getData();
                        $wire.form.desc = data;
                    }
                },
            });
        </script>

        <script>
            hljs.initHighlightingOnLoad();
        </script>
    @endscript

</div>
