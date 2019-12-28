var SelectorController = new Vue({
 
  el: '#templateEditor',

  data: {
    phase : 'Division',
    selected : [], //selected cells

  },

  methods: {

    //add or remove a cell Id in selected array
  	toggleAddCellID : function (cID){

    	if( this.selected.includes(cID) ){
    		// Removing cell
    		console.log( 'Cell: ' + cID + ' is REMOVED! ');
    		let index = this.selected.indexOf(cID);
    		this.selected.splice(index, 1);
    	}else{

            if( !this.isInMultipleSelect() ){
                this.selected = []; // remove previous selected since its not multiple mode
            }
    		
            console.log( 'Cell: ' + cID + ' is ADDED');
            this.selected.push(cID);

    	}


    },

    isInMultipleSelect : function(){

      if(this.phase == 'division'){
        return false;
      }else{
        return false;
      }

    },

    

    reset : function(){
        this.selected = [];
    },

    hasSelected : function(){
        return this.selected.length > 0 ? true : false;
    },



  },

  watch: {

    selected: function (new_selected, old_selected) {

      if(new_selected.length == 0 ){
        // console.log("zero");
        CellDivisionController.resetColsRows();
      }

    },

  },

})