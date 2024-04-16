{{-- NOTE --}}
{{-- Dispatch and event from :
1) Button with  <button wire:click="$dispatch('success-toast', { message: 'Article is created successfully.' })"
2) Livewire Dispatch  $this->dispatch('success-toast', message: 'Article is created successfully.');  --}}


{{-- Template for toast --}}
<div wire:ignore.self class="toast-container position-fixed top-0 start-0 p-3">
    <div id="toastNotif" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success">
            <i class="fa-regular fa-message text-white me-1"></i>
            <strong class="me-auto text-white">Alert Message</strong>

            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        {{-- Pass the toastMessage by getElementByID on Javascript --}}
        <div class="toast-body" id="toastMessage">

        </div>
    </div>
    {{-- the javascript --}}
    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('success-toast', (data) => {
                    //
                    console.log(data.message);
                    const toastLiveExample = document.getElementById('toastNotif')
                    console.log(toastLiveExample)
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)

                    document.getElementById('toastMessage').textContent = data.message
                    toastBootstrap.show()
                });
            });
        </script>
    @endpush
</div>
