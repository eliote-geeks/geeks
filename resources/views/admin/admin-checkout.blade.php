@extends('layouts.layouts.app')
<base href="/public">
@section('content')
<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold"> Checkout </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#">Payments </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Checkout
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- row -->
        <div class="row">
          <div class="col-xl-8 col-lg-7">
            <!-- stepper -->
            <div >
              <!-- card -->
              <div class="card">
                <div class="card-header">
                  <form method="POST" action="{{route('form.payouts',$user)}}">
                  @csrf
                      <!-- Content one -->
                      <div >
                        <!-- heading -->
                        <div class="mb-5">
                          <h3 class="mb-1">Billing Information</h3>
                          <p class="mb-0">Please fill all information below
                          </p>
                        </div>
                        <!-- row -->
                        <div class="row">
                          <!-- input -->
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="firstName">First Name</label>
                            <input type="text" value="{{$user->first_name}}" class="form-control" placeholder="Enter first name" id="firstName">
                          </div>
                          <!-- input -->
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" class="form-control" value="{{$user->last_name}}" placeholder="Enter last name" id="lastName">
                          </div>
                          <!-- input -->
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="email">Email (Optional)</label>
                            <input type="email" class="form-control" value="{{$user->email}}" placeholder="Enter email address" id="email">
                          </div>
                          <!-- input -->
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="text" class="form-control" value="{{$user->number}}" placeholder="Enter phone number" id="phone">
                          </div>
                          <!-- input -->
                          <div class="mb-3 col-12">
                            <label class="form-label" for="address">Address1</label>
                            <input type="text" class="form-control" placeholder="Enter address" id="address" value="{{$user->address1}}">
                          </div>
                          <!-- input -->
                          <div class="mb-3 col-12">
                            <label class="form-label" for="town">Address2</label>
                            <input type="text" class="form-control" placeholder="Enter City" id="town" value="{{$user->address2}}">
                          </div>
                          <!-- input -->
                          <div class="mb-3 col-12">
                            <label class="form-label" for="state">State</label>
                            <input type="text" class="form-control" placeholder="Enter State" id="state" value="{{$user->state}}">
                          </div>
                          <!-- select -->
                          <div class="mb-3 col-12">
                            <label class="form-label">Country</label>
                            <input type="text" class="form-control " value="{{$user->country}}">
                          </div>
                        </div>


                          <div class="mb-3 col-12">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" class="form-control bg-success">
                          </div>
                        <!-- Button -->
                        <div class="d-flex justify-content-end">
                          <button class="btn btn-primary" type="submit">
                            Proceed to Payout <i class="fe fe-shopping-bag ms-1"></i>
                          </button>
                        </div>
                      </div>
                      <!-- Content two -->

                    </form>
                  
                </div>
                
              </div>





            </div>

          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="card mt-4 mt-lg-0">
              <div class="card-body">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                  <h4 class="mb-1">Informations instructors</h4>                  
                </div>

                <hr class="my-3">

              </div>
              <div class="card-body border-top pt-2">
                <ul class="list-group list-group-flush mb-0 ">
                  <li class="d-flex justify-content-between list-group-item px-0">
                    <span>Earns This Month</span>
                    <span class="text-dark fw-semi-bold">${{round($amount,2)}}</span>
                  </li>

                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>

      @endsection