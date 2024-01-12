@extends('admin.master')

@section('Categoies-active', 'active')
@section('title', 'Categoies')

@section('content')




    <div class="removecategory container-xxl flex-grow-1 container-p-y">
        @if (session()->has('deletecategory'))
            <div class="alert alert-danger my-danger-alert">
                {{ session('deletecategory') }}
            </div>
        @endif

        <div>
            <h4 style="display: inline-block" class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Categoies
            </h4>
            <a style="margin-left: 15px" href="{{ route('category.create') }}" class="btn btn-sm btn-primary ml-10">
                Add Categoies
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-body ">
                <div>

                    <div class="row mb-4">

                        <div class="col-lg-6" style="display: flex">

                            <!-- Button trigger modal -->
                            {{-- <button
                          style="margin-left: 15px"
                          type="button"
                          class="btn btn-primary ml-10"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                          Add Categoies
                        </button> --}}
                        </div>

                    </div>


                    <div class="table-responsive text-nowrap">

                        @if (count($Categoies) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">Id</th>
                                        <th style="width: 10%">Name</th>
                                        <th style="width: 30%">DESCRIPTION</th>
                                    
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                    @forelse ($Categoies as $category)
                                        <tr>
                                            <td> {{ $category->id }} </td>
                                            <td><strong>
                                                    {{ $category->name }}</strong></td>
                                            <td>{{ $category->description }}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('category.edit', $category->id) }}"
                                                            class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-edit-alt me-1"></i>
                                                            Edit</a>
                                                        <a href="#" class="btn " data-bs-toggle="modal"
                                                            data-bs-target="#modalToggle{{ $category->id }}"> <i
                                                                class="bx bx-trash me-1"></i>
                                                            Delete</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- <x-delete-modal-component  :cat_id="$category->id"> Are You Sure You Want To delete This Category?</x-delete-modal-component> --}}

                                        @include('admin.category.includes.delete', [
                                            'cat_id' => $category->id,
                                        ])
                                    @empty

                                        <div>
                                            <p class="text-danger"> The Categoies Table Is Empty </p>
                                        </div>
                                    @endforelse

                                </tbody>

                            </table>
                        @else
                            <div>
                                <p class="text-danger"> The Categoies Table Is Emplty </p>
                            </div>
                        @endif
                        <br>
                        <br>

                        {{ $Categoies->links() }}
                    </div>


                </div>

            </div>

        </div>

    </div>





@endsection

@section('scripts')


@endsection
