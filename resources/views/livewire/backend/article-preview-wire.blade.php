@section('title', 'Articles - Preview')

<div class="container-fluid px-4">
    <h1 class="mt-4">Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Articles</li>
        <li class="breadcrumb-item active">Preview</li>
    </ol>

    <div class="col-sm-8">
        <div class="d-flex justify-content-end mb-2">
            <a wire:navigate href="{{ route('articles') }}" class="btn btn-success">Back</a>
        </div>
        <div class="card mb-4">
            <a href=""><img class="card-img-top article-display-img"
                    src="{{ asset('storage/backend/images/' . $article->img) }}" alt="{{ $article->title }}" /></a>
            <div class="card-body">
                <span class="small text-muted mb">
                    <span class="text-primary-emphasis">{{ $article->user->name }} </span> <span
                        class="text-primary">~</span>
                    {{ $article->updated_at->format('M d, Y') }}
                    <span class="badge bg-secondary-subtle text-primary-emphasis">
                        {{ $article->category->name }}
                    </span>
                </span>
                <h2 class="card-title mt-3"><a class="link-dark link-offset-2 link-underline-opacity-0"
                        href="">{{ $article->title }}</a></h2>
                <p class="card-text">
                    {!! $article->desc !!}
                </p>

            </div>
        </div>

    </div>

</div>

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script>
@endpush

@script
    <script>
        hljs.highlightAll();
    </script>
@endscript
