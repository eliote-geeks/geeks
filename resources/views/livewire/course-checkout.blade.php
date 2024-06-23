  <div class="py-lg-6 py-4 bg-dark">
    <div class="py-lg-6 py-4 bg-dark">

    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div>
            <h1 class="text-white display-4 mb-0">Checkout Page</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-12">
          <!-- Card -->
          <div class="card  mb-4">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Billing Address</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- Form -->
              <form class="row" method="POST" action="{{route('courses.checkout')}}"> 
                    @csrf
                	<!-- First name  -->
                <div class="mb-3 col-12 col-md-6">
                  <label class="form-label" for="fname">First Name</label>
                  <input  wire:model="first_name"  type="text" id="fname" class="form-control" placeholder="First Name" required>
                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                	<!-- Last name  -->
                <div class="mb-3 col-12 col-md-6">
                  <label class="form-label" for="lname">Last Name</label>
                  <input type="text" wire:model="last_name" id="lname" class="form-control" placeholder="Last Name" required>
                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                	<!-- Phone number  -->
                <div class="mb-3 col-12 col-md-12">
                  <label class="form-label" for="phone">Phone Number <span class="text-muted">(Optional)</span></label>
                  <input wire:model="number"  type="text" id="phone" class="form-control" placeholder="Phone" required>
                        @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                	<!-- Address  -->
                <div class="mb-3 col-12 col-md-12">
                  <label class="form-label" for="address">Address Line 1</label>
                  <input wire:model="address1" type="text" id="address"  class="form-control" placeholder="Address" required>
                   @error('address1') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                	<!-- Address  -->
                <div class="mb-3 col-12 col-md-12">
                  <label class="form-label" for="address2">Address Line 2 <span class="text-muted">(Optional)</span></label>
                  <input type="text" wire:model="address2" id="address2" class="form-control"  placeholder="Address">
                @error('address2') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                	<!-- State -->
                    	<div class="mb-3 col-12 col-md-4">
										<label for="country" class="form-label">Country</label>
										<select  id="country"  class="form-control"  wire:model="country" date-width="100%">
								            <option  selected disabled>select country</option>
										</select>
                                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<!-- Country -->
									<div class="mb-3 col-12 col-md-4">
								
								<label class="form-label" for="state">State</label>
								<span id="state-code"><input wire:model='state' type="text" class="form-control"  id="state">
								</span>
								<span>Please your state is  <b>{{auth()->user()->state}}</b></span>
									</div>

                	<!-- Zip code  -->
                <div class="mb-3 col-12 col-md-4">
                  <label class="form-label" for="zipCode">Zip/Postal Code</label>
                  <input type="text" wire:model="zip"  id="zipCode" class="form-control" placeholder="Zip" required>
                    @error('zip') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </form>
            </div>
          </div>
          <!-- Card -->
          <div class="card  mb-3 mb-lg-0">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Payment Method</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
