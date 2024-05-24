{{-- Side Widget --}}
<div>
    <div class="card mb-4">
        <div class="card-header">Popular Articles</div>
        <div class="card-body h-2">
            @forelse ($popular_articles as $article)
                <div>
                    <!-- Blog post-->
                    <div wire:ignore.self class="mb-2" data-aos="fade-up">
                        <div class="row">
                            <div class="col-lg">

                                <h2 class="card-title h6"><a wire:navigate
                                        class="link-dark link-offset-2 link-underline-opacity-0"
                                        href="{{ url('article/' . $article->slug) }}">{{ $article->title }}</a></h2>

                                <span class="small text-muted mb-1">
                                    {{ $article->updated_at->format('M d, Y') }}
                                    <span class="text-success"> {{ $article->category->name }} </span>
                                </span>


                            </div>
                            {{-- <div class="col-lg-3">
                                <img class="img-fluid float-end" src="{{ asset('storage/' . $article->img) }}"
                                    alt="{{ $article->title }}" width="100" height="75" />
                            </div> --}}
                        </div>
                        <hr>
                    </div>

                </div>
            @empty
                <p>No Related Article</p>
            @endforelse
        </div>

    </div>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="">
                <a href="{{ $configs['ads_widget'] }}" target="_blank">
                    <img src="{{ $configs['ads_widget'] }}" class="img-fluid rounded-start"
                        alt="{{ $configs['ads_widget'] }}" />
                </a>
            </div>
        </div>
    </div>
</div>
