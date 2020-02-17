@extends('layouts.customer')

@section('external-js')
    

     
     <script src="{{ asset('js/profile.js') }}" ></script>

@endsection

@section('content')
<div class="container px-5" id="Profile">


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

  <h5 class=" text-secondary text-center">Profile</h5>


    <template v-if="profile != null">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" :readonly="!edit_mode" class="form-control"  v-model="profile.name ">
        </div>
      </div>

      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
          <input type="text" :readonly="!edit_mode" class="form-control"  v-model="profile.address" >
        </div>
      </div>

      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" :readonly="!edit_mode" class="form-control"  v-model="profile.email" >
        </div>
      </div>

      

      <button class="text-center btn btn-warning btn-block" v-if="!edit_mode && !edit_mode_password" @click="edit_mode = true">Edit Profile</button>
      <button class="text-center btn btn-success btn-block" v-if="edit_mode" @click="update()">Update Profile</button>
    </template>




    <template v-if="edit_mode_password">
        <h5 class=" text-secondary text-center mt-md-5">Profile</h5>

        <div class="form-group row ">
          <div class="col-sm-10 offset-sm-2">
            <input type="password"  class="form-control"  placeholder="New password"v-model="pass.password" >
          </div>
          <div class="col-sm-10 offset-sm-2 mt-2">
            <input type="password"  class="form-control"  placeholder="Confirm password" v-model="pass.password_confirmation" >
          </div>
        </div>

    </template>
    <button class="text-center btn btn-warning btn-block" v-if="!edit_mode_password && !edit_mode" @click="edit_mode_password = true">Update password</button>
    <button class="text-center btn btn-success btn-block" v-if="edit_mode_password" @click="updatePassword()" :disabled="!pass.password && !pass.password_confirmation">Update Password</button>
    <button class="text-center btn btn-secondary btn-block" v-if="edit_mode_password" @click="edit_mode_password = false" >Cancel</button>
</div>


<div class="modal fade" id="loading_data" tabindex="-1" role="dialog" aria-labelledby="loading_data" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Loading data</h5>
      </div>
      <div class="modal-body">
        Please wait...
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="updating_data" tabindex="-1" role="dialog" aria-labelledby="loading_data" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Updating data</h5>
      </div>
      <div class="modal-body">
        Please wait...
      </div>
    </div>
  </div>
</div>

@endsection
