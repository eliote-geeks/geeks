@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')

                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-2">Linked Accounts</h3>
                            <p class="mb-0">
                                You can link your social accounts into your geeks accounts & also access your history of linked accounts and manage your accounts in this sections.
                            </p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="mb-5 d-md-flex">
                                <!-- facebook -->
                                <div>
                                    <i class="mdi mdi-facebook h1 me-3   color-facebook"></i>
                                </div>
                                <div class="mt-1">
                                    <h3 class="mb-0">Facebook</h3>
                                    @if(auth()->user()->facebook_id != null)
                                    <p>Enable one-click login and receive more personalized course recommendations.</p>
                                    <a href="" class="btn btn-primary btn-sm">Remove my Facebook Account</a>
                                    @else
                                    <p>Enable one-click login and receive more personalized course recommendations.</p>
                                    <a href="{{ url('auth/facebook') }}" class="btn btn-outline-secondary btn-sm">Link my Facebook Account</a>
                                    @endif
                                </div>
                            </div>
                            <!-- Google -->
                            <div class="mb-5 d-md-flex border-top pt-5">

                                <div>
                                    <i class="mdi mdi-google color-google h1 me-3  "></i>
                                </div>
                                <div class="mt-1">
                                    <h3 class="mb-0">Google</h3>
                                    @if(auth()->user()->google_id != null)
                                    <p>Enable one-click login and receive more personalized course recommendations.</p>
                                    <a href="" class="btn btn-primary btn-sm">Remove my Google Account</a>
                                    @else
                                    <p>Enable one-click login and receive more personalized course recommendations.</p>
                                    <a href="{{ url('auth/google') }}" class="btn btn-outline-secondary btn-sm">Link my Google Account</a>
                                    @endif
                                </div>
                            </div>

                            <!-- github -->
                            <div class="mb-5 d-md-flex border-top pt-5">

                                <div>
                                    <i class="mdi mdi-github color-github h1 me-3  "></i>
                                </div>
                                <div class="mt-1">
                                    <h3 class="mb-0">Github</h3>
                                    @if(auth()->user()->github_id != null)
                                    <p>Enable one-click login and receive more personalized course recommendations.</p>
                                    <a href="" class="btn btn-primary btn-sm">Remove my Github Account</a>
                                    @else
                                    <p>Enable one-click login and receive more personalized course recommendations.</p>
                                    <a href="{{url('auth/github')}}" class="btn btn-outline-secondary btn-sm">Link my Github Account</a>
                                    @endif
                                </div>
                            </div>

                            <!-- twitter -->
                            <div class="mb-5 d-md-flex border-top pt-5">

                                <div>
                                    <i class="mdi mdi-twitter color-twitter h1 me-3  "></i>
                                </div>
                                <div class="mt-1">
                                    <h3 class="mb-0">Twitter</h3>
                                    <p>Enable one-click login and receive more personalized course recommendations.</p>
                                    <a href="#" class="btn btn-outline-secondary btn-sm">Link my Twitter Account</a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

@endsection