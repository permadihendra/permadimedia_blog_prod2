@section('title', 'permadimedia - Articles')

<div>
    <!-- Nested row for non-featured blog posts-->

    <div id="paginated-article">
        @if ($keyword)
            <div class="row">
                <div class="col">
                    <p class="text-muted">Showing results of keyword : {{ $keyword }}</p>
                </div>
            </div>
        @endif
        @if ($category_id)
            <span>category </span>
            <a href=""
                class="badge bg-secondary unstyled-link">{{ \App\Models\Category::where('id', $category_id)->first()->name }}
            </a>
            <a href="" class="badge bg-danger unstyled-link">
                X
            </a>
        @endif


        @forelse ($articles as $article)
            <div>
                <!-- Blog post-->
                <div wire:ignore.self class="card card-article mb-2" data-aos="fade-up">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">

                                <h2 class="card-title h4"><a
                                        class="link-dark link-offset-2 link-underline-opacity-0"
                                        href="{{ url('article/' . $article->slug) }}">{{ $article->title }}</a></h2>

                                <span class="small text-muted mb-1">
                                    <span class="text-primary-emphasis">{{ $article->user->name }} </span> <span
                                        class="text-primary">~</span>
                                    {{ $article->updated_at->format('M d, Y') }}
                                </span>

                                <p class="card-text mb-1">
                                    {!! Str::limit(strip_tags($article->desc), 150, '...') !!}
                                </p>
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
                            <div class="col-lg-3">
                                <a href="{{ url('article/' . $article->slug) }}"><img
                                        class="card-img-top article-list-img"
                                        src="{{ asset('storage/backend/images/thumbnails/' . $article->img) }}"
                                        alt="{{ $article->title }}" width="300" height="150" /></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @empty
            <div>
                <div class="card card-article  mb-2">
                    <p>No Article Found</p>
                </div>
            </div>
        @endforelse

    </div>
    <!-- Pagination-->
    <nav aria-label="Pagination">
        <div class="pagination col-sm-auto justify-content-center my-4">
            {{ $articles->onEachSide(2)->links(data: ['scrollTo' => '#paginated-article']) }}
        </div>
    </nav>
</div>
