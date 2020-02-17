

var Staff = new Vue({
  el: '#Staff',

  mounted() {
  	// alert("started");
  	
  	$('#loading_data').modal({
	    backdrop: 'static',
	    keyboard: false
	})
  	$("#loading_data").modal('show');

  	this.staffs();
  	
  },
  data: {
    message: 'Staffs',
    edit_mode : false,
    edit_mode_password : false,
    
    biz_staffs : null,
			//     id: 1
				// business_id: 1
				// name: "John Doe"
				// email: "clet.jose@yahoo.com"
				// email_verified_at: null
				// created_at: "2020-01-02 04:51:07"
				// updated_at: "2020-01-02 04:51:07"

    errors : null, // for displaying of errors in ajax

    active_index : null,

  },


  methods: {


	    staffs : function(){
	    	let url = "/admin/staff";

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

	    		this.biz_staffs = responseData;

			  	$("#loading_data").modal('hide');


			})
			.catch((error) => {
			  // console.error('Error:', error);
			});


	    },


	    update:  function(){

	    	$("#editStaff").modal("hide");
	    	$('#updating_data').modal({
			    backdrop: 'static',
			    keyboard: false
			})
		  	$("#updating_data").modal('show');


	    	let url = "/admin/staff/update";

	    	fetch(url, {
			  method: 'POST', // or 'PUT'
			  headers: {
			    'Content-Type': 'application/json',
		      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			  },
			  body: JSON.stringify( this.biz_staffs[this.active_index] ),
			})
			.then((response) => response.json())
			.then((responseData) => {

		  			$("#updating_data").modal('hide');


	    		if(responseData.success){
	    			$("#success_msg").text(responseData.msg);
	    			$("#successModal").modal("show");
	    			

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


	    toggleRole: function (role) {
		    
		    if(this.biz_staffs[this.active_index].tagsz.includes(role)){
		    	// remove
		    	let index = this.biz_staffs[this.active_index].tagsz.indexOf(role);
				this.biz_staffs[this.active_index].tagsz.splice(index, 1);
		    }else{
		    	// add
		    	this.biz_staffs[this.active_index].tagsz.push(role);
		    }
		},

	  //   updatePassword:  function(){


	  //   	let url = "/profile/update-password";

	  //   	fetch(url, {
			//   method: 'POST', // or 'PUT'
			//   headers: {
			//     'Content-Type': 'application/json',
		 //      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			//   },
			//   body: JSON.stringify( this.pass ),
			// })
			// .then((response) => response.json())
			// .then((responseData) => {

			//   if(responseData.success){
	  //   			$("#success_msg").text(responseData.msg);
	  //   			$("#successModal").modal("show");

	  //   			this.edit_mode_password = false
	  //   			this.pass.password = '';
	  //   			this.pass.password_confirmation = '';
	  //   		}else{
	  //   			// error
	  //   			this.errors = responseData.errors;
	  //   			$("#errorsModal").modal("show");
	  //   		}

			// })
			// .catch((error) => {
			//   // console.error('Error:', error);
			// });

	  //   },




	    
  },


})

