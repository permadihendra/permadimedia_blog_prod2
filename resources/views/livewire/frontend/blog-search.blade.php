<!-- Search widget-->
<div class="card mb-4">
    <div class="card-header">Article Search</div>
    <div class="card-body">
        <div class="input-group">
            <input wire:model.blur="keyword" class="form-control" type="text" placeholder="Enter keyword ..."
                aria-label="Enter keyword ..." aria-describedby="button-search" />
            <button wire:click="search" class="btn btn-primary" id="button-search" type="button">
                Search
            </button>
        </div>
    </div>
</div>
