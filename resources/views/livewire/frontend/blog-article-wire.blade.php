@section('title', 'permadimedia -' . $article->title)
<!-- blog article-->
<div>
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
    <div class="card mb-4">
        <div class="card-header">Related Articles</div>
        <div class="card-body">
            @forelse ($related_articles as $article)
                <div>
                    <!-- Blog post-->
                    <div wire:ignore.self class="card card-article mb-2" data-aos="fade-up">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">

                                    <h2 class="card-title h5"><a wire:navigate
                                            class="link-dark link-offset-2 link-underline-opacity-0"
                                            href="{{ url('article/' . $article->slug) }}">{{ $article->title }}</a></h2>

                                    <span class="small text-muted mb-1">
                                        {{ $article->updated_at->format('M d, Y') }}
                                        <span class="text-success"> {{ $article->category->name }} </span>
                                    </span>

                                    <p class="card-text">
                                        {{ Str::limit(strip_tags($article->desc), 100, '...') }}
                                    </p>
                                    <a wire:navigate class="unstyled-link"
                                        href="{{ url('article/' . $article->slug) }}">Read
                                        more
                                        →</a>
                                </div>
                                <div class="col-lg-3">
                                    <a wire:navigate href="{{ url('article/' . $article->slug) }}"><img
                                            class="card-img-top article-list-img"
                                            src="{{ asset('storage/' . $article->img) }}" alt="{{ $article->title }}"
                                            width="300" height="150" /></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <p>No Related Article</p>
            @endforelse
        </div>
    </div>
</div>

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/default.min.css">
@endpush

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
@endpush
