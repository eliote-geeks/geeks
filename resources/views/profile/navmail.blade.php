<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
{{-- <script>
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}

                                <div class="col-xxl-2 col-xl-3 border-end">
                                    <nav class="navbar navbar-expand  p-4 navbar-mail">

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                            <ul class="navbar-nav flex-column w-100">

                                                   <li class="d-grid mb-4"><a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#composeMailModal">
                                                    Compose New Email
                                                        </a>
                                                    </li>

                                                <li class="nav-item">
                                                    <a class="nav-link @if(Request::routeIs('mail')) active @endif" aria-current="page" href="{{route('mail')}}">
                                                        <span class="d-flex align-items-center justify-content-between">
                                                <span class="d-flex align-items-center"><i class="fe fe-inbox me-2 "></i>Inbox
                                                </span>
                                                        <span>{{\App\Models\YahooMail::where('email_to',auth()->user()->id)->where('read',0)->count()}}</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Request::routeIs('sendMail')) active @endif" href="{{route('sendMail')}}">
                                                        <span class="d-flex align-items-center justify-content-between">
                                                <span class="d-flex align-items-center"><i class="fe fe-send me-2 "></i>Sent
                                                </span>
                                                        <span>{{\App\Models\YahooMail::where('author_id',auth()->user()->id)->where('read',0)->count()}}</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link @if(Request::routeIs('draftMail')) active @endif" href="mail-draft.html">

                                                        <span class="d-flex align-items-center"><i class="fe fe-mail me-2 "></i>Drafts
                                                </span>


                                                    </a>
                                                </li> --}}

                                                <li class="nav-item">
                                                    <a class="nav-link @if(Request::routeIs('listEmailSpam')) active @endif" href="{{route('listEmailSpam')}}">
                                                        <span class="d-flex align-items-center justify-content-between">
                                                <span class="d-flex align-items-center"><i class="fe fe-alert-circle me-2 "></i>Spam
                                                </span>
                                                        <span>{{\App\Models\SpamMail::where('user_id',auth()->user()->id)->count()}}</span>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link @if(Request::routeIs('listEmailArchive')) active @endif" href="{{route('listEmailArchive')}}">
                                                        <span class="d-flex align-items-center"><i class="fe fe-archive me-2 "></i>Archive &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <span>{{\App\Models\ArchiveMail::where('user_id',auth()->user()->id)->count()}}</span>
                                                </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link @if(Request::routeIs('listEmailStar')) active @endif" href="{{route('listEmailStar')}}">
                                                        <span class="d-flex align-items-center"><i class="fe fe-star me-2"></i>Starred  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <span>{{\App\Models\StarMail::where('user_id',auth()->user()->id)->count()}}</span>
                                                        
                                                        </span>

                                                    </a>
                                                </li>

                                                </ul>


                                        </div>

                                    </nav>
                                </div>
