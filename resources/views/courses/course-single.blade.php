@extends('layouts.app')
<base href="/public">
@section('content')

    {{-- @livewire('course-single') --}}


    <!-- Page header -->
    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 fw-semi-bold">{{ $course->title }}</h1>
                        <p class="text-white mb-6 lead">
                            {{ $course->short_description }}
                            {{-- <span class="avatar avatar-xs "> --}}
                            {!! \App\Models\Course::showClass($course->id) !!}
                            {{-- </span> --}}
                        </p>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('courses.enroll', $course->id) }}"
                                class="bookmark text-white text-decoration-none">
                                @if (App\Models\Enroll::where('course_id', $course->id)->where('user_id', auth()->user()->id)->get()->count() > 0)
                                    <i class="fe fe-bookmark text-white-50 me-2"></i>Remove Bookmark
                                @endif
                                @if (App\Models\Enroll::where('course_id', $course->id)->where('user_id', auth()->user()->id)->get()->count() == 0)
                                    <i class="fe fe-bookmark text-white-50 me-2">Bookmark</i>
                                @endif
                            </a>
                            @if ($course->discount_price != 0 && $course->actual_price != 0)
                                <span class="text-white ms-3"><i class="fe fe-user text-white-50"></i> {{ $buys->count() }}
                                    Enrolled </span>
                            @endif
                            <span class="ms-4">
                                @for ($k = 1; $k <= round($student_review, 0); $k++)
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                @endfor
                                @for ($k = 1; $k <= 5 - round($student_review, 0); $k++)
                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                @endfor
                                <span class="text-white">({{ number_format($s) }})</span>
                            </span>

                            @if ($course->level == 'Beginners')
                                <span class="text-white ms-4 d-none d-md-flex">
                                    <svg width="16" height="16" viewBox="0 0 16
                              16"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#000">
                                        </rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                        </rect>
                                    </svg>
                                    <span class="align-top" style="margin-top:-3px;">
                                        {{ $course->level }}
                                    </span>
                                </span>
                            @elseif($course->level == 'Intermediate')
                                <span class="text-white ms-4 d-none d-md-flex">
                                    <svg width="16" height="16" viewBox="0 0 16
                              16"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#000">
                                        </rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#000">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                        </rect>
                                    </svg>
                                    <span class="align-top" style="margin-top:-3px;">
                                        {{ $course->level }}
                                    </span>
                                </span>
                            @elseif($course->level == 'Advance')
                                <span class="text-white ms-4 d-none d-md-flex">
                                    <svg width="16" height="16" viewBox="0 0 16
                              16"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#000">
                                        </rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#000">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#000">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                        </rect>
                                    </svg>
                                    <span class="align-top" style="margin-top:-3px;">
                                        {{ $course->level }}
                                    </span>
                                </span>
                            @elseif($course->level == 'Master')
                                <span class="text-white ms-4 d-none d-md-flex">
                                    <svg width="16" height="16" viewBox="0 0 16
                              16"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#000">
                                        </rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#000">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#000">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#000">
                                        </rect>
                                    </svg>
                                    <span class="align-top" style="margin-top:-3px;">
                                        {{ $course->level }}
                                    </span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="table-tab" data-bs-toggle="pill" href="#table"
                                            role="tab" aria-controls="table" aria-selected="true">Contents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="description-tab" data-bs-toggle="pill"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="false">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review"
                                            role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="transcript-tab" data-bs-toggle="pill" href="#transcript"
                                            role="tab" aria-controls="transcript"
                                            aria-selected="false">Transcript</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="faq-tab" data-bs-toggle="pill" href="#faq"
                                            role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="table" role="tabpanel"
                                    aria-labelledby="table-tab">
                                    <!-- Card -->
                                    <div class="accordion" id="courseAccordion">
                                        <div>
                                            <!-- List group -->
                                            <ul class="list-group list-group-flush">

                                                @forelse ($lectures as $lecture)
                                                    <li class="list-group-item px-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none active"
                                                            data-bs-toggle="collapse" href="#course{{ $lecture->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="course{{ $lecture->id }}">
                                                            <div class="me-auto">
                                                                <!-- Title -->
                                                                {{ $lecture->nameField }}
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4"> <i
                                                                    class="fe fe-chevron-down fs-4"></i></span>
                                                        </a>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div hidden>

                                                            @if ($lecture->id < $pp)
                                                                {{ $pp = $lecture->id }}
                                                            @endif
                                                        </div>

                                                        <div class="collapse @if ($lecture->id == $pp) show @else ' ' @endif"
                                                            id="course{{ $lecture->id }}"
                                                            data-bs-parent="#courseAccordion">
                                                            <div class="pt-3 pb-2">

                                                                @foreach (App\Models\Lesson::where('lecture_id', $lecture->id)->where('user_id', $course->user->id)->where('course_title', $course->title)->get() as $lesson)
                                                                    {{-- <a href="{{ $lecture->id != $pp ? 'javascript:void(0)'  : route('courses.resume',$course->id)}}" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none"> --}}
                                                                    <a class="text-decoration-none mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none"
                                                                        href="@if ($lecture->id == $pp) {{ route('courses.preview', \Illuminate\Support\Facades\Crypt::encryptString($lesson->id)) }} @else javascript:void(0) @endif">
                                                                        <div class="text-truncate">
                                                                            <span
                                                                                class="icon-shape bg-light text-dark icon-sm rounded-circle me-2">
                                                                                @if ($lecture->id != $pp)
                                                                                    <i class="fe fe-lock fs-4"></i>
                                                                                @else
                                                                                    <i class="mdi mdi-play fs-4"></i>
                                                                                @endif
                                                                            </span>
                                                                            <span>{{ $lesson->title }}</span>
                                                                        </div>
                                                                        <div class="text-truncate">
                                                                            <span>{{ \App\Models\Course::lessonMin($lesson->id) }}</span>
                                                                        </div>
                                                                    </a>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                @endforelse
                                                <!-- List group item -->


                                                <li class="list-group-item px-0 pb-0">
                                                    <!-- Toggle -->
                                                    <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none"
                                                        data-bs-toggle="collapse" href="#courseEleven"
                                                        aria-expanded="false" aria-controls="courseEleven">
                                                        <div class="me-auto">
                                                            <!-- Title -->
                                                            Summary
                                                        </div>
                                                        <!-- Chevron -->
                                                        <span class="chevron-arrow ms-4">
                                                            <i class="fe fe-chevron-down fs-4"></i>
                                                        </span>
                                                    </a>
                                                    <!-- Row -->
                                                    <!-- Collapse -->
                                                    <div class="collapse" id="courseEleven"
                                                        data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2">
                                                            <p>
                                                                {{ $course->summary }}.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <h3 class="mb-2">Course Descriptions</h3>
                                        {{ $course->description }}
                                    </div>
                                </div>








                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <!-- Reviews -->
                                    <div class="mb-3">
                                        <h3 class="mb-4">How students rated this courses</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">{{ $student_review }}</h3>
                                                @for ($k = 1; $k <= round($student_review, 0); $k++)
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                @endfor
                                                @for ($k = 1; $k <= 5 - round($student_review, 0); $k++)
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                @endfor
                                                {{-- <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i> --}}
                                                <p class="mb-0 fs-6">(Based on {{ $s }} reviews)</p>
                                            </div>
                                            <!-- Progress bar -->
                                            <div class="col pt-3 order-3 order-md-2">
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star5 }}%;" aria-valuenow="90"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star4 }}%;" aria-valuenow="80"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star3 }}%;" aria-valuenow="70"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star2 }}%;" aria-valuenow="60"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-0" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $star1 }}%;" aria-valuenow="50"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <!-- Rating -->
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <span class="ms-1">{{ $star5 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star4 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star3 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star2 }}%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">{{ $star1 }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hr -->
                                    <hr class="my-5" />
                                    <div class="mb-3">
                                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                            <!-- Reviews -->
                                            <div class="mb-3 mb-lg-0">
                                                <h3 class="mb-0">Reviews</h3>
                                            </div>
                                            <div>
                                                <!-- Form -->
                                                @livewire('best-review', ['course' => $course], key($course->id))

                                            </div>

















                                        </div>
                                        <div class="tab-pane fade" id="transcript" role="tabpanel"
                                            aria-labelledby="transcript-tab">
                                            <!-- Description -->
                                            <div>
                                                <h3 class="mb-3">Transcript from the "Introduction" Lesson</h3>
                                                <div class="mb-4">
                                                    <h4>Course Overview <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:00]</a></h4>
                                                    <p class="mb-0">
                                                        My name is John Deo and I work as human duct tape at Gatsby, that
                                                        means that I do a lot of different things. Everything from dev roll
                                                        to writing content to writing code. And I used to work as an
                                                        architect at IBM. I live in Portland, Oregon.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Introduction <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:16]</a></h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Why Take This Course? <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:37]</a></h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>A Look at the Demo Application <a href="#"
                                                            class="text-dark ms-2 h4">[00:00:54]</a></h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Summary <a href="#" class="text-dark ms-2 h4">[00:01:31]</a>
                                                    </h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tab pane -->
                                        <div class="tab-pane fade" id="faq" role="tabpanel"
                                            aria-labelledby="faq-tab">
                                            <!-- FAQ -->
                                            <div>
                                                <h3 class="mb-3">Course - Frequently Asked Questions</h3>
                                                <div class="mb-4">
                                                    <h4>How this course help me to design layout?</h4>
                                                    <p>
                                                        My name is Jason Woo and I work as human duct tape at Gatsby, that
                                                        means that I do a lot of different things. Everything from dev roll
                                                        to writing content to writing code. And I used to work as an
                                                        architect at IBM. I live in Portland, Oregon.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>What is important of this course?</h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Why Take This Course?</h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                                <div class="mb-4">
                                                    <h4>Is able to create application after this course?</h4>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                    <p>
                                                        We'll dive into GraphQL, the fundamentals of GraphQL. We're only
                                                        gonna use the pieces of it that we need to build in Gatsby. We're
                                                        not gonna be doing a deep dive into what GraphQL is or the language
                                                        specifics. We're also gonna get into MDX. MDX is a way
                                                        to write React components in your markdown.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                            <!-- Card -->
                            <div class="card mb-3 mb-4">
                                <div class="p-1">
                                    <div class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-3 bg-cover"
                                        style="background-image: url({{ asset('storage/' . $course->photo) }});">
                                        <a class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none"
                                            href="{{ $course->video_url }}">
                                            <i class="fe fe-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- Price single page -->
                                    <div class="mb-3">

                                        @if ($course->discount_price == 0 && $course->actual_price == 0)
                                            <span class="text-dark fw-bold h2">Free</span>
                                        @else
                                            <span class="text-dark fw-bold h2">{{ '$' . $course->discount_price }}</span>
                                            <del class="fs-4 text-muted">{{ '$' . $course->actual_price }}</del>
                                        @endif


                                        @if ($zoneFoundator == 1)
                                            <small>This course is published in your class also is free for you !!</small>
                                        @endif

                                    </div>
                                    <div class="d-grid">
                                        @if ($zoneFoundator == 1)
                                            <a href="{{ route('courses.resume', $course->id) }}"
                                                class="btn btn-dark mb-2 ">View course learn by your students</a>
                                        @endif

                                        @if (auth()->user()->user_type == 'App\Models\Student')
                                            @if (\App\Models\Subscription::where('course_id', $course->id)->where('user_id', auth()->user()->id)->where('type', 'buy')->get()->count() > 0)
                                                @if (auth()->user()->subscription_id == null)
                                                    <a href="{{ route('courses.resume', $course->id) }}"
                                                        class="btn btn-dark mb-2 ">Start Course</a>
                                                @endif
                                            @endif

                                            @if (
                                                (auth()->user()->is_subscribed == 1 && !empty(auth()->user()->subscription_id)) ||
                                                    ($course->discount_price == 0 && $course->actual_price == 0))
                                                @if (\App\Models\Order::where('course_id', $course->id)->where('status', 'SUCCESS..')->where('user_id', auth()->user()->id)->count() == 0)
                                                    <a href="{{ route('courses.register', $course->id) }}"
                                                        class="btn btn-dark mb-2 ">register for the course</a>
                                                @endif
                                            @elseif(\App\Models\Subscription::where('course_id', $course->id)->where('user_id', auth()->user()->id)->where('type', 'buy')->count() == 0)
                                                <a href="{{ route('courses.resume', $course->id) }}"
                                                    class="btn btn-dark mb-2 ">Buy Course</a>
                                            @endif

                                            @if (auth()->user()->is_subscribed == 1 && auth()->user()->subscription_id != null)
                                            @else
                                                <a href="{{ route('courses.subscription', auth()->user()) }}"
                                                    class="btn btn-outline-dark">Get Full Access</a>
                                            @endif
                                        @elseif(auth()->user()->id == $course->user->id)
                                            <a href="{{ route('courses.resume', $course->id) }}"
                                                class="btn btn-dark mb-2 ">View Course</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="card mb-4">
                                <div>
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h4 class="mb-0">What’s included</h4>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-transparent"><i
                                                class="fe fe-play-circle align-middle me-2 text-dark"></i>{{ \App\Models\Course::hourCourse($course->title) }}
                                            hours video</li>
                                        <li class="list-group-item bg-transparent"><i
                                                class="fe fe-award me-2 align-middle text-success"></i>Certificate</li>
                                        <li class="list-group-item bg-transparent"><i
                                                class="fe fe-calendar align-middle me-2 text-info"></i>12 Article
                                        </li>
                                        <li class="list-group-item bg-transparent"><i
                                                class="fe fe-video align-middle me-2 text-secondary"></i>Watch Offline</li>
                                        <li class="list-group-item bg-transparent border-bottom-0"><i
                                                class="fe fe-clock align-middle me-2 text-warning"></i>Lifetime access</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="card">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="position-reelative">
                                            <img src="{{ $course->user->profile_photo_url }}" alt=""
                                                class="rounded-circle avatar-lg" />
                                            <a href="#" class="position-absolute  mt-1 ms-n1"
                                                data-bs-toggle="tooltip" data-placement="top" title="Verifed">
                                                {{-- <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30" class="rounded-circle d-flex"/> --}}
                                            </a>
                                        </div>
                                        <div class="ms-4">
                                            <h4 class="mb-0">{{ $course->user->name }}</h4>
                                            <p class="mb-1 fs-6">
                                                {{ $course->user->first_name . ' ' . $course->user->last_name }} </p>
                                            <span class="fs-6"><span
                                                    class="text-warning">{{ \App\Models\Instructor::rating($course->user->id) }}</span><span
                                                    class="mdi mdi-star text-warning me-2"></span>Instructor Rating</span>
                                        </div>
                                    </div>
                                    <div class="border-top row mt-3 border-bottom mb-3 g-0">
                                        <div class="col">
                                            <div class="pe-1 ps-2 py-3">
                                                <h5 class="mb-0">
                                                    {{ \App\Models\Instructor::students($course->user->id) }}</h5>
                                                <span>Students</span>
                                            </div>
                                        </div>
                                        <div class="col border-start">
                                            <div class="pe-1 ps-3 py-3">
                                                <h5 class="mb-0">{{ $course->user->courses->count() }}</h5>
                                                <span>Courses</span>
                                            </div>
                                        </div>
                                        <div class="col border-start">
                                            <div class="pe-1 ps-3 py-3">
                                                <h5 class="mb-0">
                                                    {{ \App\Models\Instructor::studentRate($course->user->id) }}</h5>
                                                <span>Reviews</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ \App\Models\Instructor::instructor($course->user->id) }}.</p>
                                    <a href="{{ auth()->user()->id != $course->user->id ? route('instructor.profile', $course->user->id) : route('dashboard') }}"
                                        class="btn btn-outline-white btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('course-rating', ['course' => $course], key($course->id))


                    {{-- @comments(['model' => $course]) @endcomments                              --}}


                    <!-- Card -->
                    <div class="pt-12 pb-3">
                        <div class="row d-md-flex align-items-center mb-4">
                            <div class="col-12">
                                <h2 class="mb-0">Related Courses</h2>
                            </div>
                        </div>
                        <div class="row">
                            @forelse($relates as $related)
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4 card-hover">
                                        <a href="{{ route('courses.show', $related) }}" class="card-img-top"><img
                                                src="{{ asset('storage/' . $related->photo) }}" alt=""
                                                class="card-img-top rounded-top-md" /></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h4 class="mb-2 text-truncate-line-2"><a
                                                    href="{{ route('courses.show', $related) }}" class="text-inherit">
                                                    {{ Str::limit($related->title, 40) }}</a></h4>
                                            <ul class="mb-3 list-inline">
                                                <li class="list-inline-item"><i
                                                        class="far fa-clock me-1"></i>{{ \App\Models\Course::hourCourse($related->title) }}
                                                </li>
                                                <li class="list-inline-item">
                                                    @if ($related->level == 'Beginners')
                                                        <span class="text-white ms-4 d-none d-md-flex">
                                                            <svg width="16" height="16"
                                                                viewBox="0 0 16
                              16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#DBD8E9"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9"></rect>
                                                            </svg>
                                                            <span class="align-top" style="margin-top:-3px;color:#000;">
                                                                {{ $related->level }}
                                                            </span>
                                                        </span>
                                                    @elseif($related->level == 'Intermediate')
                                                        <span class="text-white ms-4 d-none d-md-flex">
                                                            <svg width="16" height="16"
                                                                viewBox="0 0 16
                              16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9"></rect>
                                                            </svg>
                                                            <span class="align-top" style="margin-top:-3px;color:#000;">
                                                                {{ $related->level }}
                                                            </span>
                                                        </span>
                                                    @elseif($related->level == 'Advance')
                                                        <span class="text-white ms-4 d-none d-md-flex">
                                                            <svg width="16" height="16"
                                                                viewBox="0 0 16
                              16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#DBD8E9"></rect>
                                                            </svg>
                                                            <span class="align-top" style="margin-top:-3px;color:#000;">
                                                                {{ $related->level }}
                                                            </span>
                                                        </span>
                                                    @elseif($related->level == 'Master')
                                                        <span class="text-white ms-4 d-none d-md-flex">
                                                            <svg width="16" height="16"
                                                                viewBox="0 0 16
                              16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="7" y="5" width="2" height="9"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#000"></rect>
                                                                <rect x="11" y="2" width="2" height="12"
                                                                    rx="1" fill="#000"></rect>
                                                            </svg>
                                                            <span class="align-top" style="margin-top:-3px;color:#000;">
                                                                {{ $related->level }}
                                                            </span>
                                                        </span>
                                                    @endif

                                                </li>
                                            </ul>
                                            <div class="lh-1">

                                                <span>
                                                    @for ($k = 1; $k <= round(\App\Models\Course::rating($related->id)[0], 0); $k++)
                                                        <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    @endfor
                                                    @for ($k = 1; $k <= 5 - round(\App\Models\Course::rating($related->id)[0], 0); $k++)
                                                        <i class="mdi mdi-star me-n1 text-light"></i>
                                                    @endfor
                                                </span>
                                                <span
                                                    class="text-warning">{{ \App\Models\Course::rating($related->id)[0] }}</span>
                                                <span
                                                    class="fs-6 text-muted">({{ \App\Models\Course::rating($related->id)[1] }})</span>
                                            </div>
                                            {{-- <span class="avatar avatar-xs "> --}}
                                            {!! \App\Models\Course::showClass($related->id) !!}
                                            {{-- </span> --}}
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="{{ $related->user->profile_photo_url }}"
                                                        class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span>{{ $related->user->first_name }}
                                                        {{ $related->user->last_name }}</span>
                                                </div>

                                                <div class="col-auto">

                                                    @auth
                                                        @if (App\Models\Enroll::where('course_id', $related->id)->where('user_id', auth()->user()->id)->get()->count() > 0)
                                                            <a href="{{ route('courses.enroll', $related->id) }}"
                                                                id="reset" class="removeBookmark">
                                                                <i class="fas fa-bookmark "></i>
                                                            </a>
                                                        @endif
                                                        @if (App\Models\Enroll::where('course_id', $related->id)->where('user_id', auth()->user()->id)->get()->count() == 0)
                                                            <a href="{{ route('courses.enroll', $related->id) }}"
                                                                id="reset"
                                                                wire:click.defer='enrolled({{ $related->id }})'
                                                                class="text-dark bookmark">
                                                                <i class="fe fe-bookmark  "></i>
                                                            </a>
                                                        @endif
                                                    @endauth
                                                    @guest
                                                        <a href="{{ route('login') }}" class="text-muted bookmark">
                                                            <i class="fe fe-bookmark  "></i>
                                                        </a>
                                                    @endguest

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <span>No related courses<span>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>

        @endsection
