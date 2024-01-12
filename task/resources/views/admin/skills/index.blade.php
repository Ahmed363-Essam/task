@extends('admin.master')

@section('skills-active', 'active')
@section('title', 'Skills')

@section('content')

    <div class="removeskill container-xxl flex-grow-1 container-p-y">
        @if (session()->has('deleteSkill'))
            <div class="alert alert-danger my-danger-alert">
                {{ session('deleteSkill') }}
            </div>
        @endif

        <div>
            <h4 style="display: inline-block" class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Skills</h4>
            <button style="margin-left: 15px" type="button" class="btn btn-sm btn-primary ml-10" data-bs-toggle="modal"
                data-bs-target="#modalCenter">
                Add Skills
            </button>
        </div>

        <div class="card mb-4">
            <div class="card-body ">
                <!-- Basic Bootstrap Table -->
                @livewire('admin.skills.skills-data')
                @livewire('admin.skills.skills-create')



                <!--/ Basic Bootstrap Table -->
            </div>

        </div>

    </div>
    @livewire('admin.skills.skills-show')
    @livewire('admin.skills.skills-delete')




@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('morph.updated', (el, component) => {
                setTimeout(() => {
                    $('.my-danger-alert').slideUp();
                }, 2000);
            });

        });

        // create component
        window.addEventListener('createModelToggle', event => {
            $('#modalCenter').modal('toggle');
        });

        // show component
        window.addEventListener('showModelToggle', event => {
            $('#modalshow').modal('toggle');
        });

        // delete module component
        window.addEventListener('deleteModelToggle', event => {
            $('#modalDelete').modal('toggle');
        });
    </script>

@endsection
