var SelectorController = new Vue({
 
  // el: '#SelectorController',

  data: {
    phase : 'Divisioning',
            // Divisioning
            // Bookable
            // Designing
            // FinalLook
    selected : [], //selected cells

  },

  methods: {

    //add or remove a cell Id in selected array
  	toggleAddCellID : function (cID){

    	if( this.selected.includes(cID) ){
    		// Removing cell
    		// console.log( 'Cell: ' + cID + ' is REMOVED! ');
    		let index = this.selected.indexOf(cID);
    		this.selected.splice(index, 1);
    	}else{

            if( !this.isInMultipleSelect() ){
                this.selected = []; // remove previous selected since its not multiple mode
            }
    		
            // console.log( 'Cell: ' + cID + ' is ADDED');
            this.selected.push(cID);

    	}


    },

    isInMultipleSelect : function(){

      if(this.phase == 'Divisioning'){
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

      // create action depending on the current phase


      switch(this.phase) {
        case 'Divisioning':

            if(new_selected.length == 0 ){
              CellDivisionController.resetColsRows();
            }else{

                  //division phase
                  if(CellData.selectedIsChild()){
                      let cellData = CellData.getCellColsRows(); // the selected one

                      CellDivisionController.setColsRows(cellData.col,cellData.row);
                  }else{
                      CellDivisionController.resetColsRows();

                  }

            }  

        break;

        case 'Bookable':
            
            if(new_selected.length == 0 ){
              CellDivisionController.resetBookableDetails();
            }else{

                  //Bookable phase

                  if(CellData.cellIsBookable()){
                      let details = CellData.getBookableDetails(); // the bookable details of selected one

                      CellDivisionController.setBookableDetails(details.name,details.price);
                  }else{
                      CellDivisionController.resetBookableDetails();


                  }

            } 

        break;


        default:
          // code block
      }
      

    },

    //if phase changes, remove any selected
    phase :  function (new_phase, old_phase) {
      this.reset();
    }

  },

})