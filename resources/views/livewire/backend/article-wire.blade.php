{{-- Dynamic title for livewire full page --}}

@section('title', 'Articles - Admin')

<div class="container-fluid px-4">
    <h1 class="mt-4">Articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List of articles</li>
    </ol>


    {{-- Toast Notification

    dispatch event from livewire blade, if the session 'success' is true <- this from the livewire class component --}}
    @if (session('success'))
        @script
            <script>
                $wire.dispatch('success-toast', {
                    message: '{{ session('success') }}'
                });
            </script>
        @endscript
    @endif

    {{-- Toast notification - livewire component  --}}
    <livewire:toast-notif />


    <input wire:click="create" type="button" value="Create Article" class="btn btn-primary">

    <div class="mb-2"></div>



    {{-- Datatables Article Livewire --}}
    <livewire:datatables.article-table-wire />


</div>



@push('scripts')
    {{-- <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('showToast', (data) => {
                //
                console.log(data);
                const toastLiveExample = document.getElementById('liveToast')
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)

                document.getElementById('toastMessage').textContent = data.message
                toastBootstrap.show()
            });
        });
    </script> --}}
@endpush
