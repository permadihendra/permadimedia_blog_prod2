<div class="card mb-4">
    <form wire:submit='search'>
        <div class="input-group">
            <input wire:model.blur="keyword" class="form-control" type="text" placeholder="Search Articles ..."
                aria-label="Enter keyword ..." aria-describedby="button-search" />
            <button x-on:click="document.getElementById('paginated-article').scrollIntoView({ behavior: 'smooth'})"
                class="btn btn-primary" id="button-search" type="submit">
                Search
            </button>
        </div>
    </form>
</div>
