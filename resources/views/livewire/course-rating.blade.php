<div>
 <!-- Card --><br><br><br><br>
  <div class="card mb-2">
      <!-- Card Header -->
      <div
          class="card-header d-lg-flex align-items-center justify-content-between">
          <div class="mb-3 mb-lg-0">
              <h3 class="mb-0">Reviews</h3>
              <span>You have full control to manage your own account
                  setting.</span>
          </div>
          {{-- <div>
              <a href="#" class="btn btn-outline-dark btn-sm">Export
                  To CSV...</a>
          </div> --}}
      </div>
      <!-- Card Body -->
  
      <div class="card-body " >

          <!-- List Group -->
          <ul class="list-group list-group-flush border-top">
              <!-- List Group Item -->
           @forelse($reviews as $review)   
              <li class="list-group-item px-0 py-4">
                  <div class="d-flex" style="margin-top:-20px;">
                  <a href="{{route('student.profile',$review->user->id)}}">
                      <img src="{{$review->user->profile_photo_url}}" alt=""
                          class="rounded-circle avatar-lg" />
                  </a>
                      <div class="ms-1 mt-1">
                          <div
                              class="d-flex align-items-center justify-content-between">
                              <div>
                              <a href="{{route('student.profile',$review->user->id)}}">
                                  <h4 class="mb-0"><b> {{$review->user->name}}
                            </a>
                                   @if($review->user->name == $course->user->name)<i class="text-warning fa fa-star"></i> @endif</b></h4>
                                  <span class="text-muted fs-6">{{$review->created_at->diffForHumans()}}</span>
                              </div> 
                              <div>

                              </div>
                          </div>
                          <div class="mt-2">
                              <span class="me-1">
                              @for($i=1;$i<=$review->rating;$i++)                                        
                    <i class="mdi mdi-star me-n1 mb-2 text-warning fs-6"></i>
                                @endfor
                                @for($i=1;$i<=5-$review->rating;$i++)
                                <i class="mdi mdi-star me-n1 text-light"></i>
                                @endfor

                              </span> 
                              <span class="me-1">for</span>
                              <span class="h5">{{$review->course->title}}</span>
                              <p class="mt-2 lh-sm">
                                    {{$review->review}}.
                              </p>
                              @auth
                              <div>
                                <span></span>
                              </div>
                              {{-- @if($review->user_id != auth()->user()->id) --}}
                              <div class="d-lg-flex">                                                    
                                                    <p class="mb-0">Was this review helpful?</p>
                                                        <button wire:loading.attr='disabled' @if($review->user_id != auth()->user()->id)  wire:click='like({{$review->id}})' @else disabled @endif class="btn btn-xs btn-dark ms-lg-3"><i class="fa fa-thumbs-up"></i> <small>({{\App\Models\LikeReview::where('review_id',$review->id)->where('status',1)->where('review_type','App\Models\Review')->count()}})</small></button> </i>
                                                        <button wire:loading.attr='disabled' @if($review->user_id != auth()->user()->id)  wire:click='dislike({{$review->id}})'  @endif class="btn btn-xs btn-outline-white ms-1"><i class="fa fa-thumbs-down"></i> <small>({{\App\Models\LikeReview::where('review_id',$review->id)->where('status',0)->where('review_type','App\Models\Review')->count()}})</small></button>    
                                                </div>
                                {{-- @endif                                         --}}
                        
                              <ul class="list-group list-group-flush collapse" id="collapseExample{{$review->id}}">

                              @forelse(\App\Models\Response::where('course_id',$this->course->id)->where('comment_type','App\Models\Response')->where('comment_id',$review->id)->get() as $response)
                              
                              <li class="list-group-item"><img class="rounded-circle avatar-sm" src="{{$response->author->profile_photo_url}}">
                              <span>{{$response->author->name}}   
                                 @if($response->author->id == $course->user->id)<i class="fa fa-star text-warning"></i> @endif {{$response->created_at->diffForHumans()}}</span>                                    

                                 <p class="lh-sm">{{$response->content}}. </p>
                                 @if ($response->author->name == auth()->user()->name)
                                 <a class="text-danger" href="javascript:;" wire:loading.attr='disabled' wire:loading.class="text-success"  wire:click='deleteResponse({{$response->id}})'><i class=" fe fe-trash"></i></a>                                     
                                 @endif
                              </li>
                              
                                
                        
                              @empty
                              @endforelse
                              </ul>
                                  {{-- <a href="javascript:void(0)" wire:click='more({{$review->id}})'>Show more..</a> --}}
                              <br>
                     {{-- @if(auth()->user()->id == $course->user->id) --}}
    <button title="reply" wire:loadind.attr='disabled' type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{$review->user->id}}">  <i class="fa fa-reply"></i>
