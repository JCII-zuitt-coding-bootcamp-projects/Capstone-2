var CellData = new Vue({
  el: '#cellData',

  mounted() {
  	// alert("started");
  	
  	this.initTemplateData();
  },
  data: {
    message: 'Hello Vue!',

    template_id : $('#template_id').attr('value'),
    template_name : "Template 1",
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
		    	c_1_2 : {
		    		name: "A1",
		    		price: 230,
		    	}
		    }


    },


  },


  methods: {


  		deleteChild : function(cidEntered){

  			// let cid;

	    // 	if(cidEntered == undefined){
	    // 		cid = this.selector_controller.selected[0];
	    // 	}else{
	    // 		cid = cidEntered;
	    // 	}

  			let index = this.getChildCellIndex(cidEntered);
  			// delete this.cells.children[index];
  			console.log(index);
  			if(index != -1){
  				this.cells.children.splice(index, 1);// delete element
  			}
  			

  		},

    	addEditChild : function(col,row){

    		if( !this.selectedIsChild() ){
    			//create 1
    			// console.log(this.selector_controller.selected[0]);
    			if(col > 1 || row > 1){ // if same 1 dont save as new
    				this.cells.children.push({
		    			parent_cell : this.selector_controller.selected[0],
		    			col : parseInt(col),
		    			row : parseInt(row),
		    		});
		    		console.log("created!");
    			}else{
		    		console.log("opps. dont create! 1 parehas!");

    			}
	    		
    		}else{

    			if(col > 1 || row > 1){ // if same 1 dont save as new
    				let index = this.getChildCellIndex();

		    		this.$set(this.cells.children, index , {
		    			parent_cell : this.selector_controller.selected[0],
		    			col : parseInt(col),
		    			row : parseInt(row),
		    		})
	    			// console.log("edited na" , this.getChildCellIndex());
    			}else{
    				//if ginawang parehas 1 sa pag update... e delete....
    				this.deleteChild();


    			}

    			
    		}
    		
    		// this.selector_controller.reset();
    		
    	},

    	//check if the selected is already a child
    	selectedIsChild : function ( ){
    		let cId = this.selector_controller.selected[0];

    		//map first the parent_cell in array of json
	        return this.cells.children.map(function(child, index, arr){
				    return child.parent_cell;
			}).includes( cId );
	    },

	    // get the array index of a child cell // or selectedCellIndex
	    getChildCellIndex: function(cidEntered) {
	    	let cid;

	    	if(cidEntered == undefined){
	    		cid = this.selector_controller.selected[0];
	    	}else{
	    		cid = cidEntered;
	    	}
	    	// console.log("vvvv:" + cId);
	    	return this.cells.children.findIndex(function(item, i){
					  return item.parent_cell === cid;
					});
	    },

	    getParentCellId: function(){
    		let child_cId = this.selector_controller.selected[0];
    		// return selected_cId.slice(0, -2);	//remove the last 2 character in the cid to get its parent id
	    	console.log(child_cId);
	    	let to_be_removed = "_" + child_cId.split("_").pop();
	    	let parent_id = child_cId.replace( to_be_removed ,'');
    		// console.log(parent)
    		return parent_id;
	    },

	    selectParentCellId: function(){


    		let parent_id = this.getParentCellId();

    		// console.log(parent_id);
    		if(parent_id != "c"){ // since c is the most parent, wala sa children arrays
    			this.selector_controller.toggleAddCellID(parent_id);
    		}
    		

	    },

	    getCellColsRows : function(cidEntered){
	    	let cid;

	    	if(cidEntered == undefined){
	    		cid = this.selector_controller.selected[0];
	    	}else{
	    		cid = cidEntered;
	    	}

	    	// console.log("vcccc:" + cid)
	    	// this.selected[0]
	    	return this.cells.children[this.getChildCellIndex()];
	    },

	    getBookableDetails : function(cid = this.selector_controller.selected[0]){//cidEntered
	    	// console.log("vcccc:" + cid)
	    	// this.selected[0]
	    	return this.cells.bookable[cid];
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
			  // console.log('Success:', data);
	    		this.cells.children = responseData.children;



			})
			.catch((error) => {
			  console.error('Error:', error);
			});


	    },




	    // Bookable methos

	    cellIsBookable : function(cid = this.selector_controller.selected[0] ){ // if no passed cid the method will check the current selected cid
	    	return this.cells.bookable[ cid ] != undefined ? true : false;
	    },



  },

  watch: {
  	'cells.children' : function (newchildren, oldchildren) {


  		fetch("/admin/template/"+ this.template_id + "/update", {
		  method: 'POST', // or 'PUT'
		  headers: {
		    'Content-Type': 'application/json',
	      	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  body: JSON.stringify( this.cells.children ),
		})
		.then((response) => response.json())
		.then((responseData) => {
		  console.log('Success:', responseData);
		  console.log("Saved Changes");

		})
		.catch((error) => {
		  console.error('Error:', error);
		});

		  console.log("Saved Chanxxxges");
     
    },
  },

  


})



