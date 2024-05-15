<!-- Categories widget-->
<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    @foreach ($categories as $category)
                        <span><a href="" class=" badge bg-secondary">{{ $category->name }}</a></span>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
