@extends('layouts.business')


@section('external-js')
    <script src="{{ asset('js/bookable/component-cell.js') }}" ></script>
    <script src="{{ asset('js/bookable/SelectorController.js') }}" ></script>
	<script src="{{ asset('js/bookable/CellData.js') }}" ></script>

    <script src="{{ asset('js/bookable/CellDivisionController.js') }}" ></script>

@endsection

@section('content')
<div class="container-">
    <div class="row justify-content-center">
        <div class="col-md-8" id="cellData">
                <h2 class="text-center"> @{{ template_name }} </h2>

                <div id="cell-holder"  class="mx-auto" style="width: 500px; height: 500px; ">
                	<cell v-bind:data="cells.origin"
                		  v-bind:children="cells.children"
                		  v-bind:selector_controller="selector_controller"
                	>
                	</cell>

                </div>

        </div>
        <div class="col-md-4" >

            <div id="templateEditor">
                <h4 class="text-center text-secondary"> Cell @{{ phase }} </h4>
            </div>

            {{-- Division Phase --}}
            <div style="width: 100%; height: 300px; background: #dee0e3; border:2px solid #c1c0c0;" class="mt-3 p-3">
                

                <div id="cellDivisionController" >
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Cell ID</label>
                        <div class="col-sm-8">
                          <ul>
                              <li v-for="selected in selector.selected">
                                  @{{ selected }}
                              </li>
                          </ul>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label" >Columns:</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" v-model="cols" min="1" max="5" :disabled="selector.selected.length == 0">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Rows:</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" v-model="rows" min="1" max="5" :disabled="selector.selected.length == 0">
                        </div>
                      </div>

                      <div class="form-group row" v-if="selector.selected.length > 0" 
                            @click='cellData.deleteChild()'>
                        <div class=" offset-sm-4 col-sm-8">
                          <button type="submit" class="btn btn-danger mb-2">Delete</button>
                        </div>
                      </div>

                      <div class="form-group row" v-if="selector.selected.length > 0" 
                            @click='cellData.selectParentCellId()'>
                        <div class=" offset-sm-4 col-sm-8">
                          <button type="submit" class="btn btn-primary mb-2">Select parent</button>
                        </div>
                      </div>

                      


                </div>

            </div>

        </div>
    </div>
</div>
@endsection


