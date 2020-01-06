@extends('layouts.customer')

@section('external-js')
    

     
     <script src="{{ asset('js/reservation/Reservations.js') }}" ></script>

@endsection

@section('content')
<div class="container">

  <h5 class=" text-secondary text-center">Reservations</h5>

  <div class="container p-sm-0 p-md-5 " id="reservations">
    
    <h6 class="text-info mt-5 text-center" v-if="reservation_payments.length == 0">You have no reservations.</h6>
    <div v-for="payment in reservation_payments" class="mt-3">
        <template  v-if="payment.reservations.length > 0">
          <h6 class="text-info text-center">
            @{{ payment.bookable.name }}
          </h6>
          <div class="card position-relative mt-0 p-3 px-md-5">
            
            <p class="text-left " >
              <span style="text-transform: capitalize;">@{{payment.bookable.bookable_template.category}}s : </span>
              <span class="text-secondary">@{{ payment.reservations.length }}</span>
              <br>
              Start: <span class="text-secondary">@{{ toReadableDateTime(payment.bookable.start_at)  }}</span>
              <br>
              End : <span class="text-secondary">@{{ toReadableDateTime(payment.bookable.end_at)  }}</span>
            </p>
            <img :src=" '/images/bookable-posters/' + payment.bookable.image " class=" position-absolute rounded " alt="..." style="width: 20%; max-width: 100px; right: 2%;">
            <ul class="list-group mt-5 px-md-5">
              <li class="list-group-item p-1" v-for="reservation in payment.reservations">
                <span >
                      <i class="material-icons float-left text-secondary">label</i>
                      @{{ reservation.bookable_item_name }}

                      <button type="button" class="btn btn-sm btn-outline-info float-right" data-toggle="modal" :data-target="'#'+reservation.code">
                        QR code
                      </button>

                      <div class="modal fade" :id="reservation.code" tabindex="-1" role="dialog" :aria-labelledby="reservation.code + 'Label'" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" :id="reservation.code + 'Label'">@{{ payment.bookable.name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <center>
                                  
                                  <strong class="text-info">@{{ reservation.bookable_item_name }}</strong>
                                  <br>
                                  Seat QR code
                                  <br>
                                  <img :src="'https://api.qrserver.com/v1/create-qr-code/?data=' + reservation.code + '&size=150x150' ">
                                  <br>
                                  <label class="text-center text-secondary">@{{reservation.code }}</label>
                                </center>


                              </div>
                              <div class="modal-footer">
                                <center>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </center>
                              </div>
                            </div>
                          </div>
                      </div>

                  </span>
                </li>
              </ul>
          </div>
        </template>
    </div>
    


  </div>

</div>
@endsection
