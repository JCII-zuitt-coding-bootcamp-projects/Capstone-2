@extends('layouts.business')


@section('external-js')

@endsection

@section('content')
<div class="container-">
    
    <div class="justify-content-center">
      <h4 class="text-center">Create new Template</h4>

      

      <form action="{{ route('admin.bookable.templates.store') }}" method="POST">
          @csrf()
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="ex. Cinema 1 template" >
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Notes</label>
            <div class="col-sm-10">
              <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="3" placeholder="ex. This template is for Cinema 1 with 100 seats...">{{ old('notes') }}</textarea>
              @error('notes')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select class="form-control @error('category') is-invalid @enderror" name="category">
                <option value="seat">Seats</option>
                <option value="table">Tables</option>
                <option value="room">Rooms</option>
                <option value="other">Other</option>
              </select>
              @error('category')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          {{-- <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Prices</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" placeholder="ex. Cinema 1 template">
            </div>
          </div> --}}

          <div class="form-group row">
            <div class="offset-sm-2  col-sm-10">
              <button type="submit" class="btn btn-block btn-info" >Start designing</button>
            </div>
          </div>
        </form>

    </div>
</div>
@endsection


