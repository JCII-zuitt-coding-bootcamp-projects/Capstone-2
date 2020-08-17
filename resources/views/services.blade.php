@extends('layouts.customer')

@section('external-js')
    

     
     {{-- <script src="{{ asset('js/reservation/Reservations.js') }}" ></script> --}}

@endsection

@section('content')
<div class="container">

  <h4 class=" text-secondary text-center">Services</h4>

  <div class="container p-sm-0 p-md-5 " id="reservations">
    

      @forelse ($bookables as $bookable)


            <div class="card mb-4">
              <div class="card-header">
                  <span class="card-title">{{ $bookable->name }}</span>
              </div>
              <div class="card-body">
                
                <div class="row">
                  <div class="col-md-3 col-sm-12">

                    @if( $bookable->image != "" )
                      <img src="{{ asset('images/bookable-posters/' . $bookable->image) }}" class="card-img-top" alt="...">
                    @endif

                  </div>
                  <div class="col-md-9 col-sm-12">

                      
                      <p class="card-text">About: <em> {{ $bookable->description }} </em> </p>

                      <ul class="list-group list-group-flush mb-2">
                        <li class="list-group-item p-1">Start: {{$bookable->start_at->toDayDateTimeString()}}</li>
                        <li class="list-group-item p-1">End: &nbsp;{{$bookable->end_at->toDayDateTimeString()}} </li>
                      </ul>
                      <center>
                        <a href="{{ route('reserve', ['bookable_id' => $bookable->id ]) }}" class="btn btn-info btn-lg mt-3">Book now!</a>
                      </center>


                  </div>

                </div>

              </div>
            </div>
        @empty
            <p class="text-center">
              No bookable schedules
              <br>
              <a href="{{ route('admin.bookable.create') }}">Create bookable schedules</a>
            </p>
        @endforelse
    


  </div>

</div>
@endsection
