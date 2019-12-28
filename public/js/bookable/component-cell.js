Vue.component('cell', {
  props: [
  		'data',
  		'children',
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
    	  		 v-bind:style= "[isCurrentlySelected(num) ? {backgroundColor : 'rgba(208, 209, 210)', border : '4px dashed green' } : {backgroundColor : 'transparent', border : '1px solid grey' } ]"
    	  >
    	  		
    	  		<template v-if="hasChild( cId( num ) )">

    	  			<cell v-bind:data=" newChild( num ) "
    	  				  v-bind:children="children"
    	  				  v-bind:selector_controller="selector_controller"
    	  				  >
    	  			</cell>

    	  		</template>
    	  		<template v-else>
    	  			<!-- {{ cId( num )  }} -->
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

    	// return an action for parent cells
    	if( this.hasChild( this.cId( num ) ) ){
    		// console.log('The program run in a parent cell');
    		return null;
    	}else{
    		//pure child action
    		// return this.print(  num  ); // just print as of now 

    		this.selector_controller.toggleAddCellID( this.cId( num ) );
    	}
    },

    isCurrentlySelected : function ( num ){
    	return this.selector_controller.selected.includes( this.cId( num )  );
    },

  }


})