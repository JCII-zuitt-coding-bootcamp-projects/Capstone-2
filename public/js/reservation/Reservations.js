

var Reservations = new Vue({
  el: '#reservations',

  mounted() {
  	// alert("started");
  	
  	$('#loading_data').modal({
	    backdrop: 'static',
	    keyboard: false
	})
  	$("#loading_data").modal('show');

  	this.getUserReservationsByPayment();
  	
  },
  data: {
    message: 'Hello Vue!',

    // template_id : $('#bookable_template_id').attr('value'),
    reservation_payments : null,

  },


  methods: {


	    getUserReservationsByPayment : function(){
	    	let url = "/reservations";

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

	    		this.reservation_payments = responseData;
	    		$("#loading_data").modal('hide');

			})
			.catch((error) => {
			  // console.error('Error:', error);
			});


	    },


	    toReadableDateTime:  function(dateString){
	    	let date = new Date(dateString);
	    	// Date.parse(dateString)
	    	// return date;
			return date.toLocaleDateString() + ' ' + date.toLocaleTimeString();
	    }


	    
  },

  computed: {
	    currentTotalPrice : function (  ){

	   //  	if( this.selector_controller.selected.length > 0){
	   //  		let total = 0;

	   //  		this.selector_controller.selected.forEach(function(cid ) {
				//   total = total + TemplateCellData.getBookablePrice(cid);
				// });

				// return total;

	   //  	}else{
	   //  		return 0;
	   //  	}
	    },

  },

  watch: {

  	//if their is chages, saved automatically.. not ideal for testing only
 //  	'cells.children' : function (newchildren, oldchildren) {
 //  		this.saveChanges();
 //    },

  },

  


})

