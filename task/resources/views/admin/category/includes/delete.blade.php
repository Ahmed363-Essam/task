<div class="modal fade" id="modalToggle{{ $cat_id }}" aria-labelledby="modalToggleLabel" tabindex="-1"
    style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Delete Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are You Sure You Want To Delete This Category</div>
            <div class="modal-footer">
                <form action="{{ route('category.destroy') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $cat_id }} " name="id">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                        Delete
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
