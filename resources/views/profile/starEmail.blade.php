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
                        Spams
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
                                                        {{-- <input class="form-check-input" type="checkbox" value="" id="checkAll"> --}}
                                                    </div>
                                                    <div class="dropdown">
                                                        {{-- <a href="#" class="dropdown-toggle text-inherit" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                                                        </a> --}}
                                                        {{-- <ul class="dropdown-menu dropdown-menu-xs" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="#">All</a></li>
                                                            <li><a class="dropdown-item" href="#">Read</a></li>
                                                            <li><a class="dropdown-item" href="#">Unread</a></li>
                                                            <li><a class="dropdown-item" href="#">Starred</a></li>
                                                            <li><a class="dropdown-item" href="#">Unstarred</a></li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                                {{-- <a href="#" class="btn btn-outline-white btn-sm fs-5">
                                                    <i class="fe fe-rotate-cw align-middle "></i>
                                                </a> --}}
                                                {{-- <div class="dropdown">
                                                    <a href="#" class="btn btn-outline-white btn-sm  fs-5" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fe fe-more-vertical align-middle"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-xs" aria-labelledby="dropdownMenuButton2">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </div> --}}



                                            </div>
                                            <div>
                                                <form>
                                                    <input type="search" class="form-control form-control-sm  " placeholder="Search Email" >                                                    
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                        <!-- list group -->
                                        <div class="list-group list-group-flush list-group-mail ">
                                        @forelse ($mails as $mail)
                                            
                                        
                                            <!-- list group itme -->
                                            <div class="list-group-item list-group-item-action px-4 list-mail {{\App\Models\YahooMail::find($mail->mail_id)->read == '0' ? 'bg-light' : ''}}">
                                                <div class="d-flex align-items-center">
                                                    <!-- checkbbox -->
                                                    <div class="me-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="listOne">

                                                        </div>
                                                    </div>
                                                    <!-- rating -->
                                                    <div class="me-4">
                                                    @if(\App\Models\StarMail::where('mail_id',\App\Models\YahooMail::find($mail->mail_id)->id)->count() > 0)
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    @endif
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <!-- title -->
                                                        <div class="list-title" >
                                                            <a class="fw-semi-bold text-dark" href="{{route('mailDetails',\App\Models\YahooMail::find($mail->mail_id)->id)}}">{!!\Str::title(\App\Models\YahooMail::find($mail->mail_id)->subject)!!}</a>
                                                        </div>
                                                        <!-- text -->
                                                        <div class=" me-6 w-xxl-50 w-lg-20 w-md-10 w-5">
                                                            <a href="{{route('mailDetails',\App\Models\YahooMail::find($mail->mail_id)->id)}}" >  <p class="mb-0 fw-semi-bold text-dark list-text"> {{\Str::limit(\App\Models\YahooMail::find($mail->mail_id)->body,400)}} </p></a>
                                                        </div>
                                                        <!-- badge -->
                                                        <div class="list-badge d-none d-lg-block">
                                                        @if(\App\Models\User::find(\App\Models\YahooMail::find($mail->mail_id)->author_id)->user_type == 'App\Models\Instructor')
                                                            <span class="badge bg-danger"> Important</span>
                                                        @endif
                                                        </div>

                                                    <!-- time -->
                                                    <div class="list-time">
                                                        <p class="mb-0">{{\Carbon\Carbon::parse(\App\Models\YahooMail::find($mail->mail_id)->created_at)->format('h:i a')}}</p>
                                                    </div>
                                                </div>
                                                </div>

                                               <!-- mail action -->
                                                <div class="actions-mail">
                                                      <a href="{{route('archiveEmail',\App\Models\YahooMail::find($mail->mail_id)->id)}}">  <span class="fe fe-archive" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive">

                                                        </span>
                                                    </a>
                                                    <a href="{{route('deleteMail',\App\Models\YahooMail::find($mail->mail_id)->id)}}">
                                                        <span class="fe fe-trash-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">

                                                        </span>
                                                        </a>
                                                        <a href="{{route('mailDetails',\App\Models\YahooMail::find($mail->mail_id)->id)}}">
                                                        <span class="fe fe-mail" data-bs-toggle="tooltip" data-bs-placement="top" title="Read">

                                                        </span>
                                                        </a>
                                                        <a href="{{route('starEmail',\App\Models\YahooMail::find($mail->mail_id)->id)}}}">
                                                        <span class="fe fe-star" data-bs-toggle="tooltip" data-bs-placement="top" title="star Email">

                                                        </span>
                                                        </a>


                                                </div>





                                            </div>
                                                                                    @empty

                                        <div class="text-center py-16">
                    <img class="img-fluid mb-3" src="../../assets/images/svg/draft.svg">
                    <p>There is no conversation</p>
                                        </div>
                                        @endforelse
                                            </div>


                                                </div>


                                                    </div>









                                                    </div>




                                                        </div>

                                                        </div>



                                        </div>

                                    </div>
                                    {{$mails->links()}}
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
        <form method="post" action="{{route('storeEmail')}}" runat="server" autocomplete="off" enctype="multipart/form-data">
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