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
                <h2 class="text-center text-info">Edit Template</h2>

                <div id="cell-holder"  class="mx-auto mt-4" style="width: 500px; height: 500px; ">
                	<cell v-bind:data="cells.origin"
                      v-bind:children="cells.children"
                		  v-bind:bookable="cells.bookable"
                		  v-bind:selector_controller="selector_controller"
                	>
                	</cell>

                </div>
                <center>
                  <label class="text-center text-warning">(Click the cell above to design)</label>
                </center>

                <form class="mt-4">
                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Template Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Template Name" v-model="name">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Notes:</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="notes" placeholder="Notes about this template. EX Cinema 1 template with 100 seats."></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="category" v-model="category">
                          <option value="seat">Seats</option>
                          <option value="table">Tables</option>
                          <option value="room">Rooms</option>
                          <option value="other">Other</option>
                        </select>
                      </div>
                    </div>
                </form>


                {{-- MODALS --}}

             <div class="modal fade" id="errorsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <ul v-if="errors != null">
                          <li v-for="error in errors">
                            @{{ error }}
                          </li>
                        </ul>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-success" id="exampleModalLabel">Success</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <span id="success_msg"></span>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- MODALS --}}
              
        <div class="col-md-4 mt-1" id="cellDivisionController">

            <div >
                <select class="form-control form-control-lg" v-model="selector.phase">
                  <option value="Divisioning">Cell Division</option>
                  <option value="Bookable">Bookable assignment</option>
                  {{-- <option value="Designing">Cell Designing</option>
                  <option value="FinalLook">Final look</option> --}}

                </select> 
            </div>

            {{-- Division Phase --}}
            <div style="width: 100%; min-height: 400px; background: #dee0e3; border:2px solid #c1c0c0;" class="mt-3 p-3">


                  <div class="form-group row" style="display:none;">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Cell ID:</label>
                    <div class="col-sm-8">
                      {{-- <ul> --}}
                          <span v-for="selected in selector.selected">
                              @{{ selected }}
                          </span>
                      {{-- </ul> --}}
                    </div>
                  </div>


                  <template v-if="selector.phase == 'Divisioning' ">
                    
                    
                      <h5 class="text-center text-info">Divide inner cells</h5>

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
                          <input type="text" class="form-control" v-model="name" min="1" max="5" :disabled="selector.selected.length == 0" placeholder="ex. S1">
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


