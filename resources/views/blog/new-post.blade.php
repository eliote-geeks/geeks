@extends('layouts.layouts.app')
<base href="/public">
@section('content')

            <div class="container-fluid p-4">
                <div class="row">
                  <!-- Page header -->
                  <div class="col-lg-12 col-md-12 col-12">
                    <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                        <h1 class="mb-1 h2 fw-bold">Add New Post</h1>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                              <a href="admin-dashboard.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                              Add New Post
                            </li>
                          </ol>
                        </nav>
                      </div>
                      <div>
                        <a href="#" class="btn btn-outline-white">Back to All Post</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card border-0 mb-4">
                      <!-- Card header -->
                      <div class="card-header">
                        <h4 class="mb-0">Create Post</h4>
                      </div>
                      <!-- Card body -->
                      <div class="card-body">
                        <button type="button" class="btn btn-outline-white mb-1 mb-md-0">
                          <i class="fe fe-image me-1"></i>
                          Photo
                        </button>
                        <button type="button" class="btn btn-outline-white mb-1 mb-md-0">
                          <i class="fe fe-video me-1"></i>
                          Video
                        </button>
                        <button type="button" class="btn btn-outline-white">
                          Quote
                        </button>
                        <button type="button" class="btn btn-outline-white">
                          <i class="fe fe-link me-1"></i>
                          Link
                        </button>
                        <form action="#" class="dropzone mt-4 border-dashed rounded-2 min-h-0">
                          <div class="fallback">
                            <input name="file" type="file" multiple />
                          </div>
                        </form>
                        <div class="mt-4">
                          <form>
                            <!-- Form -->
                            <div class="row">
                              <!-- Date -->
                              <div class="mb-3 col-md-4">
                                <label for="selectDate" class="form-label">Date</label>
                                <input type="text" id="selectDate" class="form-control text-dark flatpickr"
                                  placeholder="Select Date" />
                              </div>
                              <div class="mb-3 col-md-9">
                                <!-- Title -->
                                <label for="postTitle" class="form-label">Title</label>
                                <input type="text" id="postTitle" class="form-control text-dark" placeholder="Post Title" />
                                <small>Keep your post titles under 60 characters. Write
                                  heading that describe the topic content.
                                  Contextualize for Your Audience.</small>
                              </div>
                              <!-- Slug -->
                              <div class="mb-3 col-md-9">
                                <label for="basic-url" class="form-label">Slug</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                                  </div>
                                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                                    placeholder="post-title" />
                                </div>
                                <small>Field must contain an unique value</small>
                              </div>
                              <!-- Excerpt -->
                              <div class="mb-3 col-md-9">
                                <label for="Excerpt">Excerpt</label>
                                <textarea rows="3" id="Excerpt" class="form-control text-dark"
                                  placeholder="Excerpt"></textarea>
                                <small>A short extract from writing.</small>
                              </div>
                              <!-- Category -->
                              <div class="mb-3 col-md-9">
                                <label class="form-label">Category</label>
                                <select class="selectpicker" data-width="100%">
                                  <option value="">Course</option>
                                  <option value="Post Category">
                                    Post Category
                                  </option>
                                  <option value="Workshop">Workshop</option>
                                  <option value="Marketing">Marketing</option>
                                </select>
                              </div>
                            </div>
                          </form>
                        </div>
                        <!-- Editor -->
                        <div class="mt-2 mb-4">
                          <div id="editor">
                            <br />
                            <h4>One Ring to Rule Them All</h4>
                            <br />
                            <p>
                              Three Rings for the
                              <i> Elven-kingsunder</i> the sky, <br />
                              Seven for the <u>Dwarf-lords</u> in halls of stone,
                              Nine for Mortal Men, <br />
                              doomed to die, One for the Dark Lord on his dark
                              throne. <br />
                              In the Land of Mordor where the Shadows lie.
                              <br />
                              <br />
                            </p>
                            <p>
                              One Ring to
                              <b>rule</b> them all, <br />
                              One Ring to find them, <br />
                              One Ring to bring them all and in the darkness bind
                              them. <br />
                              In the Land of Mordor where the Shadows lie.
                            </p>
                            <p>
                              <br />
                            </p>
                          </div>
                        </div>
                        <!-- button -->
                        <a href="#" class="btn btn-primary"> Publish </a>
                        <a href="#" class="btn btn-outline-white">
                          Save to Draft
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card mt-4 mt-lg-0 mb-4">
                      <!-- Card Header -->
                      <div class="card-header d-lg-flex">
                        <h4 class="mb-0">Post Info</h4>
                      </div>
                      <!-- List Group -->
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <span class="text-body">Post ID</span>
                          <h5>8693637308</h5>
                        </li>
                        <li class="list-group-item">
                          <span class="text-body">Status</span>
                          <h5>
                            <span class="badge-dot bg-success d-inline-block me-1"></span>Published (unsaved changes)
                          </h5>
                        </li>
                        <li class="list-group-item">
                          <span class="text-body">Created by</span>
                          <div class="d-flex mt-2">
                            <img src="../../assets/images/avatar/avatar-1.jpg" alt="" class="avatar-sm rounded-circle" />
                            <div class="ms-2">
                              <h5 class="mb-n1">Geeks Courses</h5>
                              <small>Admin</small>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <span class="text-body">Created at</span>
                          <h5>Jul 30, 2:21 PM</h5>
                        </li>
                        <li class="list-group-item">
                          <span class="text-body">First published at</span>
                          <h5>Jul 30, 2:21 PM</h5>
                        </li>
                        <li class="list-group-item">
                          <span class="text-body">Last update</span>
                          <h5>Aug 31, 12:21 PM</h5>
                        </li>
                        <li class="list-group-item">
                          <span class="text-body">Last Published</span>
                          <h5>Aug 31, 12:21 PM</h5>
                        </li>
                      </ul>
                      <!-- Card -->
                    </div>
                    <div class="card mb-4">
                      <!-- Card Header -->
                      <div class="card-header d-lg-flex">
                        <h4 class="mb-0">Actions</h4>
                      </div>
                      <!-- List group -->
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <span class="text-body">Unpublish</span>
                          <a href="#" class="text-inherit"><i class="fe fe-x-circle fs-4"></i></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <span class="text-body">Duplicate</span>
                          <a href="#" class="text-inherit"><i class="fe fe-copy fs-4"></i></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <span class="text-body">Delete</span>
                          <a href="#"><i class="fe fe-trash text-danger fs-4"></i></a>
                        </li>
                      </ul>
                    </div>
                    <!-- Card  -->
                    <div class="card">
                      <!-- Card header -->
                      <div class="card-header d-lg-flex">
                        <h4 class="mb-0">Revision History</h4>
                      </div>
                      <!-- List group -->
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <div>
                            <h5 class="mb-0">Aug 31, 12:21 PM</h5>
                            <span class="text-body">Geeks Coures</span>
                          </div>
                          <div>
                            <span class="badge bg-success badge-pill">Published</span>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>





@endsection