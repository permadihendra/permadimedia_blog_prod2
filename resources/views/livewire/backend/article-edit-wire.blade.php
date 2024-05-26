@section('title', 'Articles - Edit')

<div class="container-fluid px-4">
    <h1 class="mt-4">Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Articles</li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <form>
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
            <textarea wire:model.blur="form.desc" name="desc" class="form-control @error('form.desc') is-invalid @enderror"
                id="description" rows="5"></textarea>
            @error('form.desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="description" class="form-label" id="description-label">Description</label>
            <div wire:ignore>
                <textarea name="content" class="form-control @error('form.desc') is-invalid @enderror" id="summernote-editor"
                    rows="5">{{ $form->desc }}</textarea>
                <input type="hidden" wire:model.blur="form.desc">
            </div>

            @error('form.desc')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            @if ($form->img_saved)
                <label for="image" class="form-label" id="image_label">Change New Image <small
                        class="text-muted">(Max. 2
                        MB)</small></label>
            @else
                <label for="image" class="form-label" id="image_label">Upload Image <small class="text-muted">(Max. 2
                        MB)</small></label>
            @endif
            <input wire:model.blur="form.img" name="img" type="file"
                class="form-control @error('form.img') is-invalid @enderror" id="image">
            @if ($form->img_saved)
                <div class="card mb-3 mt-3" style="max-width: 440px">
                    <div class="row gap-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/backend/images/thumbnails/' . $form->img_saved) }}"
                                class="mt-2 p-1" width="100px" height="100px" alt="" srcset="" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6>Last saved image :</h6>
                                <small class="text-primary"> Last saved image : {{ $form->img_saved }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
            <button wire:click="update" wire:confirm="Are you sure want to save this change ?" type="button"
                id="button_submit" class="btn btn-success">Update</button>
        </div>
    </form>

    @assets
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="//cdn.bootcss.com/markdown-it/8.3.1/markdown-it.min.js"></script>


        <link href="/css/summernote-lite.css" rel="stylesheet">
        <script src="/js/summernote-lite.js"></script>
        <script src="/js/summernote-ext-highlight.min.js"></script>
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
                        ['insert', ['link', 'popovers', ['lfm'], 'popovers', ['highlight']]],
                        ['view', ['fullscreen', 'codeview', 'help']],

                    ],
                    buttons: {
                        lfm: LFMButton
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('form.desc', contents);
                        }
                    },

                })

            });
        </script>
    @endscript

</div>
