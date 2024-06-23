
				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header d-lg-flex align-items-center justify-content-between">
							<div class="mb-3 mb-lg-0">
								<h3 class="mb-0">Reviews</h3>
								<span>You have full control to manage your own account
									setting.</span>
							</div>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<!-- Form -->
							<form class="row mb-4">
								<div class="col-xl-4 col-lg-3 col-md-4 col-12 mb-2 mb-lg-0">
									<select class="form-control" wire:model.defer='course_id'>
										<option value="">ALL</option>
							@foreach ($courses as $course)
								
										<option value="{{$course->id}}">
											{{$course->title}}
										</option>
							@endforeach		
									</select>
								</div>
								<div class="col-xl-2 col-lg-2 col-md-4 col-12 mb-2 mb-lg-0">
									<!-- Custom select -->
									<select class="form-control" wire:model.defer='rat'>
										<option value="">Rating</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-2 mb-lg-0">
									<!-- Custom select -->
									<select class="form-control"  wire:model.defer='sort'>
										<option value="">Sort by</option>
										<option value="asc">Newest</option>
										<option value="desc">Oldest</option>
									</select>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-2 mb-lg-0">
									<button type="button" wire:loading.attr='disabled' wire:click='search'  class="btn btn-primary">Search</button>
								</div>
							</form>
							@if(session()->has('message'))<p class="alert alert-success">{{session()->get('message')}}</p>@endif
							<!-- List group -->
							<ul class="list-group list-group-flush border-top">
@forelse($reviews as $review)
								<!-- List group item -->
								<li class="list-group-item px-0 py-4">
									<div class="d-flex">
										<img src="{{\App\Models\User::where('id',$review->user_id)->count() > 0 ? \App\Models\User::where('id',$review->user_id)->first()->profile_photo_url : '' }}" alt="" class="rounded-circle avatar-lg" />
										<div class="ms-3 mt-2">
											<div class="d-flex align-items-center justify-content-between">
												<div>
													<h4 class="mb-0">{{\App\Models\User::where('id',$review->user_id)->count() > 0 ? \App\Models\User::where('id',$review->user_id)->first()->name : '' }}</h4>
													<span class="text-muted fs-6">{{$review->created_at}}</span>
												</div>
												<div>
													<a href="javascript:;" wire:click='delete({{$review->id}})' data-bs-toggle="tooltip" data-placement		="top" title="Report Abuse"><i		
															class="fe fe-trash"></i></a>
												</div>
											</div>
											<div class="mt-2">
												<span class="me-1">
												@for ($i = 0; $i < $review->rating; $i++)
													<i class="mdi mdi-star me-n1 mb-2 text-warning fs-6"></i>													
												@endfor
												@for ($i = 0; $i < 5 - $review->rating ; $i++)
													<i class="mdi mdi-star me-n1 text-light"></i>
												@endfor
													
												</span>
												<span class="me-1">for</span>
												<span class="h5">{{\App\Models\Course::where('id',$review->course_id)->count() > 0 ? \Str::title(\App\Models\Course::where('id',$review->course_id)->first()->title,20) : '' }}</span>
												<p class="mt-2">
													{!! $review->review !!}
												</p>
												<button title="reply" wire:loadind.attr='disabled' type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{$review->user_id}}">  <i class="fa fa-reply"></i>
</button>

<div class="modal fade" id="exampleModalCenter{{$review->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalCenterTitle">What would you say to {{$review->user->name}}</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input wire:model.defer='content' text="text" placeholder="post your respond" class='form-control'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button wire:click='response({{$review->id}})' type="button" data-bs-dismiss="modal" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
											</div>
										</div>
									</div>
								</li>
								
@empty
<li class="list-group-item px-0 py-4">
No reviews
</li>
@endforelse
							</ul>
						</div>
					</div>
				</div>
			