<div>
    <!-- Nested row for non-featured blog posts-->
    <div class="row" id="paginated-article">

        @foreach ($popularArticle as $article)
            <div class="col-lg-6">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a wire:navigate href="{{ url('article/' . $article->slug) }}"><img
                            class="card-img-top article-list-img" src="{{ asset('storage/' . $article->img) }}"
                            alt="{{ $article->title }}" width="300" height="150" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ $article->updated_at->format('M d, Y') }}
                            <a wire:navigate
                                href="{{ url('article/' . $article->category->slug) }}">{{ $article->category->name }}</a>
                        </div>
                        <h2 class="card-title h4"><a wire:navigate
                                class="link-dark link-offset-2 link-underline-opacity-0"
                                href="{{ url('article/' . $article->slug) }}">{{ $article->title }}</a></h2>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($article->desc), 150, '...') }}
                        </p>
                        <a wire:navigate class="btn btn-primary" href="{{ url('article/' . $article->slug) }}">Read more
                            →</a>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
    <!-- Pagination-->
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <div class="pagination col-sm-auto justify-content-center my-4">
            {{ $popularArticle->onEachSide(2)->links(data: ['scrollTo' => '#paginated-article']) }}
        </div>
    </nav>
</div>
