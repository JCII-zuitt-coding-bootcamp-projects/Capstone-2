@extends('layouts.business')


@section('external-js')
    
     <script src="{{ asset('js/staff/index.js') }}" ></script>

@endsection

@section('content')
<div class="container p-0 m-0" id="Staff">
    
    <div class="container-fluid  p-0 m-0" >

      <h4 class="text-center mb-3">Staffs (@{{ this.biz_staffs.length }})</h4>

      <center>
      <table class="table table-bordered table-responsive-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="( staff , i ) in biz_staffs">
            <th scope="row">@{{ ++i }}</th>
            <td>@{{ staff.email }}</td>
            <td>@{{ staff.name }}</td>
            <td>
              <button type="button" class="btn btn-outline-warning btn-block" data-toggle="modal" data-target="#editStaff" @click="active_index = --i">Edit</button>

            </td>
          </tr>
        </tbody>
      </table>
      </center>

      
      


    


    <div v-if="active_index != null" class="modal fade" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Edit Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control " name="name"placeholder="Name" v-model="biz_staffs[active_index].name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control @" name="email" placeholder="sample@yahoo.com" v-model="biz_staffs[active_index].email" >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Roles</label>
                  <div class="col-sm-10 text-secondary">

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="bookable_schedule"  :checked="biz_staffs[active_index].tagsz.includes('bookable_schedule')" @click="toggleRole('bookable_schedule')">
                        <label class="form-check-label" for="bookable_schedule">
                          Edit/Add Bookables Schedule
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="bookable_template"  :checked="biz_staffs[active_index].tagsz.includes('bookable_template')" @click="toggleRole('bookable_template')">
                        <label class="form-check-label" for="bookable_template">
                          Edit/Add Bookables Templates
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="staff"  :checked="biz_staffs[active_index].tagsz.includes('staff')" @click="toggleRole('staff')">
                        <label class="form-check-label" for="staff">
                          Edit/Add Staffs
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="verify_ticket" :checked="biz_staffs[active_index].tagsz.includes('verify_ticket')" @click="toggleRole('verify_ticket')">
                        <label class="form-check-label" for="verify_ticket">
                          Verify ticket
                        </label>
                      </div>

                  </div>
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info btn-block" @click="update()">Update</button>
              </div>
            </div>
          </div>
    </div>

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



</div>
@endsection


