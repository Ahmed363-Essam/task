<x-show-modal title="Skills">
    <div class="col-md-6">
        <label class="form-label">Skill Name</label>
        <input type="text" readonly class="form-control" placeholder="Name"  wire:model='name' />

    </div>
    <div class="col-md-6">
        <label class="form-label">Skill Progress</label>
        <input type="number" readonly class="form-control" placeholder="Email" wire:model.live='progress' />

    </div>
</x-show-modal>
