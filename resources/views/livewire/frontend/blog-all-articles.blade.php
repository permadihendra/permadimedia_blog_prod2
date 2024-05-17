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
                class="badge bg-secondary">{{ \App\Models\Category::where('id', $category_id)->first()->name }}
            </a>
            <a href="" class="badge bg-warning">
                X
            </a>
        @endif


        @forelse ($articles as $article)
            <div>
                <!-- Blog post-->
                <div wire:ignore.self class="card card-article  mb-2" data-aos="fade-up">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">

                                <h2 class="card-title h4"><a wire:navigate
                                        class="link-dark link-offset-2 link-underline-opacity-0"
                                        href="{{ url('article/' . $article->slug) }}">{{ $article->title }}</a></h2>

                                <span class="small text-muted mb-1">
                                    {{ $article->updated_at->format('M d, Y') }}
                                    <span class="text-success"> {{ $article->category->name }} </span>
                                </span>

                                <p class="card-text">
                                    {{ Str::limit(strip_tags($article->desc), 150, '...') }}
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

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush
