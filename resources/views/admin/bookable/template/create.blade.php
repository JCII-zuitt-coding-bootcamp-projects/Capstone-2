@extends('layouts.business')


@section('external-js')
	<script src="{{ asset('js/bookable/create-template.js') }}" ></script>
@endsection

@section('content')
<div class="container-">
    <div class="row justify-content-center">
        <div class="col-md-10" id="app">
            <div class="card" >
                <h1> @{{ message }} </h1>

                <div id="cell-holder" style="width: 500px; height: 500px; border-style: dashed;">
                	<cell v-bind:data="cells.origin"
                		  v-bind:children="cells.children"
                		  v-bind:selector_controller="selector_controller"
                	>
                	</cell>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection


