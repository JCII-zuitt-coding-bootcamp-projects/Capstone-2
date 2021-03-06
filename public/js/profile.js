

var Profile = new Vue({
  el: '#Profile',

  mounted() {
  	// alert("started");
  	
  	$('#loading_data').modal({
	    backdrop: 'static',
	    keyboard: false
	})
  	$("#loading_data").modal('show');

  	this.getUserInfo();
  	
  },
  data: {
    message: 'Hello Vue!',
    edit_mode : false,
    edit_mode_password : false,
    // template_id : $('#bookable_template_id').attr('value'),
    profile : null,
    pass : {},
    errors : null, // for displaying of errors in ajax


  },


  methods: {


	    getUserInfo : function(){
	    	let url = "/profile";

	    	fetch(url, {
			  method: 'POST', // or 'PUT'
			  headers: {
			    'Content-Type': 'application/json',
		      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			  },
			  // body: JSON.stringify({}),
			})
			.then((response) => response.json())
			.then((responseData) => {

			  // console.log('Success:', responseData);
	    		// this.reservations = responseData;

	    		this.profile = responseData;
  				$("#loading_data").modal('hide');


			})
			.catch((error) => {
			  // console.error('Error:', error);
			});


	    },


	    update:  function(){

	    	$('#updating_data').modal({
			    backdrop: 'static',
			    keyboard: false
			})
		  	$("#updating_data").modal('show');


	    	let url = "/profile/update";

	    	fetch(url, {
			  method: 'POST', // or 'PUT'
			  headers: {
			    'Content-Type': 'application/json',
		      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			  },
			  body: JSON.stringify( this.profile ),
			})
			.then((response) => response.json())
			.then((responseData) => {


			  	$("#updating_data").modal('hide');

	    		if(responseData.success){
	    			$("#success_msg").text(responseData.msg);
	    			$("#successModal").modal("show");

	    			this.edit_mode = false
	    		}else{
	    			// error
	    			this.errors = responseData.errors;
	    			$("#errorsModal").modal("show");
	    		}

			})
			.catch((error) => {
			  // console.error('Error:', error);
			});

	    	

	    },

	    updatePassword:  function(){

	    	$('#updating_data').modal({
			    backdrop: 'static',
			    keyboard: false
			})
		  	$("#updating_data").modal('show');


	    	let url = "/profile/update-password";

	    	fetch(url, {
			  method: 'POST', // or 'PUT'
			  headers: {
			    'Content-Type': 'application/json',
		      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			  },
			  body: JSON.stringify( this.pass ),
			})
			.then((response) => response.json())
			.then((responseData) => {


		  	$("#updating_data").modal('hide');

			  if(responseData.success){
	    			$("#success_msg").text(responseData.msg);
	    			$("#successModal").modal("show");

	    			this.edit_mode_password = false
	    			this.pass.password = '';
	    			this.pass.password_confirmation = '';
	    		}else{
	    			// error
	    			this.errors = responseData.errors;
	    			$("#errorsModal").modal("show");
	    		}

			})
			.catch((error) => {
			  // console.error('Error:', error);
			});

	    },




	    
  },


})

