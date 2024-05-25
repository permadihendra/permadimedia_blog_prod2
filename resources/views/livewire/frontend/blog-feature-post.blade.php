<!-- Featured blog post-->
<div class="card card-article mb-4">
    <a wire:navigate href="{{ url('article/' . $latestArticle->slug) }}"><img class="card-img-top featured-img"
            src="{{ asset('storage/backend/images/thumbnails/' . $latestArticle->img) }}" alt="..." /></a>
    <div class="card-body">
        <div class="small text-muted">
            {{ $latestArticle->user->name }} <span class="text-primary">~</span>
            {{ $latestArticle->updated_at->format('M d, Y') }}
        </div>
        <h2 class="card-title"><a wire:navigate class="link-dark link-offset-2 link-underline-opacity-0"
                href="{{ url('article/' . $latestArticle->slug) }}">{{ $latestArticle->title }}</a></h2>
        <p class="card-text">
            {{ Str::limit(strip_tags($latestArticle->desc), 250, '...') }}
        </p>
        <a wire:navigate class="btn btn-outline-primary" href="{{ route('blog-article', $latestArticle->slug) }}">Read
            more
            →</a>
    </div>
</div>
