@extends('layouts.business')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Biz Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth('admin') 
                        Hi {{ auth('admin')->user()->name }}
                        You are logged in as admin!
                    @else
                        Welcome Guest!

                    @endAuth
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
