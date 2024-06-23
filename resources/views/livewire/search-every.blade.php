
    {{-- The best athlete wants his opponent at his best. --}}

    <div class="py-lg-15 py-10 bg-colors-gradient">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6  col-12 ">
          <!-- caption-->
          <h1 class="fw-bold mb-1 display-3">How can we help you?</h1>
          <!-- para -->
          <p class="mb-5 text-dark ">Have questions? Search through on {{\App\Models\Site::first()->name}}</p>
          <div class="pe-md-6">
            <!-- input  -->
            <form class="d-flex align-items-center">
              <span class="position-absolute ps-3">
                <i class="fe fe-search text-muted"></i>
              </span>
              <!-- input  -->
              <input wire:model='search' type="search" class="form-control ps-6 border-0 py-3 smooth-shadow-md"
                placeholder="Enter a student, course or instructor">
            </form>
          </div>
          @if($search != null)
          <span wire:loading class=" mt-2 d-block">" {{$search}} "</span>
          <hr>
          <span class="mt-w d-block">Courses</span>
          <hr>
          @forelse ($courses as $course)
          <span class=" mt-2 d-block"><a href="{{route('courses.show',$course->id)}}">{{$course->title}}</a></span>    
          @empty
          no courses found
          @endforelse
          <hr>
          <span class="mt-w d-block">User</span>
          <hr>
          @forelse ($users as $user)
          <span class=" mt-2 d-block"><a @if($user->user_type == 'App\Models\Instructor')  href="{{route('instructor.profile',$user->id)}} " @else href="{{route('student.profile',$user->id)}} " @endif>{{$user->name}}</a> <small>(@if($user->user_type == 'App\Models\Instructor') Instructor @else Student @endif)</small></span>              
          @empty
          no users found
          @endforelse
          <hr>
          <span class="mt-w d-block">Schools</span>
          <hr>
          @forelse ($schools as $school)
          <span class=" mt-2 d-block"><a href="{{route('schools.show',$school->id)}}" >{{$school->title}}</a> <small>({{\App\Models\School::students($school->id)}} <i class="fe fe-users"></i>)</small></span>              
          @empty
          no schools found
          @endforelse
    @endif
        </div>
        <div class="col-md-6 col-12">
          <div class="d-flex align-items-center justify-content-end">
            <!-- img  -->
            <img src="../assets/images/svg/3d-girl-seeting.svg" alt="" class="text-center img-fluid">
          </div>
        </div>
      </div>

    </div>
  </div>

