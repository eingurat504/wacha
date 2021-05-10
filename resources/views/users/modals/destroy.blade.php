<div class="modal fade" id="destroy-user-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form id="destroy_user" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p class="mb-0">You're about to permanently delete '<span id="name"></span>' from storage.</p>
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-light btn-sm" data-dismiss="modal">
                            <i class="mdi mdi-times"></i>&nbsp;Cancel
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="mdi mdi-delete"></i>&nbsp;Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
