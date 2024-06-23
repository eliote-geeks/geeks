				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Security</h3>
							<p class="mb-0">
								Edit your account settings and change your password here.
							</p>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<h4 class="mb-0">Email Address</h4>
							<p>
								Your current email address is
								<span class="text-success">{{$user->email}}</span>
							</p>
							<form class="row">
								<div class="mb-3 col-lg-6 col-md-12 col-12">
									<label class="form-label" for="email">New email address</label>
									<input id="email" type="email" wire:model='email' class="form-control" placeholder="" required />
                                     @error('email') <span class="text-danger">{{ $message }}</span> @enderror<br>
									<button type="submit" class="btn btn-dark mt-2" wire:click.prevent="savEmail" wire:loading.attr="hidden">
										Update Details
									</button>
									                       <button wire:loading class="btn btn-dark" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    Loading...
  </button>
								</div>
							</form>


							<hr class="my-5" />
							<div>
								<h4 class="mb-0">Change Password</h4>
								<p>
									We will email you a confirmation when changing your
									password, so please expect that email after submitting.
								</p>
								<!-- Form -->
								<form class="row">
									<div class="col-lg-6 col-md-12 col-12">
											<!-- Current password -->
										<div class="mb-3">
											<label class="form-label" for="currentpassword">Current password</label>
											<input id="currentpassword" type="password" wire:model.defer='currentPassword'  class="form-control" wire:loading.attr='disabled'
												placeholder="" required />
                                                               @error('currentPassword') <span class="text-danger">{{ $message }}</span> @enderror<br>
										</div>
											<!-- New password -->
										<div class="mb-3 password-field">
											<label class="form-label" for="newpassword">New password</label>
											<input id="newpassword" type="password"  wire:model.defer='newPassword' class="form-control mb-2" wire:loading.attr='disabled'
												placeholder="" required />
                                                        @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror<br>
											<div class="row align-items-center g-0">
												<div class="col-6">
													<span data-bs-toggle="tooltip" data-placement="right"
														title="Test it by typing a password in the field below. To reach full strength, use at least 6 characters, a capital letter and a digit, e.g. 'Test01'">Password
														strength
														<i class="fas fa-question-circle ms-1"></i></span>
												</div>
											</div>
										</div>
										<div class="mb-3">
												<!-- Confirm new password -->
											<label class="form-label" for="confirmpassword">Confirm New Password</label>
											<input id="confirmpassword" type="password" wire:model.defer='confirmPassword' class="form-control mb-2" wire:loading.attr='disabled'
												placeholder="" required />
                                                    @error('confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror<br>
										</div>
											<!-- Button -->
										<button type="submit" class="btn btn-dark" wire:click.prevent='savePasseword' wire:loading.attr='hidden'> 
											Save Password
										</button>
																			                       <button wire:loading class="btn btn-dark" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    Loading...
  </button>

										<div class="col-6"></div>
									</div>
									<div class="col-12 mt-4">
										<p class="mb-0">
											Can't remember your current password?
											<a href="#">Reset your password via email</a>
										</p>
									</div>
								</form>
							</div>
							<hr class="my-5" />
														<div>


		@livewire('profile.logout-other-browser-sessions-form')

							</div>
<hr class="my-5" />
					{{-- @livewire('profile.two-factor-authentication-form') --}}
						</div>
					
					</div>
				</div>
					