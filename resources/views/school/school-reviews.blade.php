@extends('layouts.app')
@section('content')

  @include('navbar.navbar-school')


<div class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                      <!-- nav -->
                    <ul class="nav nav-line-bottom" >
                        <li class="nav-item">
                            <a href="{{route('schools.show',$school->id)}}" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schools.reviews',$school->id)}}" class="nav-link active">Review <span class="text-inherit">({{\App\Models\SchoolReview::where('school_id',$school->id)->count()}})</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('class.list',$school->id)}}" class="nav-link">Classes <span class="text-inherit">({{\App\Models\ClassSchool::where('school_id',$school->id)->count()}})</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schools.photo',$school->id)}}" class="nav-link">Photos</a>
                        </li>
                                     <li class="nav-item">
                <a href="{{route('schools.instructors',$school->id)}}" class="nav-link">Instructors</a>
              </li>
                        @if($school->user_id == auth()->user()->id)
                                      <li class="nav-item">
                <a href="{{route('class.pending',$school->id)}}" class="nav-link ">Pending <span class="badge bg-secondary">{{
              \Illuminate\Support\Facades\DB::table('class_courses')
            ->leftJoin('courses','courses.id','=','class_courses.course_id')
            ->leftJoin('class_schools','class_schools.id','=','class_courses.class_id')
            ->selectRaw('courses.*, class_schools.name, class_courses.status as pending, class_courses.class_id as class, class_courses.id as de ')
            ->where('courses.deleted_at',null)
            ->where('courses.status',1)
            ->where('class_courses.status','=',0)
            ->where('class_schools.school_id','=',$school->id)
            ->orderByDesc('de')
            ->count()
                }}</span> </a>
              </li>
              @endif
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row mt-6">
            <div class="col-md-12 mb-8">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div>
                          <!-- heading -->
                        <h2 class="mb-0">Company Reviews <span class="text-muted ms-2 fs-5 fw-normal">based on ({{$rat->count()}}) Reviews</span></h2>
                    </div>
                    <div class="mt-3">
              
                          <!-- button -->
                        <!-- Button trigger modal -->
                        @if(\App\Models\SchoolReview::where('user_id',auth()->user()->id)->where('school_id',$school->id)->first() == null)
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
  Post a review
</button>
@endif
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form method="POST" action="{{route('reviews.create',$school->id)}}">
        @csrf
        <select class=" filter-option-inner-inner form-control" name="rating" required>
            <option value="1">★☆☆☆☆ (1/5)</option>
            <option value="2">★★☆☆☆ (2/5)</option>
            <option value="3">★★★☆☆ (3/5)</option>
            <option value="4">★★★★☆ (4/5)</option>
            <option value="5">★★★★★ (5/5)</option>
        </select>
        @error('rating')<small class="text-danger">{{$message}}</small>@enderror
        <br>
        
        <textarea placeholder="review" class="form-control" rows='4' required name="review"></textarea>
        @error('review')<small class="text-danger">{{$message}}</small>@enderror
        <br>
