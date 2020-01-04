@extends('layouts.customer')

@section('external-js')
    

     
     <script src="{{ asset('js/profile.js') }}" ></script>

@endsection

@section('content')
<div class="container" id="Profile">

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
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label text-center">Update Password</label>
          <div class="col-sm-10">
            <input type="password"  class="form-control"  placeholder="New password"v-model="profile.password" >
          </div>
          <div class="col-sm-10 mt-2">
            <input type="password"  class="form-control"  placeholder="Confirm password" v-model="profile.confirm_password" >
          </div>
        </div>

    </template>
    <button class="text-center btn btn-warning btn-block" v-if="!edit_mode_password && !edit_mode" @click="edit_mode_password = true">Update password</button>
    <button class="text-center btn btn-success btn-block" v-if="edit_mode_password" @click="updatePassword()">Update Password</button>
</div>
@endsection
