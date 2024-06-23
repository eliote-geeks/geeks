
  <div class="py-6">
    <div class="container">
    @include('navbar.navbar-school')
      <div class="row">
                    <ul class="nav nav-line-bottom">
              <li class="nav-item">
                <a href="{{route('schools.show',$school->id)}}" class="nav-link ">About Us</a>
              </li>
              <li class="nav-item">
              
                <a href="{{route('schools.reviews',$school->id)}}" class="nav-link ">Review <span class="text-inherit">({{\App\Models\SchoolReview::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('class.list',$school->id)}}" class="nav-link">Classes <span class="text-inherit">({{\App\Models\ClassSchool::where('school_id',$school->id)->count()}})</span></a>
              </li>
              <li class="nav-item">
                <a href="{{route('schools.photo',$school->id)}}" class="nav-link">Photos</a>
              </li>
               <li class="nav-item">
                <a href="{{route('class.create',$school->id)}}" class="nav-link ">Create Class</a>
              </li>
                            <li class="nav-item">
                <a href="{{route('class.pending',$school->id)}}" class="nav-link active">Pending</a>
              </li>
            </ul><br><br><br><br><br>
        <div class="col-md-12">
          <!-- Tab content -->
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
 
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              <div class="spinner-border text-dark" role="status" wire:loading>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
<div class="row" wire:loading.attr='hidden'>
                    @forelse($courses as $course)

                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="{{route('courses.show',App\Models\Course::find($course->id))}}" class="card-img-top"><img src="{{asset('storage/'.$course->photo)}}" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 "><a href="{{route('courses.show',App\Models\Course::find($course->id))}}" class="text-inherit">{{$course->title}}</a></h4>
                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($course->title)}}</li>
                                    <li class="list-inline-item">
                          @if($course->level == 'Beginners')                            
                        <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                            
                    @elseif($course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                    @elseif($course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                         
                                    </li>
                                </ul>
                                <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($course->id)[1]}})</span>
                                </div>
                                
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{App\Models\Course::find($course->id)->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                    
                                        <span>{{App\Models\Course::find($course->id)->user->name}}</span>
                                    </div>
                                    <div class="col-12">
                                    <button wire:click='approved({{$course->de}})' type="button" wire:loading.attr='disabled' class="btn-sm btn-{{$course->pending ==1 ? 'success' : 'warning' }}">@if($course->pending ==1)  <i class="fe fe-thumbs-up"></i> @else  <i class="fe fe-thumbs-down"></i> @endif</button>
                                        <i class="badge bg-primary">{{$course->name}}</i>
                                        <button wire:click='trash({{$course->id}})' class="btn-sm btn-danger" ><i class="fe fe-trash"></i></button>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
@empty
<span>empty</span>
@endforelse

</div>
                                {{$courses->links()}}
</div>
</div>
</div>
</div>
</div>
</div>