</button>
@if(\App\Models\Response::where('course_id',$this->course->id)->where('comment_type','App\Models\Response')->where('comment_id',$review->id)->count() > 0)
                               <button title="show reponses" wire:loadind.attr='disabled' type="button" class="btn btn-outline-white btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$review->id}}" aria-expanded="false" aria-controls="collapseExample{{$review->id}}">
    <i class="fa fa-comments"></i>
  </button>
                            @endif
                            
                                  @if($review->user_id == auth()->user()->id)
                              <button title="delete review {{$review->title}}" wire:loadind.attr='disabled' type="button" class="btn btn-outline-danger btn-sm" wire:click='delete({{$review->id}})'><i class="fa fa-trash"></i></button>
                              @endif
                              @if($review->user_id != auth()->user()->id)
                                <button wire:click='report({{$review->id}})' wire:loadind.attr='disabled' type="button" class="btn btn-outline-danger btn-sm"
                                      title="Report Abuse"><i
                                          class="fe fe-flag"></i></button>
                                @endif

{{-- @endif --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$review->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">What would you say to {{$review->user->name}}</h5>
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

    {{-- <a  href="#" class="btn btn-outline-white btn-sm">Respond</a> --}}
                                  @endauth
                                  
                          </div>
                      </div>
                  </div>
              </li>
              @empty
              <span>No review for this course!! </span>
            @endforelse
          </ul>
      
      {{$reviews->links()}}

<br>
@auth
@if($hideForm == true)
    @if (auth()->user()->id != $course->user->id)
<h6 class="texte-center title">Build Amazing rate</h6> <br>
<form onsubmit="return false">
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Rate This Course</label>
    <select class="form-select" id="inputGroupSelect01" wire:model.defer='rating'>
        <option selected>Choose...</option>
        <option value="1">★☆☆☆☆ (1/5)</option>
            <option value="2">★★☆☆☆ (2/5)</option>
            <option value="3">★★★☆☆ (3/5)</option>
            <option value="4">★★★★☆ (4/5)</option>
            <option value="5">★★★★★ (5/5)</option>
        
    </select>
    </div>
    <div class="input-group mb-3">
    <input type="text" class="form-control" wire:model.defer='review' placeholder="Recipient's review" aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary"  type="submit" wire:loading.attr='hidden' wire:click.prevent='save' id="button-addon2">Button</button>
       <button wire:loading class="btn btn-dark" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    Loading...
  </button>
    </div>
</form>        
    @endif

@else
<span><i class="fa fa-comment-slash"></i></span>
@endif
@endauth




      {{-- <i class="mdi mdi-star me-n1 mb-2 text-warning fs-6"></i></label> @else <label> <i class="mdi mdi-star me-n1 text-light"></i> --}}
      
<!-- Button trigger modal -->
         



  
      </div>
  </div>






{{-- 
<div>
<!-- Card -->
 <div class="card mb-4 ">
   <!-- Card Header -->
    @if (session()->has('message'))
     <!-- accessibility -->
 <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto">Comment</strong>
    <button type="button" class="ms-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
      <span aria-checkbox="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
        {{ session('message') }}    
  </div>
</div>    
@endif
@if($hideForm != true)
                                <form wire:submit.prevent="rate()">
                                    <div class="block max-w-3xl px-1 py-2 mx-auto">
                                        <div class="flex space-x-1 rating">
                                            <label for="star1">
                                                <input  wire:model="rating" 
                                    type="checkbox" id="star1" id="star1" name="rating" value="1" />
                                                <svg class=" @if($rating >= 1 ) text-info @else text-danger @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star2">
                                                <input  wire:model="rating" 
                                    type="checkbox" id="star1" id="star2" name="rating" value="2" />
                                                <svg class=" @if($rating >= 2 ) text-info @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star3">
                                                <input  wire:model="rating" 
                                    type="checkbox" id="star1" id="star3" name="rating" value="3" />
                                                <svg class=" @if($rating >= 3 ) text-info @else text-danger @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star4">
                                                <input  wire:model="rating" 
                                    type="checkbox" id="star1" id="star4" name="rating" value="4" />
                                                <svg class=" @if($rating >= 4 ) text-info @else text-warning @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                            <label for="star5">
                                                <input  wire:model="rating" 
                                    type="checkbox" id="star1" id="star5" name="rating" value="5" />
                                                <svg class=" @if($rating >= 5 ) text-danger @else text-info @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            </label>
                                        </div>
                                        <div class="my-5">
                                            @error('review')
                                                <p class="mt-1 text-red-500">{{ $message }}</p>
                                            @enderror
                                            <textarea wire:model.defer="review" name="description" class="block w-full px-4 py-3 border border-2 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Comment.."></textarea>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <button type="submit" class="btn btn-info">Rate</button>
                                        @auth
                                            @if($currentId)
                                                <button type="submit" class="btn-sm btn-info" wire:click.prevent="delete({{ $currentId }})" class="text-sm">Delete</button>
                                            @endif
                                        @endauth
                                    </div>

                                         <div class="card-body">
   <div class="mb-3 mb-4">
      <label for="twitterPage" class="form-label">Comment
      <small class="text-muted">
      (Enter your best comment below)</small>
      </label>
      <input class="form-control" id="twitterPage" placeholder="geeksuidesign " type="text" required="">
   </div>

   <button type="submit" class="btn btn-dark">
  Rate
   </button>
 </div>
  </form>
@else
<span>    You need to login in order to be able to rate the course! !!<span>
@endauth
 @endif
              
    <section class="relative block pt-20 pb-24 overflow-checkbox text-left bg-white">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        Ratings
                    </h2>
                </div>
            </div>
            <div class="box-border flex grid flex-wrap justify-center gap-10 -mx-4 text-center text-indigo-900 lg:gap-16 lg:justify-start lg:text-left">
                @forelse ($reviews as $review)
                    <div class="flex col-span-1">
                        <div class="relative flex-shrink-0 w-20 h-20 text-left">
                            <a href="{{ '@' . $review->user->name }}">
                            </a>
                        </div>
                        <div class="relative px-4 mb-16 leading-6 text-left">
                            <div class="box-border text-lg font-medium text-gray-600">
                                {{ $review->review }}
                            </div>
                            <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                Rating: <strong>{{ $review->rating }}</strong> ⭐
                                @auth
                                    @if(auth()->user()->id == $review->user_id || auth()->user()->role->name == 'admin' ))
                                        - <a wire:click.prevent="delete({{ $review->id }})" class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                @endauth
                            </div>
                            <div class="box-border text-left text-gray-700" style="quotes: auto;">
                                <a href="{{ '@' . $review->user->username }}">
                                    {{  $review->user->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            No ratings
                        </div>
                    </div>
                </div>
                @endforelse

            </div>
    </section>
    
</div> --}}
</div>