@section('title', 'permadimedia -' . $article->title)
<!-- blog article-->
<div class="card mb-4">
    <a href="{{ url('article/' . $article->slug) }}"><img class="card-img-top article-display-img"
            src="{{ asset('../../storage/' . $article->img) }}" alt="{{ $article->title }}" /></a>
    <div class="card-body">
        <div class="small text-muted">{{ $article->updated_at->format('M d, Y') }}</div>
        <h2 class="card-title"><a class="link-dark link-offset-2 link-underline-opacity-0"
                href="{{ url('article/' . $article->slug) }}">{{ $article->title }}</a></h2>
        <p class="card-text">
            {!! $article->desc !!}
        </p>

    </div>
</div>

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
@endpush

@push('scripts')
    <script>
        hljs.highlightAll();
    </script>
@endpush
