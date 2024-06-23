<div>
<div class="mb-4">
<input type="search" class="form-control" placeholder="Search Students" wire:model='search' />
</div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if ($search != null)
@forelse($students_search as $student)
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="position-relative">
                                                        <img src="{{$student->profile_photo_url}}" class="rounded-circle avatar-xl mb-3" alt="" />
                                                        <a href="#" class="position-absolute mt-10 ms-n5">
                                                            <span class="status bg-success"></span>
                                                        </a>
                                                    </div>
                                                    <h4 class="mb-0">{{$student->name}}</h4>
                                                    <p class="mb-0">
                                                        <i class="fe fe-map-pin me-1 fs-6"></i>{{$student->country}}<br>
                                                        <i class="fe fe-map-pin me-1 fs-6"></i>{{$student->state}}
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                    <span>Payments</span>
                                                    <span class="text-dark">${{\App\Models\Student::payments($student->id)}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2">
                                                    <span>Joined at</span>
                                                    <span> {{\Carbon\Carbon::parse($student->created_at)->format('d, M Y')}} </span>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <span>Courses</span>
                                                    <span class="text-dark"> {{\App\Models\Student::courseUsers($student->id)}} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <span>No student yet!!</span>
@endforelse
<hr>
<hr>
<hr>
<hr>
@endif
</div>