<div class="d-inline-flex ">
              <div class="form-check me-3  " hidden>
                <input type="radio" id="cardRadioone" name="cardRadioone" class="form-check-input" >
                <label class="form-check-label " for="cardRadioone">Credit
                    or Debit card</label>
              </div>
              <!-- Radio -->
              <div class="form-check">
                <input type="radio" id="cardRadioTwo" name="cardRadioone" class="form-check-input" checked>
                <label class="form-check-label" for="cardRadioTwo">PayPal</label>
              </div>
            </div>
              <!-- Form -->
              <form class="row " id="cardpayment" style="display:none;">
                <!-- Card number -->
                <div class="mb-3 mt-4 col-12">
                  <!-- Card Number -->
                  <label class="d-flex justify-content-between align-items-center form-label" for="cc-mask">Card
                    Number <span><i class="fab fa-cc-amex me-1  text-dark"></i><i
                        class="fab fa-cc-mastercard me-1  text-dark"></i> <i
                        class="fab fa-cc-discover me-1  text-dark"></i> <i
                        class="fab fa-cc-visa  text-dark"></i></span></label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="cc-mask" data-inputmask="'mask': '9999 9999 9999 9999'"
                    inputmode="numeric" placeholder="xxxx-xxxx-xxxx-xxxx" required />
                    <span class="input-group-text" id="basic-addon2"><i class="fe fe-lock "></i></span>

                  </div>
                  <small class="text-muted">Full name as displayed on card.</small>
                </div>
                <!-- Month -->
                <div class="mb-3 col-12 col-md-4">
                  <label class="form-label">Month</label>
                  <select class="selectpicker" data-width="100%">
                    <option value="">Month</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="Sep">Sep</option>
                    <option value="Oct">Oct</option>
                  </select>
                </div>
                <!-- Year -->
                <div class="mb-3 col-12 col-md-4">
                  <label class="form-label">Year</label>
                  <select class="selectpicker" data-width="100%">
                    <option value="">Year</option>
                    <option value="June">2018</option>
                    <option value="July">2019</option>
                    <option value="August">2020</option>
                    <option value="Sep">2021</option>
                    <option value="Oct">2022</option>
                  </select>
                </div>
                <!-- CVV Code -->
                <div class="mb-3 col-12 col-md-4">
                  <label for="cvv" class="form-label">CVV Code <i class="fe fe-help-circle ms-1 fs-6" data-bs-toggle="tooltip"
                      data-placement="right"
                      title="A 3 - digit number, typically printed on the back of a card."></i></label>
                  <input type="password" class="cc-inputmask form-control" name="cvv" id="cvv"  placeholder="xxx"
                    maxlength="3">
                </div>
                <!-- Name on card -->
                <div class="mb-3 col-12">
                  <label for="nameoncard" class="form-label">Name on Card</label>
                  <input id="nameoncard" type="text" class="form-control" name="nameoncard" placeholder="Name" required>
                </div>
                <!-- Country -->
                <div class="mb-3 col-6">
                  <label class="form-label">Country</label>
                  <select class="selectpicker" data-width="100%">
                    <option value="">India</option>
                    <option value="uk">UK</option>
                    <option value="usa">USA</option>
                  </select>
                </div>
                <!-- Zip Code -->
                <div class="mb-3 col-6">
                  <label for="postalcode" class="form-label">Zip/Postal Code</label>
                  <input id="postalcode" type="text" class="form-control" name="postalcode" placeholder="Zipcode"
                    required>
                </div>
                <!-- CheckBox -->
                <div class="col-12 mb-5">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label " for="customCheck1">Remember this
                      card</label>
                  </div>
                </div>
                <div class="col-md-4 col-12">
                  <!-- Button -->
                  <div>
                    <button type="submit" class="btn btn-dark mb-3 mb-lg-0 me-4">Make a
                      Payment</button>
                  </div>
                </div>
                <!-- Text -->
                <div class="col-md-8 col-12 d-flex align-items-center justify-content-end">
                  <small class="mb-0">By click start learning, you agree to our <a href="#">Terms of
                      Service and Privacy Policy.</a></small>
                </div>
              </form>
              <!-- Paypal -->
              <form id="cardpayment" >
                <div class="mb-3 mt-4 ">
                  <label for="paypalemail" class="form-label">PayPal</label>
                  <input type="email" id="paypalemail" wire:model="paypalemail" placeholder="Enter your PayPal email"
                    class="form-control" required>
                </div>
                <button wire:loading.attr='disabled' wire:click.prevent='save' type="submit" class="btn btn-dark">PayPal Checkout</button>
              </form>
            </div>


          </div>


          
        </div>
        <div class="col-lg-4 col-md-12 col-12">
          <!-- Card -->
          <div class="card  border-0 mb-3">
            <!-- Card body -->
            <div class="p-5 text-center">
              <span class="badge bg-warning">Selected Plan</span>
              <div class="mb-5 mt-3">
                <h1 class="fw-bold">{{$plan->type.' PLAN'}}</h1>
                <p class="mb-0 ">Access all <span class="text-dark fw-medium">premium courses,
                    workshops, and mobile apps.</span> Renewed monthly.
                </p>
              </div>
              <div class="d-flex justify-content-center">
                <span class="h3 mb-0 fw-bold text-dark">$</span>
                <div class="display-4 fw-bold text-dark">{{$plan->amount}}</div>
                <span class=" align-self-end mb-1">{{$plan->type == 'MONTH' ? '/Monthly' : '/year'}}</span>
              </div>
            </div>
            <hr class="m-0">
            <div class="p-5">
              <h4 class="fw-bold mb-4">Everything in Starter, plus:</h4>
              <!-- List -->
              <ul class="list-unstyled mb-0">
                <li class="mb-1">
                  <span class="text-success me-1"><i class="far fa-check-circle"></i></span>
                  <span>Offline viewing </span>
                </li>
                <li class="mb-1">
                  <span class="text-success me-1"><i class="far fa-check-circle"></i></span>
                  <span><span class="fw-bold text-dark">Offline </span>projects </span>
                </li>
                <li class="mb-1">
                  <span class="text-success me-1"><i class="far fa-check-circle"></i></span>
                  <span><span class="fw-bold text-dark">Unlimited </span>storage</span>
                </li>
                <li class="mb-1">
                  <span class="text-success me-1"><i class="far fa-check-circle"></i></span>
                  <span>Custom domain support </span>
                </li>
                <li class="mb-1">
                  <span class="text-success me-1"><i class="far fa-check-circle"></i></span>
                  <span>Bulk editing </span>
                </li>
                <li class="mb-1">
                  <span class="text-success me-1"><i class="far fa-check-circle"></i></span>
                  <span>12 / 5 support</span>
                </li>
              </ul>
            </div>
            <!-- hr -->
            <hr class="m-0">
            <div class="p-4">
              <a href="{{route('courses.subscription',auth()->user())}}" class="btn btn-outline-dark">Change the Plan</a>
            </div>
          </div>
          <!-- Card -->
          <div class="card border-0 mb-3 mb-lg-0">
            <!-- Card body -->
            <div class="card-body">
              <h3 class="mb-2">Discount Codes</h3>
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Enter your code" aria-describedby="couponCode">

                    <button class="btn btn-secondary" id="couponCode">Apply</button>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
