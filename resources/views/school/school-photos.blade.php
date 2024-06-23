@extends('layouts.app')
@section('content')


  @include('navbar.navbar-school')

  <div class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- nav -->
          <div>
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
                <a href="{{route('schools.photo',$school->id)}}" class="nav-link active">Photos</a>
              </li>
                           <li class="nav-item">
                <a href="{{route('schools.instructors',$school->id)}}" class="nav-link">Instructors</a>
              </li>
              @if($school->user_id == auth()->user()->id)
               <li class="nav-item">
                <a href="{{route('class.create',$school->id)}}" class="nav-link ">Create Class</a>
              </li>
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
                }}</span></a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="row mt-6">
        <div class="col-md-12 ">
          <!-- title -->
        {{-- <div class="">
          <form >
          @csrf
          <table>
          <th>
            <td><input type="file" class="form-control" name="photo"></td>
            <td>
 
          </th>
          </table>          
          </form>
       </div> --}}
       {{-- class="dropzone mt-4 border-dashed" --}}
       @if($school->user_id == auth()->user()->id)
        <form method="POST" enctype="multipart/form-data" action="{{route('photo.store',$school->id)}}" >
          @csrf
 <div class="fallback">
    <input class="form-control" class="form-input-file "  name="photos[]" type="file" multiple/>
 </div>
         <button type="submit" class="btn btn-outline-primary form-control">Save Photos</button></td>
         @error('photos') <span class="text-danger">{{ $message }}</span> @enderror                        
</form>	
@endif
          <h2 class="mb-4">Office Photos</h2>
        </div>

        @forelse($photos as $photo)
        <div class="col-lg-3 col-md-4 col-12">
          <div class="mb-4">
            <!-- Gallery -->
            <a href="{{$photo->path}}" class="glightboxGallery"
              data-gallery="gallery1">
              <img src="{{$photo->path}}" alt="image" class="rounded-3 img-fluid">
            </a>
        @if($school->user_id == auth()->user()->id)
        <!-- Button trigger modal -->
<button type="button" class="btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-2{{$photo->id}}">
<small>Delete</small>    
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal-2{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$photo->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure ? confrim or return
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="button" href="{{route('deletePhoto',$photo->id)}}" class="btn btn-danger">Save changes</a>
            </div>
        </div>
    </div>
</div>
        @endif
          </div>
        </div>
@empty
<span>no Photo  </span>
@endforelse

      </div>
      <div class="col-lg-3 col-md-12 col-12">
  {{$photos->links()}}
      </div>
    </div>
  </div>
@endsection