@extends('layouts.layouts.app')
<base href="/public">
@section('content')

<!-- Card -->
  <div class="card mb-4 ">
    <!-- Card Header -->
    <div class="card-header">
      <h4 class="mb-0">General Settings</h4>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form method="post" action="{{route('admin.saveSettings')}}" enctype="multipart/form-data">
      @csrf
        <div class="mb-3 mb-4">
            <label for="siteName" class="form-label">Site Name
  <small class="text-muted">(Enter your website name below)</small>
  </label>
  <input value="{{$site->name}}" name='name' class="form-control" id="siteName" placeholder="Your Site " type="text" required="">
   <small>The site title might be the name of your company or
                      organization, or a brief description of the organization, or a combination of the two.
  </small>
  @error('name')<span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="mb-3 mb-4">
        <label for="siteDescription" class="form-label">Site Description
      <small class="text-muted">(Enter your website description below)</small>
    </label>
  <textarea name='description' class="form-control" id="siteDescription" placeholder="Site Description " required="" rows="4"> {{$site->description}}</textarea>
   <small>The site title might be the name of your company or
     organization, or a brief description of the organization, or a combination of the two.
   </small>
   @error('description')<span class="text-danger">{{$message}}</span> @enderror
     </div>
          <div class="mb-3">
         <p class="mb-1 text-dark">Application ressource</p>
         <div class="input-group mb-1">
             <input type="file" name='ressource' accept=".zip,.rar" class="form-control" id="inputr" >
             <label class="input-group-text" for="inputr">Upload</label>
           </div>
           <small class="text-muted">(Upload ressource for instructors )</small>
             <p>Path : ({{$site->ressource}})</p>
           @error('ressource')<span class="text-danger">{{$message}}</span> @enderror
     </div>
     <div class="mb-3">
         <p class="mb-1 text-dark">Logo</p>
         <div class="input-group mb-1">
             <input type="file" name='logoPath' accept=".svg" class="form-control" id="inputLogo" >
             <label class="input-group-text" for="inputLogo">Upload</label>
           </div>
           <small class="text-muted">(Upload your website logo - 120 x 40 )</small>
             <img class="avatar-sm" src="{{$site->logoPath}}">
           @error('logoPath')<span class="text-danger">{{$message}}</span> @enderror
     </div>
   <div class="mb-3">
       <p class="mb-1 text-dark">Favicon <small class="text-muted">(Upload your website favicon - Standard for most
      desktop browsers. 32×32)</small></p>
       <div class="input-group mb-1">
     <input type="file" class="form-control" id="inputfavicon" name='faviconPath' accept=".ico">
     <label class="input-group-text" for="inputfavicon">Upload</label>
         </div>
         @error('faviconPath')<span class="text-danger">{{$message}}</span> @enderror
         <img class="avatar-sm" src="{{$site->faviconPath}}">
   </div>
<button type="submit" class="btn btn-primary" >
  Update Settings </button>
 </form>
 </div>
 </div>
 
@endsection