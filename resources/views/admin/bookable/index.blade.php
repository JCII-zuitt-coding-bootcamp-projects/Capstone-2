@extends('layouts.business')


@section('external-js')

@endsection

@section('content')
<div class="container-">
    
    <div class="justify-content-center container" >

      <h4 class="text-center mb-3">Bookable Schedules ({{ $bookables->count() }})</h4>

        
      @forelse ($bookables as $bookable)
          <div class="card" style="width: 18rem;">
            @if( $bookable->image != "" )
            <img src="{{ asset('images/bookable-posters/' . $bookable->image) }}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $bookable->name }}</h5>
              <p class="card-text"><em>{{ $bookable->description }}</em></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Status: <strong class="text-secondary">Ongoing/Starting after 20 minustes/Ended</strong></li>
              <li class="list-group-item">Total seats: <strong class="text-secondary">100</strong></li>
              <li class="list-group-item">Reserved: <strong class="text-secondary">50</strong></li>
              <li class="list-group-item">Available: <strong class="text-secondary">50</strong></li>
              
              
            </ul>
            <div class="card-body">
                <a href="#" class="btn btn-info">Reservations</a>
                <a href="#" class="btn btn-warning float-right">Edit</a>
                
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


