@extends('layouts.customer')

@section('external-js')
     
     <script src="{{ asset('js/reservation/component-cell.js') }}" ></script>

     <script src="{{ asset('js/reservation/SelectorController.js') }}" ></script>
     <script src="{{ asset('js/reservation/TemplateCellData.js') }}" ></script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="card">
                <div class="card-header text-center">Booking page</div>
                {{-- ids --}}
                <input type="hidden" id="bookable_id" value="{{ $bookable->id }}">
                <input type="hidden" id="bookable_template_id" value="{{ $bookable->bookable_template_id }}">

                <div class="card-body" id="TemplateCellData">

                    <div class="row">
                        <div class="col-md-4 col-sm-12">

                          @if( $bookable->image != "" )
                          <center>
                            <img src="{{ asset('images/bookable-posters/' . $bookable->image) }}" class="img-fluid " alt="..." style="max-height: 300px;">
                          </center>
                          @endif

                        </div>
                        <div class="col-md-8 col-sm-12">

                            <h5 class="card-title">{{ $bookable->name }}</h5>
                            <p class="card-text">About: <em> {{ $bookable->description }} </em> </p>

                            <ul class="list-group list-group-flush mb-2">
                              <li class="list-group-item p-1">Start: {{$bookable->start_at->toDayDateTimeString()}}</li>
                              <li class="list-group-item p-1">End: &nbsp;{{$bookable->end_at->toDayDateTimeString()}} </li>
                            </ul>
                            {{-- <a href="#" class="btn btn-info">Details</a>
                            <a href="#" class="btn btn-warning ">Edit</a> --}}


                        </div>

                        <div class="col-sm-12 mt-3">
                            
                            <div class="container-fluid" >
                                    {{-- <h2 class="text-center"> @{{ name }} <small class="text-secondary">Template</small></h2> --}}
                                    <h3 class="text-center text-secondary">Book now!</h3>
                                    <div id="cell-holder"  class="mx-auto border rounded" style="border-width: 3px !important; max-width: 500px; ">
                                        <cell v-bind:data="cells.origin"
                                          v-bind:children="cells.children"
                                              v-bind:bookable="cells.bookable"
                                              v-bind:reservations="reservations"
                                              v-bind:selector_controller="selector_controller"
                                        >
                                        </cell>

                                    </div>

                                    
                            </div>

                        </div>

                        <div class="col-sm-12 mt-2">
                            <center>
                                <ul class="list-group list-group-horizontal-sm justify-content-center">
                                  <li class="list-group-item p-1"><div style="width: 20px; height: 20px; background-color: #75d68b"></div> Available</li>
                                  <li class="list-group-item p-1"><div style="width: 20px; height: 20px; background-color: #999898"></div> Reserved</li>
                                  <li class="list-group-item p-1"><div style="width: 20px; height: 20px; background-color: #48afde"></div> Selected</li>
                                </ul>
                            </center>
                           
                           <div class="container" id="" style="min-height: 200px;">
                               
                               <div class="mt-3" >
                                   <h5 class="text-info text-center">Selected @{{ category }}s <small class="text-secondary">(@{{ selector_controller.selected.length }})</small></h5>
                                   <ol v-if="selector_controller.selected.length > 0">
                                       <li v-for="cell_id in selector_controller.selected" >
                                           @{{ getBookableNameCode(cell_id) }} - ₱@{{ getBookablePrice(cell_id) }}
                                       </li>
                                   </ol>
                                   <center>
                                       <h6 class="text-secondary text-center mt-4">Total: ₱@{{ currentTotalPrice }}</span></h6>

                                        
                                       <button class="btn btn-success mt-2" :disabled="selector_controller.selected.length == 0" data-toggle="modal" data-target="#confirmReservation" >
                                           Reserve
                                       </button>
                                   </center>
                               </div>
                           </div>

                        </div>
                    </div>

                    {{-- MODALS..... --}}

                    <!-- Modal -->


                    <div class="modal fade" id="confirmReservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Reservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Reserve <strong>@{{ selector_controller.selected.length }}</strong> @{{ category }}/s for total of <strong class="text-success">₱@{{ currentTotalPrice }}</strong> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="reserve()">Confirm</button>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="modal fade" id="responseMsgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" :class="ajax_response.success ? 'text-success' : 'text-danger'">
                              @{{ ajax_response.success ? 'Success' : 'Opps.'}}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            @{{ ajax_response.msg }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
                      <div class="modal show" id="loading_data" tabindex="-1" role="dialog" aria-labelledby="loading_data" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-center" id="exampleModalLabel">Loading data</h5>
                            </div>
                            <div class="modal-body">
                              Please wait...
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal show" id="processing_reservation" tabindex="-1" role="dialog" aria-labelledby="loading_data" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-center" id="exampleModalLabel">Processing reservation</h5>
                            </div>
                            <div class="modal-body">
                              Please wait...
                            </div>
                          </div>
                        </div>
                      </div>






                </div> {{-- Template Celldata ending --}}
            </div>


    </div>
</div>




@endsection
