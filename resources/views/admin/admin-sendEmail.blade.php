@extends('layouts.layouts.app')
<base href="/public">
@section('content')

 <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-1 h2 fw-bold text-center">Send Email</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Users</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Send Email
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>






 <!-- Card -->
  <div class="card mb-4 ">
    <!-- Card Header -->
    <div class="card-header">
      <h4 class="mb-0">Contact User in your site</h4>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form method="POST" action="{{route('sendEmailPost',$id)}}">
      @csrf
        <div class="mb-3 mb-4">
            <label for="greeting" class="form-label">Greeting
  <small class="text-muted">(Enter your Greeting salutation below)</small>
  </label>
  <input class="form-control" id="greeting" placeholder="greeting " type="text" required="" name="greeting">
   <small>The greeting might be the name of your company or
                      organization, or a brief description of the organization, or a combination of the two.
  </small>
    </div>
    <div class="mb-3 mb-4">
        <label for="siteDescription" class="form-label">Body
      <small class="text-muted">(Enter your website description below)</small>
    </label>
  <textarea class="form-control" id="siteDescription" placeholder="Site Description " required="" rows="4" name="body"></textarea>
   <small>The site title might be the name of your company or
     organization, or a brief description of the organization, or a combination of the two.
   </small>
     </div>
     <div class="mb-3">
         <p class="mb-1 text-dark">Action Text</p>
         <div class="input-group mb-1">
             <input type="text" class="form-control" id="inputLogo" name="actiontext">
             {{-- <label class="input-group-text" for="inputLogo">Upload</label> --}}
           </div>
           <small class="text-muted">(Upload your website logo - 120 x 40 )</small>
     </div>
   <div class="mb-3">
       <p class="mb-1 text-dark">Action Url <small class="text-muted">(Upload your website favicon - Standard for most
      desktop browsers. 32×32)</small></p>
       <div class="input-group mb-1">
     <input type="url" class="form-control" id="inputfavicon" name="actionurl">
     {{-- <label class="input-group-text" for="inputfavicon">Upload</label> --}}
         </div>
   </div>
   
      <div class="mb-3">
       <p class="mb-1 text-dark">EndPart <small class="text-muted">(Upload your website favicon - Standard for most
      desktop browsers. 32×32)</small></p>
       <div class="input-group mb-1">
     <input type="text" class="form-control" id="inputfavicon" name="endpart">
     {{-- <label class="input-group-text" for="inputfavicon">Upload</label> --}}
         </div>
   </div>
<button type="submit" class="btn btn-primary">
  Send Email </button>
 </form>
 </div>
 </div>





@endsection                    