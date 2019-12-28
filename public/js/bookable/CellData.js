var CellData = new Vue({
  el: '#cellData',
  data: {
    message: 'Hello Vue!',

    template_name : "Template 1",
    selector_controller : SelectorController ,
    cells : {
    		origin : {
    			parent_cell : 'c', //is the main
		    	col : 1,
		    	row : 1,
    		},

    		children : [

		  //   	{
		  //   			parent_cell : 'c_1',
		  //   			col : 4,
		  //   			row : 3,
				// }


		    ],


    },


  },


  methods: {


  		deleteChild : function(){
  			let index = this.selectedChildIndex();
  			// delete this.cells.children[index];
  			this.cells.children.splice(index, 1);// delete element

  		},

    	addEditChild : function(col,row){

    		if( !this.selectedIsChild() ){
    			//create 1
    			console.log(this.selector_controller.selected[0]);
	    		this.cells.children.push({
	    			parent_cell : this.selector_controller.selected[0],
	    			col : parseInt(col),
	    			row : parseInt(row),
	    		});
	    		console.log("created!");
    		}else{

    			let index = this.selectedChildIndex();

	    		this.$set(this.cells.children, index , {
	    			parent_cell : this.selector_controller.selected[0],
	    			col : parseInt(col),
	    			row : parseInt(row),
	    		})
    			console.log("edited na" , this.selectedChildIndex());
    		}
    		
    		// this.selector_controller.reset();
    		
    	},

    	selectedIsChild : function ( ){
    		let cId = this.selector_controller.selected[0];

    		//map first the parent_cell in array of json
	        return this.cells.children.map(function(child, index, arr){
				    return child.parent_cell;
			}).includes( cId );
	    },

	    // get the array index of a child cell // or selectedCellIndex
	    selectedChildIndex: function() {
	    	let cId = this.selector_controller.selected[0];
	    	// console.log("vvvv:" + cId);
	    	return this.cells.children.findIndex(function(item, i){
					  return item.parent_cell === cId;
					});
	    },

	    getParentCellId: function(){
    		let child_cId = this.selector_controller.selected[0];
    		// return selected_cId.slice(0, -2);	//remove the last 2 character in the cid to get its parent id
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


  },

})



