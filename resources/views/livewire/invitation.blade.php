
    
      <div class="col-lg-9 col-md-8 col-12">
        <div class="col-md-12 ">
          <!-- title -->
          <h2 class="mb-4">{{$classes->count()}} classes
          </h2>

@forelse($classes as $class)
          <!-- card -->
          <div class="card card-bordered  mb-4 card-hover cursor-pointer">
            <!-- card body -->
            <div class="card-body">
              <div>
                <div class="d-xl-flex">
                  <div class="mb-3 mb-md-0">
                    <!-- Img -->

                    <img src="{{$class->logo}}" alt=""
                      class="icon-shape border rounded-circle">
                  </div>
                  <!-- text -->
                  <div class="ms-xl-3  w-100 mt-3 mt-xl-1">
                    <div class="d-flex justify-content-between mb-4">
                      <div>
                        <h3 class="mb-1 fs-4"><a href="{{route('class.show',$class->id)}}" class="text-inherit">{{$class->name}}</a> </h3>
                        <div>
                          {{-- <span>at {{$class->school->title}} </span> --}}
                          <span class="text-dark ms-2 fw-medium">({{\App\Models\SchoolReview::rating($class->school_id)[0]}}) <svg xmlns="http://www.w3.org/2000/svg" width="10"
                              height="10" fill="currentColor" class="bi bi-star-fill text-warning align-baseline"
                              viewBox="0 0 16 16">
                              <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>

                          </span><span class="ms-0">({{\App\Models\SchoolReview::rating($class->school_id)[1]}} Reviews)</span>
                        </div>
                      </div>
                      <div>
                      <button wire:loading.attr='disabled' type="button" wire:click='approved({{$class->id}})' class="btn btn-{{$class->stat==1 ? 'success' : 'danger'}}" ><i class="fe fe-{{$class->stat==1 ? 'thumbs-up' : 'thumbs-down'}}">
                        
                        </i>
                    </button>
                      </div>

                    </div>
                    <div>
                      <div class="d-md-flex justify-content-between ">
                        <div class="mb-2 mb-md-0">
                          <span class="me-2"> <i class="fe fe-briefcase text-muted"></i><span class="ms-1 "> {{\App\Models\ClassInstructor::where('class_id',$class->id)->where('status',1)->count()}}
                              Instructors</span></span>
                          <span class="me-2">
                            <i class="fe fe-dollar-sign text-muted"></i><span class="ms-1 ">{{$class->type}}</span></span>
                          <span class="me-2">
                            {{-- <i class="fe fe-map-pin text-muted"></i><span class="ms-1 ">{{$class->user->name}}</span></span> --}}
                        </div>
                        <div>
                          {{-- <i class="fe fe-clock text-muted"></i> <span>{{$class->created_at->diffForHumans()}}</span> --}}
                        </div>
                      </div>
                    </div>
                  </div>


                </div>

              </div>
            </div>
          </div>
@empty
@endforelse
          <!-- pagination -->
         
            {{$classes->links()}}


        </div>
      </div>
    </div>
  </div>

