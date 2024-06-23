				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Social Profiles</h3>
							<p class="mb-0">
								Add your social profile links in below social accounts.
							</p>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<div class="row mb-5">
									<!-- Twitter -->
								<div class="col-lg-3 col-md-4 col-12">
									<h5>Twitter</h5>
								</div>
								<div class="col-lg-9 col-md-8 col-12">
									<input wire:model.defer='twitter' type="text" class="form-control mb-1"  placeholder="Twitter Profile Name" />
									<small class="text-muted">Add your Twitter username (e.g. bpaul).</small>
								</div>
							</div>
								<!-- Facebook -->
							<div class="row mb-5">
								<div class="col-lg-3 col-md-4 col-12">
									<h5>Facebook</h5>
								</div>
								<div class="col-lg-9 col-md-8 col-12">
									<input type="text" wire:model.defer='facebook' class="form-control mb-1" placeholder="Facebook Profile Name" />
									<small class="text-muted">Add your Facebook username (e.g. johnsmith).</small>
								</div>
							</div>
								<!-- Instagram -->
							<div class="row mb-5">
								<div class="col-lg-3 col-md-4 col-12">
									<h5>Instagram</h5>
								</div>
								<div class="col-lg-9 col-md-8 col-12">
									<input type="text" class="form-control mb-1" wire:model.defer='instagram' placeholder="Instagram Profile Name" />
									<small class="text-muted">Add your Instagram username (e.g. johnsmith).</small>
								</div>
							</div>
								<!-- Linked in -->
							<div class="row mb-5">
								<div class="col-lg-3 col-md-4 col-12">
									<h5>Google email</h5>
								</div>
								<div class="col-lg-9 col-md-8 col-12">
									<input type="text"  class="form-control mb-1" placeholder="Google Email " wire:model.defer='google'  />
									<small class="text-muted">Add your google address. (
										pauleliote97@yahoo.com)</small>
								</div>
							</div>
								<!-- Youtube -->
							<div class="row mb-3">
								<div class="col-lg-3 col-md-4 col-12">
									<h5>YouTube</h5>
								</div>
								<div class="col-lg-9 col-md-8 col-12">
									<input type="text" class="form-control mb-1" placeholder="YouTube URL"  wire:model.defer='youtube'/>
									<small class="text-muted">Add your Youtube profile URL.
									</small>
								</div>
							</div>
								<!-- Button -->
							<div class="row">
								<div class="offset-lg-3 col-lg-6 col-12">
									<a href="javascript:void" wire:click='save' wire:loading.attr='hidden' class="btn btn-primary">Save Social Profile</a>
																	<button wire:loading class="btn btn-primary" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    Loading...
  </button>

								</div><br>
							</div>
						</div>
					</div>
				</div>