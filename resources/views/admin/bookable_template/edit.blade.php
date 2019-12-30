@extends('layouts.business')


@section('external-js')
    <script src="{{ asset('js/bookable/component-cell.js') }}" ></script>
    <script src="{{ asset('js/bookable/SelectorController.js') }}" ></script>
	 <script src="{{ asset('js/bookable/CellData.js') }}" ></script>

    <script src="{{ asset('js/bookable/CellDivisionController.js') }}" ></script>

@endsection

@section('content')
<div class="container-">
    {{-- Used in JS for fetching --}}
    <input type="hidden" id="template_id" value="{{ $template_id }}">

    <div class="row justify-content-center">

        {{-- cells playground --}}
        <div class="col-md-8" id="cellData">
                <h2 class="text-center"> @{{ name }} <small class="text-secondary">Template</small></h2>

                <div id="cell-holder"  class="mx-auto" style="width: 500px; height: 500px; ">
                	<cell v-bind:data="cells.origin"
                      v-bind:children="cells.children"
                		  v-bind:bookable="cells.bookable"
                		  v-bind:selector_controller="selector_controller"
                	>
                	</cell>

                </div>

        </div>


        <div class="col-md-4" id="cellDivisionController">

            <div >
                <select class="form-control form-control-lg" v-model="selector.phase">
                  <option value="Divisioning">Cell Divisioning</option>
                  <option value="Bookable">Bookable assigning</option>
                  <option value="Designing">Cell Designing</option>
                  <option value="FinalLook">Final look</option>

                </select> 
            </div>

            {{-- Division Phase --}}
            <div style="width: 100%; min-height: 400px; background: #dee0e3; border:2px solid #c1c0c0;" class="mt-3 p-3">


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


                  <template v-if="selector.phase == 'Divisioning' ">
                    
                    
                      <h5 class="text-center text-info">Devide inner cells</h5>

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

                      <div class="form-group row">
                        <div class=" offset-sm-4 col-sm-8">
                          <button type="submit" @click='cellData.deleteChild()' class="btn btn-block btn-danger mb-2" :disabled="selector.selected.length == 0">Delete</button>
                        </div>
                      </div>

                      <div class="form-group row" >
                        <div class=" offset-sm-4 col-sm-8">
                          <button type="submit" @click='cellData.selectParentCellId()' class="btn btn-block btn-primary mb-2" :disabled="selector.selected.length == 0">Select parent</button>
                        </div>
                      </div>

                  </template>

                  <template v-else-if="selector.phase == 'Bookable' ">

                      <h5 class="text-center text-info">Bookable details</h5>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label" >Name/code:</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" v-model="name" min="1" max="5" :disabled="selector.selected.length == 0">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Price:</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" v-model="price" min="0" max="1000" :disabled="selector.selected.length == 0">
                        </div>
                      </div>

                  </template>




                  

                
            </div>

            <div class="form-group row "  
                  @click='cellData.saveChanges()'>
              <div class="col-sm-12 ">
                <button type="submit" class="btn btn-success my-2 btn-block">Save Changes</button>
              </div>
            </div>

        </div>



    </div>
</div>
@endsection


