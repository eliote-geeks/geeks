<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    {{-- <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}

<!-- Vendors -->
	{{-- <link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/apexcharts/css/apexcharts.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/overlay-scrollbar/css/OverlayScrollbars.min.css">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="assets/css/style.css">
<script src="assets/vendor/choices/js/choices.min.js"></script>
<script src="assets/vendor/apexcharts/js/apexcharts.min.js"></script>
<script src="assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.html"></script>

<!-- Template Functions -->
<script src="assets/js/functions.js"></script> --}}
    <main>
  
  <!-- Container START -->
  <div class="container">
    <div class="row g-4">

          <!-- Sidenav START -->
      <div class="col-lg-3">

        <!-- Advanced filter responsive toggler START -->
        <div class="d-flex align-items-center d-lg-none">
          <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <i class="btn btn-primary fw-bold fa-solid fa-sliders-h"></i>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
          </button>
        </div>
        <!-- Advanced filter responsive toggler END -->
        
        <!-- Navbar START-->
        <nav class="navbar navbar-expand-lg mx-0"> 
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
              <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body d-block px-2 px-lg-0">
              <!-- Card START -->
              <div class="card overflow-hidden">
                <!-- Cover image -->
                <div class="h-50px" style="background-image:url({{asset(auth()->user()->profile_photo_url)}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                  <!-- Card body START -->
                  <div class="card-body pt-0">
                    <div class="text-center">
                    <!-- Avatar -->
                    <div class="avatar avatar-lg ">
                      <a href="#!"><img class="avatar-img rounded border border-white border-3" src="{{auth()->user()->profile_photo_url}}" alt=""></a>
                    </div>
                    <!-- Info -->
                    <h5 class="mb-0"> <a href="{{route('dashboard')}}">{{auth()->user()->name}}</a> </h5>
                    <small>{{auth()->user()->email}}</small>
                    {{-- <p class="mt-3">I'd love to change the world, but they won’t give me the source code.</p> --}}
                    <!-- User stat START -->
                    <div class="hstack gap-2 gap-xl-3 justify-content-center">
                      <!-- User stat item -->
                      <div>
                        <h6 class="mb-0">{{\App\Models\FriendInvitation::where('invite_id',auth()->user()->id)->where('status',1)->count()}}</h6>
                        <small>Friends</small>
                      </div>
                      <!-- Divider -->
                      <div class="vr"></div>
                      <!-- User stat item -->
                      <div>
                        <h6 class="mb-0">{{\App\Models\BlogUser::where('user_id',auth()->user()->id)->count()}}</h6>
                        <small>Posts</small>
                      </div>
                      <!-- Divider -->
                      <div class="vr"></div>
                      <!-- User stat item -->
                      <div>
                        <h6 class="mb-0">{{\App\Models\Order::where('user_id',auth()->user()->id)->where('status','SUCCESS..')->count()}}</h6>
                        <small>Courses</small>
                      </div>
                    </div>
                    <!-- User stat END -->
                  </div>

                  <!-- Divider -->
                  <hr>

                  <!-- Side Nav START -->
                  <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/')}}"> <i class="fa fa-home" ></i> <span>Home </span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('students.friends')}}"> <i class="fa fa-users"></i>  <span>Friends </span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('friends.invitations')}}"> <i class="fa fa-address-card"></i> <span>Invitations</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('notifications')}}"> <i class="fa fa-bell"></i> <span>Notifications </span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('students.edit',auth()->user()->id)}}"> <i class="fa fa-cogs"></i>  <span>Settings </span></a>
                    </li>
                  </ul>
                  <!-- Side Nav END -->
                </div>
                <!-- Card body END -->
                <!-- Card footer -->
                <div class="card-footer text-center py-2">
                  <u><a class="btn btn-link btn-sm" href="{{route('dashboard')}}"><i class="fa fa-user"></i> Dashboard</a></u>
                </div>
              </div>
              <!-- Card END -->



              <!-- Copyright -->
              <p class="small text-center mt-1">©{{date('Y')}} <a class="text-body" target="_blank" href="https://www.webestica.com/"> Father </a></p>
            </div>
          </div>
        </nav>
        <!-- Navbar END-->
      </div>
      <!-- Sidenav END -->

      <!-- Main content START -->
      <div class="col-md-8 col-lg-6 vstack gap-4">
        <!-- Story START -->
        <div class="tiny-slider arrow-hover overflow-hidden">
          <div class="tiny-slider-inner ms-n4" data-arrow="true" data-dots="true" data-loop="false" data-autoplay="false" data-items-xl="4" data-items-lg="3" data-items-md="3" data-items-sm="3" data-items-xs="2" data-gutter="12" data-edge="30">

            <!-- Slider items -->
            <div>
              <!-- Card add story START -->
              <div class="card border border-2 border-dashed h-150px shadow-none d-flex align-items-center justify-content-center text-center">
                <div>
                </div>
              </div>
              <!-- Card add story END -->
            </div>

            <!-- Slider items -->
            <div>
              <!-- Card START -->
              <div class="card card-overlay-bottom border-0 position-relative h-150px" style="background-image:url(assets/images/post/1by1/02.jpg); background-position: center left; background-size: cover;">
                <div class="card-img-overlay d-flex align-items-center p-2">
                  <div class="w-100 mt-auto">
                    <!-- Name -->
                    <a href="#!" class="stretched-link text-white small">Judy Nguyen</a>
                  </div>
                </div>
              </div>
              <!-- Card END -->
            </div>

            <!-- Slider items -->
            <div>
              <!-- Card START -->
              <div class="card card-overlay-bottom border-0 position-relative h-150px" style="background-image:url(assets/images/post/1by1/03.jpg); background-position: center left; background-size: cover;">
                <div class="card-img-overlay d-flex align-items-center p-2">
                  <div class="w-100 mt-auto">
                    <!-- Name -->
                    <a href="#!" class="stretched-link text-white small">Samuel Bishop</a>
                  </div>
                </div>
              </div>
              <!-- Card END -->
            </div>

            
            <!-- Slider items -->
            
            <!-- Slider items -->
            
          </div>
        </div>
        <!-- Story END -->

        <!-- Share feed START -->
        <div class="card card-body">
          <div class="d-flex mb-3">
            <!-- Avatar -->
            <div class="avatar avatar-xs me-2">
              <a href="{{route('dashboard')}}"> <img class="avatar-img rounded-circle" src="{{auth()->user()->profile_photo_url}}" alt=""> </a>
            </div>
            <!-- Post input -->
            <form class="w-100">
              <textarea class="form-control pe-4 border-0" wire:model.defer='description' rows="2" data-autoresize placeholder="Share your thoughts..."></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
          </div>
            <div>
          <label class="form-label">Upload attachment</label>
          <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
          <input type="file" wire:model.defer='photo' id="uploading" style="display:none;">
            <div class="dz-message">
             <!-- floats -->
 <div class="clearfix" wire:loading>
  <div class="spinner-border float-right" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
            @if($photo==null)
              <label wire:loading.attr='disabled' class="bi bi-images display-3" for="uploading"></label>
              <p>Drag here or click to upload photo.</p>
              @endif
              @if($photo!=null)
            <img class="card" src="@if($photo!=null){{$photo->temporaryUrl()}}@endif">
            @endif
            </div>
          </div>
        </div>

          <!-- Share feed toolbar START -->
          <ul class="nav nav-pills nav-stack small fw-normal">
            <li class="nav-item dropdown ms-lg-auto">
              <button wire:loading.attr='disabled' class="btn btn-success bg-success py-1 px-2 mb-0"  id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false" wire:click='saveDescription'>
                <i class="fe fe-telegram"></i> post 
              </button>              
            </li>
          </ul>
          <!-- Share feed toolbar END -->
        </div>
        <!-- Share feed END -->

        <!-- Card feed item START -->
        @forelse ($posts as $post)
            
        @if((\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$post->user_id)->where('status',1)->count() > 0) || (\App\Models\FriendInvitation::where('user_id',$post->user_id)->where('invite_id',auth()->user()->id)->where('status',1)->count() > 0) || auth()->user()->id == $post->user_id)
        <div class="card">
          <!-- Card header START -->
          <div class="card-header border-0 pb-0" id="{{$post->id}}">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-story me-2">
                  <a href="{{route('student.profile',\App\Models\User::find($post->user_id))}}"> <img class="avatar-img rounded-circle" src="{{\App\Models\User::find($post->user_id)->profile_photo_url}}" alt=""> </a>
                </div>
                <!-- Info -->
                <div>
                  <div class="nav nav-divider">
                    <h6 class="nav-item card-title mb-0"> <a href="{{route('student.profile',\App\Models\User::find($post->user_id))}}">{{\App\Models\User::find($post->user_id)->first_name.' '.\App\Models\User::find($post->user_id)->last_name}} </a></h6>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="nav-item small"> {{$post->created_at->diffForHumans()}}</span>
                  </div>
                  <p class="mb-0 small">@if(\App\Models\User::find($post->user_id)->user_type == 'App\Models\Student') Student @else Learn @endif at Father</p>
                </div>
              </div>
              <!-- Card feed action dropdown START -->
              <div class="dropdown">
              @if($post->user_id == auth()->user()->id)
                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots"></i>
                </a>
                @endif
                <!-- Card feed action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                  <li><button wire:click='remove({{$post->id}})' class="dropdown-item" > <i class="bi bi-trash fa-fw pe-2"></i>delete post</button></li>
                  {{-- <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li> --}}
                </ul>
                
              </div>
              <!-- Card feed action dropdown END -->
            </div>
          </div>
          <!-- Card header END -->
          <!-- Card body START -->
          <div class="card-body">
            <p>{!!$post->description!!}.</p>
            <!-- Card img -->
            @if($post->photo != null)
            <img class="card-img" src="{{{$post->photo}}}" alt="Post">
            @endif
            <!-- Feed react START -->
            <ul class="nav nav-stack py-3 small">
              <li class="nav-item">
                <a wire:loading.attr='disabled' class="nav-link text-{{\App\Models\LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\BlogUser')->where('review_id',$post->id)->where('status',1)->count() > 0 ? 'primary' : 'link'}}" wire:click='like({{$post->id}})' href="javascript:;"> <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked ({{\App\Models\LikeReview::where('review_type','App\Models\BlogUser')->where('review_id',$post->id)->where('status',1)->count()}})</a>
              </li>
              <li class="nav-item">
                <span class="nav-link" > <i class="bi bi-chat-fill pe-1"></i>Comments ({{\App\Models\CommentBlogUser::where('user_id',$post->id)->count()}})</span>
              </li>
              <!-- Card share action START -->
              <li class="nav-item dropdown ms-sm-auto">
                {{-- <a class="nav-link mb-0" href="#" id="cardShareAction" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                </a> --}}
                <!-- Card share action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction">
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                </ul>
              </li>
              <!-- Card share action END -->
            </ul>
            <!-- Feed react END -->

            <!-- Add comment -->

            <!-- Comment wrap START -->
            <ul class="comment-wrap list-unstyled">
              <!-- Comment item START -->
@forelse (\App\Models\CommentBlogUser::where('comment_id',$post->id)->where('comment_type','App\Models\Post')->latest()->take($lm)->get() as $comment)
                <li class="comment-item">
                  <div class="d-flex position-relative">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs">
                      <a href="#!"><img class="avatar-img rounded-circle" src="{{$comment->user->profile_photo_url}}" alt=""></a>
                    </div>
                    <div class="ms-2">
                      <!-- Comment by -->
                      <div class="bg-light rounded-start-top-0 p-3 rounded">
                        <div class="d-flex justify-content-between">
                          <h6 class="mb-1"> <a href="#!"> {{$comment->user->first_name.' '.$comment->user->last_name}} </a></h6>
                          <small class="ms-2">{{$comment->created_at->diffForHumans()}}</small>
                        </div>
                        <p class="small mb-0">{!! $comment->content !!}</p>
                      </div>
                      <!-- Comment react -->
                      <ul class="nav nav-divider py-2 small">
                        <li class="nav-item">
                          <a class="nav-link" href="javascript:;" wire:click.prevent='likeComment({{$comment->id}})'> Like ({{\App\Models\LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\Comment')->where('review_id',$comment->id)->where('status',1)->count()}})</a>
                        </li>
                        <li class="nav-item">
                          
                          <a class="nav-link mb-0" data-bs-toggle="collapse" href="#collapseComment{{$comment->id}}" role="button" aria-expanded="false" aria-controls="collapseComment{{$comment->id}}">
										Reply
									</a>
                          								<div class="text-end">									{{-- <a href="#" class="btn btn-sm btn-primary-soft mb-1 mb-sm-0">Direct message</a> --}}
									
									<!-- collapse textarea -->
									<div class="collapse " id="collapseComment{{$comment->id}}">
										<div class="d-flex mt-3">
											<textarea wire:model.defer='response' class="form-control mb-0" placeholder="Add a comment..." rows="2" spellcheck="false"></textarea>
											<button wire:loading.attr='disabled' wire:click='response({{$comment->id}})' class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i class="fas fa-paper-plane fs-5"></i></button>
										</div>
									</div>
								</div>
                        </li>
                        @if(\App\Models\Response::where([
                    'comment_id' => $comment->id,
                    'comment_type' => 'App\Models\Comment'
                     ])->count() > 0)
                        <li class="nav-item">
                          <a class="nav-link" href="javascript:;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1{{$comment->id}}" aria-expanded="false" aria-controls="collapseExample1{{$comment->id}}"> View {{\App\Models\Response::where([
                    'comment_id' => $comment->id,
                    'comment_type' => 'App\Models\Comment'
                     ])->count()}} replies</a>
                        </li>
                        @endif
                  @if($comment->user_id == auth()->user()->id)
                        <li class="nav-item">
                        <a class="nav-link" wire:click='deleteComment({{$comment->id}})' href="javascript:;">
                        Delete
                        </a>
                        </li>
                  @endif
                      </ul>
                    </div>
                  </div>
                  @forelse(\App\Models\Response::where([
                    'comment_id' => $comment->id,
                    'comment_type' => 'App\Models\Comment'
                     ])->get() as $response)
                  <!-- Comment item nested START -->
                  <ul class="comment-item-nested list-unstyled collapse" id="collapseExample1{{$comment->id}}">
                    <!-- Comment item START -->
                    <li class="comment-item">
                      <div class="d-flex">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs">
                          <a href="javascript:;"><img class="avatar-img rounded-circle" src="{{\App\Models\User::find($response->author_id)->profile_photo_url}}" alt=""></a>
                        </div>
                        <!-- Comment by -->
                        <div class="ms-2">
                          <div class="bg-light p-3 rounded">
                            <div class="d-flex justify-content-between">
                              <h6 class="mb-1"> <a href="#!"> {{\App\Models\User::find($response->author_id)->name}} </a> </h6>
                              <small class="ms-2">{{$response->created_at->diffForHumans()}}</small>
                            </div>
                            <p class="small mb-0"><b class="text-info">{{\App\Models\User::find($response->client_id)->name}}</b> {{$response->content}}</p>
                          </div>
                          <!-- Comment react -->
                          <ul class="nav nav-divider py-2 small">
                            <li class="nav-item">
                              <a class="nav-link" href="javascript:;" wire:click='likeResponse({{$response->id}})'> Like ({{\App\Models\LikeReview::where('user_id',auth()->user()->id)->where('review_type','App\Models\Response')->where('review_id',$response->id)->where('status',1)->count()}})</a>
                            </li>
                            {{-- <li class="nav-item">
                              <a class="nav-link" href="#!"> Reply</a>
                            </li> --}}
                            
                                                 <li class="nav-item">
                              <a class="nav-link" href="javascript:;" wire:click='deleteResponse({{$response->id}})'> Delete</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                  </ul>
                  @empty
                  @endforelse
                  <!-- Load more replies -->
                  {{-- <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5" data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                      <span class="spinner-dot"></span>
                      <span class="spinner-dot"></span>
                      <span class="spinner-dot"></span>
                    </div>
                    Load more replies 
                  </a> --}}
                  <!-- Comment item nested END -->
                </li>
                @empty
@endforelse

            </ul>
                        <div class="d-flex mb-3">
              <!-- Avatar -->
              <div class="avatar avatar-xs me-2">
                <a href="{{route('student.profile',auth()->user()->id)}}"> <img class="avatar-img rounded-circle" src="{{auth()->user()->profile_photo_url}}" alt=""> </a>
              </div>
              <!-- Comment box  -->
              <form class="w-100">
              @if((\App\Models\FriendInvitation::where('user_id',auth()->user()->id)->where('invite_id',$post->user_id)->where('status',1)->count() > 0) || (\App\Models\FriendInvitation::where('user_id',$post->user_id)->where('invite_id',auth()->user()->id)->where('status',1)->count() > 0) || auth()->user()->id == $post->user_id)
                <textarea data-autoresize class="form-control pe-4 bg-light" rows="1" placeholder="Add a comment..." wire:model='body'></textarea> 
                
              </form>&nbsp;&nbsp;&nbsp;
              <button wire:loading.attr='disabled' class="btn btn-outline-dark" wire:loading.attr='disabled'   wire:click='comments({{$post->id}})'>Save</button>
              @else
              <span>It's not your friend!</span>
              @endif
            </div>
            <!-- Comment wrap END -->
          </div>
          <!-- Card body END -->
          <!-- Card footer START -->
@if(\App\Models\CommentBlogUser::where('comment_id',$post->id)->where('comment_type','App\Models\Post')->count() > 4)
          <div class="card-footer border-0 pt-0">
            <!-- Load more comments -->
            <button wire:click='loadAll({{$post->id}})'  wire:loading.attr='disabled' role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center">
             {{-- data-bs-toggle="modal" data-bs-target="#exampleModalScrollable{{$post->id}}" --}}
              Load more comments 
            </button>

            <button wire:click='maskAll({{$post->id}})'  wire:loading.attr='disabled' role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center">
            Mask
            </button>
             <!-- border spinner -->
                <div class="spinner-border" role="status" wire:loading>
                  {{-- <span class="text-sm">Loading...</span> --}}
                </div>
          </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@endif          
          <!-- Card footer END -->
        </div>
        @endif
        @empty
        
          <!-- Load more button END -->
        @endforelse
          <a class="text-center" href="javascript:;" role="button"  data-bs-toggle="button" aria-pressed="true">
            <span class="load-text"> </span>
            <div class="load-icon">
              <div  wire:loading class="spinner-grow spinner-grow-sm" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </a>
      </div>
      <!-- Main content END -->

      <!-- Right sidebar START -->
      <div class="col-lg-3">
        <div class="row g-4">
          <!-- Card follow START -->
          
          <!-- Card follow START -->

          <!-- Card News START -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <!-- Card header START -->
              <div class="card-header pb-0 border-0">
                <h5 class="card-title mb-0">Today’s news</h5>
              </div>
              <!-- Card header END -->
              <!-- Card body START -->
              <div class="card-body">
                <!-- News item -->
                <div class="mb-3">
                  <h6 class="mb-0"><a href="blog-details.html">Ten questions you should answer truthfully</a></h6>
                  <small>2hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                  <h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about money</a></h6>
                  <small>3hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                  <h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for learning about business</a></h6>
                  <small>4hr</small>
                </div>
                <!-- News item -->
                <div class="mb-3">
                  <h6 class="mb-0"><a href="blog-details.html">Skills that you can learn from business</a></h6>
                  <small>6hr</small>
                </div>
                <!-- Load more comments -->
                <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
                  <div class="spinner-dots me-2">
                    <span class="spinner-dot"></span>
                    <span class="spinner-dot"></span>
                    <span class="spinner-dot"></span>
                  </div>
                  View all latest news
                </a>
              </div>
              <!-- Card body END -->
            </div>
          </div>
          <!-- Card News END -->
        </div>
      </div>
      <!-- Right sidebar END -->

    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>

<div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal feed header START -->
      <div class="modal-header">
        <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal feed header END -->

        <!-- Modal feed body START -->
        <div class="modal-body">
        <!-- Add Feed -->
        <div class="d-flex mb-3">
          <!-- Avatar -->
          <div class="avatar avatar-xs me-2">
            <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
          </div>
          <!-- Feed box  -->
          <form class="w-100">
            <textarea wire:model.defer='title'  class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
          </form>          

          
        </div>

        <!-- Dropzone photo START -->
        <div>
          <label class="form-label">Upload attachment</label>
          <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
          <input type="file" wire:model.defer='photo' id="uploading" style="display:none;">
            <div class="dz-message">
              <label class="@if($photo!=null){{$photo->temporaryUrl()}} @else bi bi-images display-3 @endif" for="uploading"></label>
              <p>Drag here or click to upload photo.</p>
            
            </div>
          </div>
        </div>
        <!-- Dropzone photo END -->

        </div>
        <!-- Modal feed body END -->

        <!-- Modal feed footer -->
        <div class="modal-footer ">
          <!-- Button -->
            <button type="button" class="btn-sm btn-danger me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn-sm btn-primary" data-bs-dismiss="modal">Post</button>
        </div>
        <!-- Modal feed footer -->
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
      window.onscroll = function(ev) {
         if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
             window.livewire.emit('load-more');
          }
      };
      </script>