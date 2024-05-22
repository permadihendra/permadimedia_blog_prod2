<!-- Categories widget-->
<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    @foreach ($categories as $category)
                        <span><a wire:click="filterByCategory('{{ $category->id }}')"
                                class="btn btn-sm badge badge-custom bg-secondary">{{ $category->name }}
                                <span class="text-warning">({{ $category->article_count }})</span> </a>
                        </span>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
