@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')




	<!-- Content -->
    		<div class="col-lg-9 col-md-4 col-12" >					
					<!-- Card -->
				<div class="row mt-0 mt-md-8">
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header border-bottom-0">
							<h3 class="mb-0">Invoices</h3>
							<p class="mb-0">You can find all of your order Invoices.</p>
						</div>
						<!-- Table -->
						<div class="table-invoice table-responsive border-0">
							<table id="dataTableBasic" class="table mb-0 text-nowrap">
								<thead class="table-light">
									<tr>
										<th scope="col" class="border-bottom-0">ORDER ID</th>
										<th scope="col" class="border-bottom-0">DATE</th>
										<th scope="col" class="border-bottom-0">AMOUNT</th>
										<th scope="col" class="border-bottom-0">STATUS</th>
										
									</tr>
								</thead>
								<tbody>
                                @foreach ($payments as $payment)
                                    
									<tr>
										<td><a href="invoice-details.html">{{$payment->payment_id}}</a></a></td>
										<td>{{Carbon\Carbon::parse($payment->created_at)->format('d M Y H:i')}}</td>
										<td>${{$payment->amount}}</td>
                                        @if($payment->status == 'LOAD..')
										    <td><span class="badge bg-warning">load</span></td>
                                        @elseif($payment->status == 'FAILED..')
                                            <td><span class="badge bg-danger">Failed</span></td>
										@elseif($payment->status == 'SUCCESS..')
                                            <td><span class="badge bg-success">Due</span></td>
                                        @endif
										{{-- <td>
											<a href="../assets/images/pdf/invoiceFile.pdf" class="fe fe-download" download></a>
										</td> --}}
									</tr>

                                @endforeach


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

			


@endsection