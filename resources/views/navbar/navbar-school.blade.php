      <style>
#google-translate-container {
  float: right;
  padding: 2px 4px 0px 0px;
}

.goog-te-combo,
.goog-te-banner *,
.goog-te-ftab *,
.goog-te-menu *,
.goog-te-menu2 *,
.goog-te-balloon * {
  font-family: "poppins";
  font-size: 9pt;
  background-image: url({{\App\Models\Site::first()->logoPath}});
  background-repeat: no-repeat;
  text-indent: 20px;
  background-color: #fff;
  color: #000 !important;
}

.goog-logo-link {
  display: none !important;
}

.goog-te-gadget {
  color: transparent !important;
}

.goog-te-gadget .goog-te-combo {
  margin: 2px 0 !important;
}

</style>
      <div class="py-20" style="
  background: url(../../assets/images/background/company-bg.jpg) no-repeat;
  background-position: center; background-size: cover;
"></div>
  <!-- pageheader -->
<div>
      <!-- container -->
    <div class="container">
        <div class="row align-items-center">
            <div class=" col-12">
                <div class="d-md-flex align-items-center">
                    <div class="position-relative mt-n5">
                          <!-- img -->
                        <img src="{{$school->logo}}" alt="" class=" rounded-3 border"> ({{\App\Models\School::students($school->id)}}) <i class="fe fe-users"></i>

                    </div>

                        <div class="w-100 ms-md-4 mt-4">
                            <div class="d-flex justify-content-between">
                              <div>
                                    <!-- heading -->
                                <h1 class="mb-0 ">{{$school->title}}
                                </h1>

                                <div>
  <!-- icon -->
                                    <span class="text-dark fw-medium">{{\App\Models\SchoolReview::rating($school->id)[0]}} <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill text-warning align-baseline" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                      </svg>
  <!-- text -->
                                    </span><span class="ms-0">({{\App\Models\SchoolReview::where('school_id',$school->id)->count()}} Reviews)</span>
                                  </div>
                              </div>
                              <div>
                                    <!-- button -->

                                  {{-- @if($school->user_id == auth()->user()->id) @livewire('follow',['school' => $school], key($school->id)) @endif --}}
                                
                              </div>
                              </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>