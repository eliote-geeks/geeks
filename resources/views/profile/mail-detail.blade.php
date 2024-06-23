@extends('layouts.app')
@section('content')

    <div id="db-wrapper" class="toggled">    
        <div id="page-content">

            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4">
                            <div class="mb-3 mb-lg-0">
                                <h1 class="mb-0 h2 fw-bold">Mail</h1>
                                <!-- Breadcrumb -->
                   <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}">Profile</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                        Mail
                        </li>
                    </ol>
                </nav>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card body -->
                            <div class="row g-0">

                            @include('profile.navmail')

                                <div class="col-xxl-10 col-xl-9 col-12">
                                    <div class="card-header p-4">

                                        <div class=" d-md-flex justify-content-between align-items-center">

                                            <div class="d-flex flex-wrap gap-2 mb-2 mb-md-0">

                                                <div class="d-flex align-items-center border px-3 py-2 rounded-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                    </div>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle text-inherit" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-xs" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="#">All</a></li>
                                                            <li><a class="dropdown-item" href="#">Read</a></li>
                                                            <li><a class="dropdown-item" href="#">Unread</a></li>
                                                            <li><a class="dropdown-item" href="#">Starred</a></li>
                                                            <li><a class="dropdown-item" href="#">Unstarred</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <a href="#" class="btn btn-outline-white btn-sm fs-5">
                                                    <i class="fe fe-rotate-cw align-middle "></i>
                                                </a>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-outline-white btn-sm  fs-5" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fe fe-more-vertical align-middle"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-xs" aria-labelledby="dropdownMenuButton2">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>



                                            </div>
                                            <div>
                                                <form>
                                                    <input type="search" class="form-control form-control-sm  " placeholder="Search Email">
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <!-- list group -->
                                        <div class="list-group list-group-flush list-group-mail ">
                                        



                                <div class="col-xxl-10 col-xl-9 col-12">
                                    <div>
                                        <!-- card header -->
                                        <div class="card-header">
                                          <div class="d-md-flex justify-content-between
                                            align-items-center">
                                            <div class="d-flex mb-3 mb-md-0">
                                              <div>
                                                <a href="{{route('mail')}}" class="btn btn-outline-white btn-sm fs-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Back to inbox">
                                                    <i class=" fe fe-arrow-left "></i></a>
                                              </div>
                                              <!-- button group -->
                                              <div class="ms-2">
                                                <div class="btn-group" role="group" aria-label="Basic
                                                  example">
                                                  <a href="{{route('archiveEmail',$mail->id)}}" class="btn btn-outline-white btn-sm fs-5"  data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><i
                                                      class=" fe fe-archive "
                                                      ></i></a>
                                                  <a href="{{route('spamEmail',$mail->id)}}" class="btn btn-outline-white btn-sm fs-5"  data-bs-toggle="tooltip" data-bs-placement="top" title="Spam"><i
                                                      class=" fe fe-alert-triangle "
                                                      ></i></a>
                                                  <a href="{{route('deleteMail',$mail->id)}}" class="btn btn-outline-white btn-sm fs-5"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                      class=" fe fe-trash-2 "
                                                      ></i></a>
                                                </div>
                                              </div>
                                              <div class="ms-2">
                                                <a href="{{route('readMail',$mail->id)}}" class="btn btn-outline-white btn-sm fs-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as unread"> <i
                                                     class=" fe fe-mail  "></i></a>
                                              </div>
                                            </div>
                                            <!-- button -->
                                            <div class="d-flex align-items-center">
                                              <div>
                                                <span>4 of 437</span>
                                              </div>
                                              <div class="ms-3">
                                                <button type="button" class="btn btn-outline-white btn-sm fs-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Newer">
                                                  <i class="fe fe-chevron-left" ></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-white btn-sm fs-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Older">
                                                  <i class="fe fe-chevron-right" ></i>
                                                </button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- card body -->
                                        <div class="card-body">
                                          <div class="d-xl-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center mb-3 mb-xl-0">
                                              <!-- img -->
                                              <div>
                                                <img src="{{\App\Models\User::find($mail->author_id)->profile_photo_url}}" alt=""
                                                  class="rounded-circle avatar-md">
                                              </div>
                                              <!-- sidebar -->
                                              <div class="ms-3 lh-1">
                                                <h5 class="mb-1">Contact For "{{\App\Models\User::find($mail->author_id)->first_name.' '.\App\Models\User::find($mail->author_id)->last_name}}"</h5>
                                                <p class="mb-0 fs-6">{{\App\Models\User::find($mail->author_id)->name}} {{\App\Models\User::find($mail->author_id)->email}}</p>
                                              </div>

                                            </div>
                                            <!-- text -->
                                            <div class="d-flex align-items-center">
                                              <div>
                                                <small class="text-muted">{{\Carbon\Carbon::parse($mail->created_at)->format('M d, Y, h:i:A')}} ({{$mail->created_at->diffForHumans()}})</small>
                                              </div>
                                              <div class="ms-2">
                                                <a href="#" class="text-muted" data-bs-toggle="tooltip"
                                                  data-bs-placement="top" title="Star"><i class="mdi
                                                    mdi-star-outline mdi-18px"></i></a>
                                                <a href="#" class="text-muted ms-1"
                                                  data-bs-toggle="tooltip" data-bs-placement="top"
                                                  title="Reply"><i class="mdi mdi-reply-outline
                                                    mdi-18px"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- text -->
                                            <div class="mt-6">
                                          {!! $mail->body !!}
                                            </div>
                                        @if($mail->path_file != null)
                                         <div class="border-top py-4 mt-6">
                                              <p><i class="mdi mdi-attachment me-2 align-middle"></i>1
                                                  Attachment</p>
                                              <div class="d-flex">
                                                {{-- <div class="d-flex align-items-center">
                                                  <img
                                                    src="../../assets/images/background/profile-bg.jpg"
                                                    alt="" width="36" height="36" class="rounded">
                                                  <div class="ms-2">
                                                    <p class="mb-0 fs-6">image-thumbnail.jpg</p>
                                                    <p class="fs-6 mb-0">15.54 KB</p>
                                                  </div>
                                                </div> --}}
                                                <div class="d-flex align-items-center ms-6">
                                                  <div class="icon-shape icon-md bg-danger text-white
                                                    rounded">
                                                    <small>PDF</small>
                                                  </div>
                                                  <div class="ms-2">
                                                    <a href="{{$mail->path_file}}" download class="mb-0 fs-6">pdf-thumbnail.jpg</a>
                                                    <p class="fs-6 mb-0">243.45 KB</p>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- card footer -->
                                        <div class="card-footer py-4 bg-white">

                                          <button class="btn btn-outline-white btn-sm fs-5 me-2 mb-2 mb-md-0"><i class="mdi
                                              mdi-reply-outline me-2"></i>Reply</button>
                                          <button class="btn btn-outline-white btn-sm fs-5 me-2 mb-2 mb-md-0"><i class="mdi
                                              mdi-reply-all-outline me-2"></i>Reply All</button>
                                          <button class="btn btn-outline-white btn-sm fs-5"><i class="mdi
                                              mdi-arrow-right-bold-outline me-2"></i>Forward</button>
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
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="mb-0">Showing 1 20 of 289</p>
                                            <div>
                                                <button type="button" class="btn btn-outline-white btn-sm fs-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Newer">
                                                    <i class="fe fe-chevron-left" ></i>
                                                  </button>
                                                  <button type="button" class="btn btn-outline-white btn-sm fs-5" data-bs-toggle="tooltip" data-bs-placement="top" title="Older">
                                                    <i class="fe fe-chevron-right" ></i>
                                                  </button>
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

  <div class="modal fade compose-mail" id="composeMailModal" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-white" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
        <form method="post" action="{{route('storeEmail')}}">
            @csrf
            <div class="border-bottom ">
            <input name="email_to" class="form-control border-0 shadow-none" type="email" placeholder="To">
        </div>
        <div class="border-bottom ">
            <input class="form-control border-0 shadow-none" type="subject" name="subject" placeholder="Subject">
        </div>
        <div>
        {{-- <textarea id="editor" class="rounded-0" name="body"> --}}
        <textarea class="form-control" name="body">

          </textarea>
        </div>
        
        </div>
        <div class="modal-footer justify-content-between">
            <div>

          <button type="submit" class="btn btn-primary btn-sm">Send</button>

          <span class="ms-4 text-muted compose-img-upload cursor-pointer" >
            <label for="file-input">
                <i class="fe fe-paperclip"></i>
              </label>

              <input id="file-input" type="file" name="path_file" onchange="loadFile(event)"/>
               <img id="output"/>



            </span>
            <span class="ms-3 text-muted compose-img-upload cursor-pointer" >
                <label for="file-input-second">
                    <i class="fe fe-image"></i>
                  </label>

                  <input id="file-input-second" type="file" name="path_file"/>



                </span>

        </div>
        </form>
        <div>
            <a href="#" class="text-muted">
                <i class="fe fe-more-vertical" data-bs-toggle="tooltip" data-bs-placement="top" title="More Actions"></i>
            </a>
            <a href="#" class="text-muted ms-2">
                <i class="fe fe-trash-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
            </a>
        </div>
        </div>
      </div>
    </div>
  </div>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endsection


