@section('title', 'Users - Admin')

<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List of users</li>
    </ol>

    {{-- User Datatables livewire component --}}
    <livewire:datatables.user-table-wire />

</div>
