                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Sales</span>
                                    </div>
                                    <div>
                                        <span class="fe fe-shopping-bag fs-3 text-dark"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    ${{number_format($amount)}}
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>+20.9$</span>
                                <span class="ms-1 fw-medium">Number of sales</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Courses</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-book-open fs-3 text-dark"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{number_format($courses->count())}}
                                </h2>
                                <span class="text-danger fw-semi-bold">{{$pending->count() -1 }}+</span>
                                <span class="ms-1 fw-medium">Number of pending</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Students</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-users fs-3 text-dark"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{number_format($students->count())}}
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>+1200</span>
                                <span class="ms-1 fw-medium">Students</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Instructor</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-user-check fs-3 text-dark"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{number_format($instructors->count())}}
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>+200</span>
                                <span class="ms-1 fw-medium">Instructor</span>
                            </div>
                        </div>
                    </div>
                </div>