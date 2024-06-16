<div>
    <!-- Nested row for non-featured blog posts-->
    <div class="row" id="paginated-article">

        @foreach ($popularArticle as $article)
            <div :key="{{ $article->id }}" class="col-lg-6">
                <!-- Blog post-->
                <div wire:ignore.self class="card card-article mb-4">
                    <a href="{{ url('article/' . $article->slug) }}"><img
                            class="card-img-top article-list-img"
                            src="{{ asset('storage/backend/images/thumbnails/' . $article->img) }}"
                            alt="{{ $article->title }}" width="300" height="150" /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            <span class="text-primary-emphasis">{{ $article->user->name }}</span> <span
                                class="text-primary">~</span>
                            {{ $article->updated_at->format('M d, Y') }}

                            <h2 class="card-title h4"><a
                                    class="link-dark link-offset-2 link-underline-opacity-0"
                                    href="{{ url('article/' . $article->slug) }}">{{ $article->title }}</a></h2>
                            <p class="card-text mb-1">
                                {!! Str::limit(strip_tags($article->desc), 150, '...') !!}
                            </p>
                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <span class="badge bg-secondary-subtle text-body-secondary">
                                    {{ $article->category->name }}
                                </span>
                            </div>
                            <div>
                                <a class="unstyled-link"
                                    href="{{ url('article/' . $article->slug) }}">Read
                                    more
                                    →</a>
                            </div>
                        </div>
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

@push('scripts')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush
