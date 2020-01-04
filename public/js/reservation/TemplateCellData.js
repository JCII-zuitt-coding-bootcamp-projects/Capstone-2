var TemplateCellData = new Vue({
  el: '#TemplateCellData',

  mounted() {
  	// alert("started");
  	
  	this.proportionParentHeightWidth();
  	this.getReservations();
  	this.initTemplateData();
  	
  },
  data: {
    message: 'Hello Vue!',

    template_id : $('#bookable_template_id').attr('value'),
    bookable_id : $('#bookable_id').attr('value'),

    name : "",
    notes : "",
    category : "",
    total_bookable : 0,

    selector_controller : SelectorController ,
    cells : {
    		origin : {
    			parent_cell : 'c', //is the main
		    	col : 1,
		    	row : 1,
    		},

    		children : [

			   //  	{
			   //  			parent_cell : 'c_1',
			   //  			col : 4,
			   //  			row : 3,
			  	// }

		    ],


		    bookable : {
		    	// c_1_2 : {
		    	// 	name: "A1",
		    	// 	price: 230,
		    	// }
		    }


    },

    reservations : [],

    //error and succcess msg
    ajax_response : {
    	success : false,
    	msg : "Something went wrong",

    },

  },


  methods: {


  		reserve : function(){
  			// console.log("nice");

  			let url = "/reservations/"+ this.bookable_id + "/new";

	    	fetch(url, {
			  method: 'POST', // or 'PUT'
			  headers: {
			    'Content-Type': 'application/json',
		      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			  },
			  body: JSON.stringify({
			  	seat_cells : this.selector_controller.selected,
			  	bookable_id : this.bookable_id,
			  }),
			})
			.then((response) => response.json())
			.then((responseData) => {

				  // console.log('Success:', responseData);
				  this.ajax_response = responseData;
				  $("#responseMsgModal").modal("show");
				  

				  //if success reservation
				  if(this.ajax_response.success){
				  	this.reservations = this.reservations.concat(this.selector_controller.selected);
				  	this.selector_controller.reset();
				  }

			})
			.catch((error) => {
			  console.error('Error:', error);
			});

  		},



	    initTemplateData : function(){
	    	let url = "/admin/template/"+ this.template_id + "/data";

	    	fetch(url, {
			  method: 'POST', // or 'PUT'
			  headers: {
			    'Content-Type': 'application/json',
		      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			  },
			  body: JSON.stringify({}),
			})
			.then((response) => response.json())
			.then((responseData) => {

			  console.log('Success:', responseData);
	    		this.cells.children = responseData.children;
	    		this.cells.bookable = responseData.bookable;
	    		console.log(responseData.bookable);

	    		this.name = responseData.name;
	    		this.notes = responseData.notes;
	    		this.category = responseData.category;
	    		this.total_bookable = responseData.total_bookable;
	    		



			})
			.catch((error) => {
			  console.error('Error:', error);
			});


	    },


	    getReservations : function(){
	    	let url = "/reservations/"+ this.bookable_id + "/data";

	    	fetch(url, {
			  method: 'POST', // or 'PUT'
			  headers: {
			    'Content-Type': 'application/json',
		      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

			  },
			  body: JSON.stringify({}),
			})
			.then((response) => response.json())
			.then((responseData) => {

			  console.log('Success:', responseData);
	    		this.reservations = responseData;



			})
			.catch((error) => {
			  console.error('Error:', error);
			});


	    },




	    // Bookable methos

	    cellIsBookable : function(cid = this.selector_controller.selected[0] ){ // if no passed cid the method will check the current selected cid
	    	return this.cells.bookable[ cid ] != undefined ? true : false;
	    },



	    proportionParentHeightWidth : function(){
	    	let width = $('#cell-holder').width();	
  			// console.log(width);
  			// width("width: " + width)
  			$('#cell-holder').height(width);
  			console.log("new height: " + width);
	    },

	    getBookableNameCode : function ( cid ){
	      // console.log( this.bookable[ this.cId( num ) ]);
	      return this.cells.bookable[ cid ].name;

	    },

	    getBookablePrice : function ( cid ){
	      // console.log( this.bookable[ this.cId( num ) ]);
	      return parseInt( this.cells.bookable[ cid ].price );

	    },


	    
  },

  computed: {
	    currentTotalPrice : function (  ){

	    	if( this.selector_controller.selected.length > 0){
	    		let total = 0;

	    		this.selector_controller.selected.forEach(function(cid ) {
				  total = total + TemplateCellData.getBookablePrice(cid);
				});

				return total;

	    	}else{
	    		return 0;
	    	}
	    },

  },

  watch: {

  	//if their is chages, saved automatically.. not ideal for testing only
 //  	'cells.children' : function (newchildren, oldchildren) {
 //  		this.saveChanges();
 //    },

	// //if their is chages, saved automatically.. not ideal for testing only
 //    'cells.bookable' : function (newchildren, oldchildren) {
 //  		this.saveChanges();
 //    },


  },

  


})


$(window).resize(function(){
  
	TemplateCellData.proportionParentHeightWidth();
});

