<div class="mt-3 mt-lg-0 text-lg-start text-center">
                <span class="ms-2 fs-6"><span class="text-dark fw-medium">({{$students}})</span>
                  students</span>
                <span class="ms-2 fs-6"><span class="text-dark fw-medium">({{$courses}})</span>
                  Courses</span>
                <span class="ms-2 fs-6"><span class="text-dark fw-medium">11</span>
                  Hours</span>
                  &nbsp;&nbsp;&nbsp;&nbsp;
              @if(auth()->user()->user_type == 'App\Models\Student')
              @if (\App\Models\UserSchoolClass::where('user_id',auth()->user()->id)->where('entity_id',$class->id)->where('entity_type','\App\Models\ClassCourse')->count() == 0)
              <button  wire:click='follow' wire:loading.attr='disabled' class="text-muted btn-icon btn-light rounded-circle fe fe-heart fs-4"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Follow"></button>
              @else
            <button  wire:click='follow' wire:loading.attr='disabled' class="text-dark btn-icon btn-primary rounded-circle fe fe-heart fs-4"
                data-bs-toggle="tooltip" data-bs-placement="top" title="UnFollow"></button>                  
              @endif
              @endif
              <span class="dropdown ">
                <a class="text-decoration-none btn-icon btn-light rounded-circle text-muted" href="#" role="button"
                  id="shareDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fe fe-share-2 fs-4 "></i>
                </a>
                <span class="dropdown-menu" aria-labelledby="shareDropdown">
                  <span class="dropdown-header">Share</span>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-facebook dropdown-item-icon"></i>Facebook</a>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-twitter  dropdown-item-icon"></i>Twitter</a>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-linkedin dropdown-item-icon"></i>Linked In</a>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-content-copy dropdown-item-icon"></i>Copy
                    Link</a>
                </span>
              </span>
            </div>
