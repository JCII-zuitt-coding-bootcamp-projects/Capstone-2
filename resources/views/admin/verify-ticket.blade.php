@extends('layouts.business')



@section('external-js')
    
     {{-- <script type="text/javascript" src="{{ asset('js/instascan.min.js') }}" ></script>
     <script type="text/javascript" src="{{ asset('js/qrcode.js') }}" ></script> --}}
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script  type="text/javascript"  src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	

     <script src="{{ asset('js/verify-ticket.js') }}" ></script>

@endsection

@section('content')

<div class="container" id="Verify">
	<h4 class="text-center mb-3">Verify Ticket</h4>


	<div class="container">
		<video id="preview" style="width:100%;"></video>
		<h6 class="text-center text-info">Scan QR Ticket</h6>
	</div>


		<div class="modal fade" id="errorsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title text-danger" id="exampleModalLabel">Error</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	            <h3 class="text-center text-danger mt-3">Invalid Ticket Reservation</h3>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	          </div>
	        </div>
	      </div>
	    </div>


	    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title text-success" id="exampleModalLabel">Verified Ticket!</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	            
	            <div class="card mb-4" v-if="ticketData != null">

				              
				              <div class="row">
				                <div class="col-md-3 col-sm-12">

				                  
				                  <template v-if="ticketData.bookable.image != '' ">
				                    <img :src="'/images/bookable-posters/' + ticketData.bookable.image" class="card-img-top" alt="...">
				                  </template>

				                </div>
				                <div class="col-md-9 col-sm-12">

				                    <h5 class="card-title text-center">@{{ ticketData.bookable.name }}</h5>

				                    <ul class="list-group list-group-flush mb-2">
				                      <li class="list-group-item p-1">Start: @{{ toReadableDateTime(ticketData.bookable.start_at) }}</li>
				                      <li class="list-group-item p-1">End: &nbsp;@{{ toReadableDateTime(ticketData.bookable.end_at) }} </li>
				                    </ul>

				                    <h5 class="text-center text-success">Verified Ticket!</h5>
				                    <h4 class="text-center text-secondary">Booked at:<br>@{{ ticketData.bookable_item_name }}</h4>

				                </div>

				              </div>

				  </div>

	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
	          </div>
	        </div>
	      </div>
	    </div>


</div>
@endsection
