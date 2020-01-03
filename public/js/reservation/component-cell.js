Vue.component('cell', {
  props: [
  		'data',
      'children',
  		'bookable',
      'reservations',
  		'selector_controller'
	],
  template: `
  	<div 
  		style="display: grid;  height:100%; width:100%; background-color: #fff;"
  		v-bind:style="{
  						      gridTemplateColumns: 'repeat( '+ data.col +' , 1fr)',
        						gridAutoRows : '1fr',
                    
                    }"
  	>

    	  <div v-for="num in (data.col * data.row)"
             @click=" checkAction( num )"  
             
    	  		 style=" border: ;"
    	  >
    	  		
    	  		<template v-if="hasChild( cId( num ) )">

    	  			<cell v-bind:data=" newChild( num ) "
    	  				  v-bind:children="children"
                  v-bind:bookable="bookable"
                  v-bind:reservations="reservations"

    	  				  v-bind:selector_controller="selector_controller"
    	  				  >
    	  			</cell>

    	  		</template>
    	  		<template v-else>
    	  			<!-- {{ cId( num )  }} -->
              <!-- Final design -->


              <div v-if="isBookable( num )" style="background-color:white; width: 100%; height:100%; padding:10%;">
                <div style=" word-wrap: break-word; font-size: 1vw; cursor: pointer; width: 100%; height:100%; border-radius:10px;" class="text-center"
                    v-bind:style="{
                                  backgroundColor: getBackgroundColor(num),
                                  
                                  }"
                >
                  <!--{{ getBookableNameCode(num)  }}-->

                </div>    
              </div>

    	  		</template>	



    	  </div>

	</div>
  `,


  methods: {

  	//check if a cell has children
    hasChild: function(cid) {
      
      //map all the parent_cell inside all array json and find if a parent_cell is included
      return this.children.map(function(child, index, arr){
		    return child.parent_cell;
	  }).includes(cid);

    },

    // get the array index of a child cell
    index: function(cid) {
    	return this.children.findIndex(function(item, i){
				  return item.parent_cell === cid
				});
    },

    // generate cell id for current cell
    cId : function (number) {
    	return this.data.parent_cell + '_' + number;
    },

    //return a copy of a cell setting under children to be bind in the cell components
    newChild : function ( num ){
    	return this.children[ this.index( this.cId( num ) ) ];
    },

    print : function ( num ){
    	alert( this.cId( num )  );
    },

    checkAction : function ( num ){
      let cid = this.cId( num );
    	// return an action for parent cells
    	if( this.hasChild( cid ) ){
    		// console.log('The program run in a parent cell');
    		return null;
    	}else{
    		//pure child action

        //dapat di pa selected para pwede e reserve
        if( !this.reservations.includes( cid ) ){
          this.selector_controller.toggleAddCellID( this.cId( num ) );
        }
    		
    	}
    },

    // @dblclick="checkActionDblClick(num)"
    // checkActionDblClick : function ( num ){
    //   // this.selector_controller.toggleAddCellID( this.cId( num ) );
    //   CellData.selectParentCellId();
    // },



    isCurrentlySelected : function ( num ){
    	return this.selector_controller.selected.includes( this.cId( num )  );
    },




    // Bookable...

    isBookable : function ( num ){
      // console.log( this.bookable[ this.cId( num ) ]);
      return this.bookable[ this.cId( num ) ] != undefined ? true : false;

    },

    getBookableNameCode : function ( num ){
      // console.log( this.bookable[ this.cId( num ) ]);
      return this.bookable[ this.cId( num ) ].name;

    },

    getBackgroundColor : function ( num ){
      // return "blue";
      let cid = this.cId( num );


      if( this.isCurrentlySelected( num ) ){
            return '#48afde'; // selected for possible reservations
      }

      if( this.reservations.includes( cid ) ){
            return '#999898'; // already reserved
      }

      return '#eee'; // available

      // if( this.reservations.includes( cid ) ){

      //     if( this.isCurrentlySelected( num ) ){
      //       return '#48afde'; // selected for possible reservations
      //     }else{
      //       return '#999898'; // already reserved
      //     }

      // }else{
      //   return '#eee'; // available
      // }

    },

    


  }


})