@section('title', 'Dashboard - Admin')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Admin</li>
    </ol>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Articles</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white stretched-link" href="{{ route('articles') }}"
                        wire:navigate>{{ $total_articles }}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Categories</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="text-white stretched-link" href="{{ route('categories') }}"
                        wire:navigate>{{ $total_categories }}</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 overflow-auto">
            <h4>Latest Article</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($latest_articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->category->name }}</td>
                                <td>
                                    @if ($article->status == 1)
                                        <span class="badge bg-success text-white">Published</span>
                                    @else
                                        <span class="badge bg-danger text-white">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $article->updated_at }}</td>
                                <td>
                                    <a href="{{ url('articles/edit/' . $article->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Details</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
        </div>

        <div class="col-lg-6 overflow-auto">
            <h4>Popular Article</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Last Update</th>
                            <th>Views</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($popular_articles as $popular)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $popular->title }}</td>
                                <td>{{ $popular->category->name }}</td>
                                <td>
                                    @if ($popular->status == 1)
                                        <span class="badge bg-success text-white">Published</span>
                                    @else
                                        <span class="badge bg-danger text-white">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $popular->updated_at }}</td>
                                <td>{{ $popular->views }}</td>
                                <td>
                                    <a href="{{ url('articles/edit/' . $popular->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Details</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
        </div>
    </div>
</div>
