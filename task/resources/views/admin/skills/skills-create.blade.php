<x-create-modal title="Add New Skill">
    <div class="col md-6 mb-3">
        <label for="nameWithTitle" class="form-label">Skill</label>
        <input wire:model.live="skill.name" type="text" class="form-control" placeholder="Enter Skill" />
        @include('admin.error', ['properities' => 'skill.name'])

    </div>

    <div class="col md-6 mb-3">
        <label for="nameWithTitle" class="form-label">Progress</label>
        <input wire:model.live="skill.progress" type="number" min="1" max="100" class="form-control"
            placeholder="Enter Progress" />
        @include('admin.error', ['properities' => 'skill.progress'])
    </div>
</x-create-modal>
