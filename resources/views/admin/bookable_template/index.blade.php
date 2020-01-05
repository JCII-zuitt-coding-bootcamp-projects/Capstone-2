@extends('layouts.business')


@section('external-js')

@endsection

@section('content')
<div class="container-">
    
    <div class="justify-content-center container" >

      <h4 class="text-center mb-3">Available templates ({{ $templates->count() }})</h4>

        
      @forelse ($templates as $template)
          <div class="card mb-4">
            <div class="card-header">
              Bookable {{ Str::plural($template->category) }} : <strong class="secondary">{{ $template->total_bookable }}</strong>

              @if($template->bookables_count > 0 )
                <span class="float-right">Used : {{ $template->bookables_count }} time/s</span>
              @endif
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $template->name }}</h5>
              <p class="card-text">Notes: <em> {{ $template->notes }} </em> </p>

              
              
                
                  <a href="{{ route('admin.bookable.templates.delete', ['template_id' => $template->id ] ) }}" class="btn btn-danger @if($template->bookables_count > 0 ) disabled @endif">Delete</a>
                  <a href="{{ route('admin.bookable.templates.edit' , ['id' => $template->id ]) }}" class="btn btn-warning @if($template->bookables_count > 0 ) disabled @endif">Edit</a>
                
                @if($template->bookables_count > 0 )
                  <label class="text-danger">(Cannot edit or delete, used in {{ $template->bookables_count }} schedules)</label>
                @endif
                
                <a href="{{ route('admin.bookable.templates.copy', ['template_id' => $template->id ] ) }}" class="btn btn-info float-right ">Copy template</a>
              

            </div>
          </div>
      @empty
          <p class="text-center">
            No available templates
            <br>
            <a href="{{ route('admin.bookable.templates.create') }}">Design new template</a>
          </p>
      @endforelse


      
      

    </div>
</div>
@endsection


