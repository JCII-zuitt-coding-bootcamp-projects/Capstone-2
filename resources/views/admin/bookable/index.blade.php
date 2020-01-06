@extends('layouts.business')


@section('external-js')

@endsection

@section('content')
<div class="container-">
    
    <div class=" container" >

      <h4 class="text-center mb-3">Bookable Schedules ({{ $bookables->count() }})</h4>

        
      @forelse ($bookables as $bookable)


          <div class="card mb-4">
            <div class="card-header">
                Seats: <strong class="text-secondary">{{ $bookable->reservations_count }}/{{ $bookable->bookable_template->total_bookable }}</strong>

              
                <span class="float-right">
                  {{-- Status: <strong class="text-secondary">Ongoing/Starting after 20 minustes/Ended</strong> --}}
                </span>
              
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-md-3 col-sm-12">

                  @if( $bookable->image != "" )
                    <img src="{{ asset('images/bookable-posters/' . $bookable->image) }}" class="card-img-top" alt="...">
                  @endif

                </div>
                <div class="col-md-9 col-sm-12">

                    <h5 class="card-title">{{ $bookable->name }}</h5>
                    <p class="card-text">About: <em> {{ $bookable->description }} </em> </p>

                    <ul class="list-group list-group-flush mb-2">
                      <li class="list-group-item p-1">Start: {{$bookable->start_at->toDayDateTimeString()}}</li>
                      <li class="list-group-item p-1">End: &nbsp;{{$bookable->end_at->toDayDateTimeString()}} </li>
                    </ul>
                    {{-- <a href="#" class="btn btn-info">Reservations</a>
                    <a href="#" class="btn btn-warning ">Edit</a> --}}


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


