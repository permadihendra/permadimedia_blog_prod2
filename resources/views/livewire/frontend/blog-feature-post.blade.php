<!-- Featured blog post-->
<div class="card mb-4">
    <a href=""><img class="card-img-top" src="{{ asset('../../storage/' . $latestArticle->img) }}"
            alt="..." /></a>
    <div class="card-body">
        <div class="small text-muted">{{ $latestArticle->updated_at->format('M d, Y') }}</div>
        <h2 class="card-title">{{ $latestArticle->title }}</h2>
        <p class="card-text">
            {{ Str::limit(strip_tags($latestArticle->desc), 250, '...') }}
        </p>
        <a class="btn btn-primary" href="#!">Read more →</a>
    </div>
</div>
