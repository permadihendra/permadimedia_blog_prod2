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
                <input wire:model.blur="title" name="title" type="text"
                    class="form-control @error('title') is-invalid @enderror" id="title" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-sm-auto mb-3">
                <label for="category" class="form-label" id="category-label">Category</label>
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
                <textarea name="content" class="form-control @error('desc') is-invalid @enderror" id="summernote-editor" rows="5"></textarea>
            </div>
            <input type="hidden" wire:model.blur="desc">
            @error('desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- markup -->



        <div class="mb-3">
            <label for="image" class="form-label" id="image_label">Image <small class="text-muted">(Max. 2
                    MB)</small></label>
            <input wire:model.blur="img" name="img" type="file"
                class="form-control @error('img') is-invalid @enderror" id="image">
            @error('img')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3 col-3">
            <label for="publish_date" class="form-label" id="publishdate_label">Publish Date</label>
            <input wire:model.blur="publish_date" name="publish_date" type="date"
                class="form-control @error('publish_date') is-invalid @enderror" id="publish_date" class="">
            @error('publish_date')
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


        <link href="/css/summernote-lite.css" rel="stylesheet">
        <script src="/js/summernote-lite.js"></script>
    @endassets

    @script
        <script>
            $(document).ready(function() {

                // Define function to open filemanager window
                var lfm = function(options, cb) {
                    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
                        'width=900,height=600');
                    window.SetUrl = cb;
                };

                // Define LFM summernote button
                var LFMButton = function(context) {
                    var ui = $.summernote.ui;
                    var button = ui.button({
                        contents: '<i class="note-icon-picture"></i> ',
                        tooltip: 'Insert image with filemanager',
                        click: function() {

                            lfm({
                                type: 'image',
                                prefix: '/laravel-filemanager'
                            }, function(lfmItems, path) {
                                lfmItems.forEach(function(lfmItem) {
                                    context.invoke('insertImage', lfmItem.url);
                                });
                            });

                        }
                    });
                    return button.render();
                };

                // Initialize summernote with LFM button in the popover button group
                // Please note that you can add this button to any other button group you'd like
                $('#summernote-editor').summernote({
                    height: 400,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        // ['insert', ['link', 'picture', 'video']],
                        ['insert', ['popovers', ['lfm']]],
                        ['view', ['fullscreen', 'codeview', 'help']],

                    ],
                    buttons: {
                        lfm: LFMButton
                    },

                    callbacks: {
                        // onInit: function() {
                        //     $('pre code').each(function(i, block) {
                        //         hljs.highlightBlock(block);
                        //     });
                        // },
                        onChange: function(contents, $editable) {
                            @this.set('desc', contents);
                            // $('pre code').each(function(i, block) {
                            //     hljs.highlightBlock(block);
                            // });
                        }
                    }
                })
            });
        </script>
    @endscript

</div>


@push('css')
@endpush

@push('scripts')
@endpush
