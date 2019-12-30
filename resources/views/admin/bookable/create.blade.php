@extends('layouts.business')


@section('external-js')

@endsection

@section('content')
<div class="container-">
    
    <div class="justify-content-center">
      <h4 class="text-center">Create new Bookable Schedule</h4>

      

      <form action="{{ route('admin.bookable.store') }}" method="POST" enctype="multipart/form-data">
          @csrf()
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="ex. Cinema 1 - Avenger" >
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"> Poster image</label>
            <div class="col-sm-10">
              
                <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster" accept="image/*">
              
              @error('poster')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>


          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="ex. Reserve now to watch Avengers movie...">{{ old('description') }}</textarea>
              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Template</label>
            <div class="col-sm-10">
              <select class="form-control @error('template_id') is-invalid @enderror" name="template_id">

                @foreach ($templates as $template)
                  <option value="{{ $template->id }}">
                    {{ $template->name }} - with 
                    {{ $template->total_bookable }} bookable {{ Str::plural($template->category) }}
                  </option>
                @endforeach

              </select>
              @error('template_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>



          <h5 class="text-center text-secondary">Schedule date and time</h5>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"> Start at</label>
            <div class="col-sm-10">
              <input type="datetime-local" class="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{ old('start_at') }}">
              @error('start_at')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"> Ending at</label>
            <div class="col-sm-10">
              <input type="datetime-local" class="form-control @error('end_at') is-invalid @enderror" name="end_at" value="{{ old('end_at') }}" >
              @error('end_at')
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
              <button type="submit" class="btn btn-block btn-info" >Create Bookable Schedule</button>
            </div>
          </div>
        </form>

    </div>
</div>
@endsection


