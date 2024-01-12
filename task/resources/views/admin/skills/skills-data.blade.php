<div>

    <div class="row mb-4">

        <div class="col-lg-6" style="display: flex">
            <input wire:model.live='search' style="width: 45%; " class="form-control " placeholder="Search" type="text"
                name="" id="">
            <!-- Button trigger modal -->
            {{-- <button
          style="margin-left: 15px"
          type="button"
          class="btn btn-primary ml-10"
          data-bs-toggle="modal"
          data-bs-target="#modalCenter"
        >
          Add Skills
        </button> --}}
        </div>

    </div>


    <div class="table-responsive text-nowrap">

        @if (count($skills) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 45%">Name</th>
                        <th style="width: 45%">Progress</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($skills as $skill)
                        <tr>
                            <td><strong>
                                    {{ $skill->name }}</strong></td>
                            <td>{{ $skill->progress }}</td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a wire:click.prevent="$dispatch('deleteSkill',{id:{{ $skill->id }}})"
                                            class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>

                                        <a wire:click.prevent="$dispatch('skillShow',{id:{{ $skill->id }}})"
                                            class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-show me-1"></i>
                                            Show</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div>
                            <p class="text-danger"> The Skills Table Is Empty </p>
                        </div>
                    @endforelse

                </tbody>

            </table>
        @else
            <div>
                <p class="text-danger"> The Skills Table Is Emplty </p>
            </div>
        @endif

        {{ $skills->links() }}
    </div>


</div>
