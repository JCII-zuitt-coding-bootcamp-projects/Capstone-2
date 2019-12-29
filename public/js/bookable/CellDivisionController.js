var CellDivisionController = new Vue({
 
  el: '#cellDivisionController',

  data: {
    selector : SelectorController ,
    cellData : CellData,

    //divisitioning
    cols : 1,
    rows : 1,

    //cell bookable
    name: "",
    price: 0,


  },

  methods: {



    resetColsRows : function(){
      this.cols = 1;
      this.rows = 1;
      // console.log("RESEtted!");
    },

    setColsRows : function(cols,rows){
      this.cols = cols;
      this.rows = rows;
    },


    resetBookableDetails : function(){
      this.name = "";
      this.price = 0;
      // console.log("RESEtted!");
    },

    setBookableDetails : function(name,price){
      this.name = name;
      this.price = price;
    },
    

    // delete : function(){
    //   this.cellData.chil
    // },
    

  },

  watch: {
    // whenever question changes, this function will run
    cols: function (newcols, oldCols) {
      if( this.selector.hasSelected() ){
        this.cellData.addEditChild(this.cols, this.rows)
      }
    },

    rows: function (newRows, oldRows) {
      if( this.selector.hasSelected() ){
        this.cellData.addEditChild(this.cols, this.rows)
      }
    },



  },

})