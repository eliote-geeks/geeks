<div class="col-lg-9 col-md-8 col-12">
    <!-- Card -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Delete your account</h3>
            <p class="mb-0">Delete or Close your account permanently.</p>
        </div>
        <!-- Card body -->
        <div class="card-body p-4">
            <span class="text-danger h4">Warning</span>
            <p>
                If you close your account, you will be unsubscribed from all
                your 0 courses, and will lose access forever.
            </p>
            <!-- Button trigger modal -->
            <button type="button" wire:loading.attr='disabled' class="btn btn-outline-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal-2">
                Close my Account
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Close my account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            if you close your account you lost all subscription courses!!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:click='deleted' type="button" class="btn btn-danger">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
