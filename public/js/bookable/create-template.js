

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

	  <div @click=" checkAction( num ) " v-for="num in (data.col * data.row)" 
	  		style="background-color: rgba(255, 255, 255, 0.8); border: 1px solid rgba(0, 0, 0, 0.8);"
	  		v-bind:style= "[isCurrentlySelected(num) ? {backgroundColor : 'rgba(195, 213, 232)' } : '#fff' ]"


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


var SelectorController = new Vue({
 
  // el: '#app',

  data: {
    message: 'Hello Vue!',
    selected : [], //selected cells

  },

  methods: {

  	toggleAddCellID : function (cID){
    	// _.xor(this.selected, [cID]);
    	if( this.selected.includes(cID) ){
    		// remove since already their
    		console.log( 'Cell: ' + cID + ' is REMOVED! ');

    		let index = this.selected.indexOf(cID);
    		this.selected.splice(index, 1);
    	}else{
    		console.log( 'Cell: ' + cID + ' is ADDED! ');
    		this.selected.push(cID);
    	}
    },

  } 

})



var CellsDivision = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    selector_controller : SelectorController ,
    cells : {
    		origin : {
    			parent_cell : 'c', //is the main
		    	col : 4,
		    	row : 4,

		    	padding: 0,
    		},

    		children : [

		    	{
		    			parent_cell : 'c_4',
		    			col : 2,
		    			row : 9,

		    			padding: 0,

				},
				{
					parent_cell : 'c_5',
					col : 3,
					row : 2,

					padding: 0,
				},
				{
					parent_cell : 'c_5_3',
					col : 5,
					row : 3,

					padding: 0,
				}


		    ],


    },

    



  }
})