<button type="submit" class="btn btn-outline-primary">Post</button>
      </form>
      </div>
      <div class="modal-footer">
              
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


                    </div>
                </div>

            </div>
            <div class="col-lg-8 col-md-8 col-12">
                <div class="mb-4 mb-lg-0">
                      <!-- heading -->
                    <h2 class="h3 mb-6">Overall Rating</h2>
                      <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-md-4 text-md-center mb-4 mb-md-0">
                              <!-- rating -->
                            <h3 class="display-2 fw-bold">{{round($student_review,1)}}</h3>
                            @for ($k = 1 ; $k <= round($student_review,0) ; $k++)   
                            <i class="bi bi-star-fill text-warning"></i>
                                                @endfor
                            @for ($k = 1 ; $k <= 5 - round($student_review,0) ; $k++)
                            <i class="bi bi-star-fill ms-1 "></i>
                            @endfor
{{--                             
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i> --}}
                            
                            <p class="mb-0">({{$rat->count()}}) Reviews</p>
                        </div>
                        <div class="offset-lg-1 col-lg-7 col-md-8">
                              <!-- progress -->
                            <div class="d-flex align-items-center mb-2">
                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">5</span>@if($star5 > 0)<i class="bi bi-star-fill text-warning ms-1 fs-6"></i> @else<i class="bi bi-star-fill ms-1 fs-6"></i>@endif</div>
                                <div class="w-100">
                                  <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star5}}%;" aria-valuenow="{{$star5}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div><span class="text-muted ms-3">({{$star5}})</span>
                              </div>
                               <!-- progress -->
                              <div class="d-flex align-items-center mb-2">
                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">4</span>@if($star4 > 0)<i class="bi bi-star-fill text-warning ms-1 fs-6"></i> @else<i class="bi bi-star-fill ms-1 fs-6"></i>@endif</div>
                                <div class="w-100">
                                  <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star4}}%;" aria-valuenow="{{$star4}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div><span class="text-muted ms-3">({{$star4}})</span>
                              </div>
                               <!-- progress -->
                              <div class="d-flex align-items-center mb-2">
                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">3</span>@if($star3  > 0)<i class="bi bi-star-fill text-warning ms-1 fs-6"></i> @else<i class="bi bi-star-fill ms-1 fs-6"></i>@endif</div>
                                <div class="w-100">
                                  <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star3}}%;" aria-valuenow="{{$star3}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div><span class="text-muted ms-3">({{$star3}})</span>
                              </div>
                               <!-- progress -->
                              <div class="d-flex align-items-center mb-2">
                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">2</span>@if($star2 > 0)<i class="bi bi-star-fill text-warning ms-1 fs-6"></i> @else<i class="bi bi-star-fill ms-1 fs-6"></i>@endif</div>
                                <div class="w-100">
                                  <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star2}}%;" aria-valuenow="{{$star2}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div><span class="text-muted ms-3">({{$star2}})</span>
                              </div>
                               <!-- progress -->
                              <div class="d-flex align-items-center mb-2">
                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">1</span>@if($star1 > 0)<i class="bi bi-star-fill text-warning ms-1 fs-6"></i> @else<i class="bi bi-star-fill ms-1 fs-6"></i>@endif</div>
                                <div class="w-100">
                                  <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$star1}}%;" aria-valuenow="{{$star1}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div><span class="text-muted ms-3">({{$star1}})</span>
                              </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-3 col-12 col-md-4">
                <div>
              
              
              
        <div class="mb-2">
 <!-- star -->

    </div>
                </div>
            </div>
        </div>

        @forelse($reviews as $review)
         <!-- row -->
        <div class="row mt-8">
             <!-- col -->
            <div class="col-lg-9 col-md-8 col-12">
                <div class="d-flex mb-4">
                     <!-- img -->
                    <img src="{{$review->user->profile_photo_url}}" alt="" class="rounded-circle avatar-lg">
                    <div class=" ms-3">
 <!-- progress -->
                        <div class="fs-6 mb-3 mt-1">
                             <!-- heading -->
                            <h4 class="mb-1">
                                {{$review->user->first_name.' '.$review->user->last_name}}

                            </h4>
                             <!-- text -->
                            <span class="text-dark fw-semi-bold">{{round($review->rating,1)}}</span><i class="bi bi-star-fill ms-1 text-warning"></i>
                            <span class="ms-2 text-muted">posted on {{(\Carbon\Carbon::parse($review->created_at)->format('d, M Y'))}}
                            </span>
                        </div>
                        <div>
                             <!-- heading -->
                         <!-- text -->
                        <p class="text-break">{{$review->review}}.</p>
                        @if(auth()->user()->id == $review->user_id)<a href="{{route('deleteComment',$review->id)}}" class="btn-sm btn-danger"><small>Delete</small></a>@endif
                        </div>
                    </div>
                </div>
@empty
<span>no review</span>
@endforelse

                <div class="mt-8">
                    {{$reviews->links()}}
                </div>
            </div>


        </div>
    </div>
</div>
@endsection