@extends('layouts.business')


@section('external-js')

@endsection

@section('content')
<div class="container-">
    
    <div class=" container" >

      <h4 class="text-center mb-3">Add new Staff</h4>

        
      <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
          @csrf()
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" >
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"> Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="sample@yahoo.com" >
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Roles</label>
            <div class="col-sm-10 text-secondary">

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="true" id="bookable_schedule" name="bookable_schedule"   @if( old('bookable_schedule') == true ) checked @endif >
                  <label class="form-check-label" for="bookable_schedule">
                    Edit/Add Bookables Schedule
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="true" id="bookable_template" name="bookable_template"
                   @if( old('bookable_template') == true ) checked @endif >
                  <label class="form-check-label" for="bookable_template">
                    Edit/Add Bookables Templates
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="true" id="staff" name="staff"
                   @if( old('staff') == true ) checked @endif >
                  <label class="form-check-label" for="staff">
                    Edit/Add Staffs
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="true" id="verify_ticket" name="verify_ticket"
                   @if( old('verify_ticket') == true ) checked @endif >
                  <label class="form-check-label" for="verify_ticket">
                    Verify ticket
                  </label>
                </div>

            </div>
          </div>


          <div class="form-group row">
            <div class="offset-sm-2  col-sm-10">
              <button type="submit" class="btn btn-block btn-info" >Add staff</button>
            </div>
          </div>
        </form>


      
      

    </div>
</div>
@endsection


