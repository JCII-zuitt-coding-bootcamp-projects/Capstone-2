






var Verify = new Vue({
  el: '#Verify',

  mounted() {
  	

  	
	  	let scanner = new Instascan.Scanner(
		    {
		        video: document.getElementById('preview')
		    }
		);
		scanner.addListener('scan', function(content) {
		    // alert('Escaneou o conteudo: ' + content);
		    Verify.checkQrCode(content);
		    // window.open(content, "_blank");
		});
		Instascan.Camera.getCameras().then(cameras => 
		{
			// alert(cameras.length);
		    if(cameras.length > 0){
		        scanner.start(cameras[0]);
		    } else {
		        alert("Não existe câmera no dispositivo!");
		    }
		});
	  	

	  	// var self = this;
	   //  self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
	   //  self.scanner.addListener('scan', function (content, image) {
	   //    self.scans.unshift({ date: +(Date.now()), content: content });
	   //  });
	   //  Instascan.Camera.getCameras().then(function (cameras) {
	   //    self.cameras = cameras;
	   //    if (cameras.length > 0) {
	   //      self.activeCameraId = cameras[0].id;
	   //      self.scanner.start(cameras[0]);
	   //    } else {
	   //      console.error('No cameras found.');
	   //    }
	   //  }).catch(function (e) {
	   //    console.error(e);
	   //  });

	  	
  	
  },
  data: {
    ticketData: null,
    code : '',

  },


  methods: {


	    checkQrCode : function(code){


	    	if(code == '')
	    	return;


	    	$('#loading_data').modal({
			    backdrop: 'static',
			    keyboard: false
			})
		  	$("#loading_data").modal('show');

	    	// alert("scanning..")
	    	let url = "/admin/verify-ticket/" + code;

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


		  		$("#loading_data").modal('hide');

	    		if(responseData.success){
	    			this.ticketData = responseData.data;
	    			$("#successModal").modal("show");

	    		}else{
	    			// error
	    			// this.errors = responseData.errors;
	    			$("#errorsModal").modal("show");
	    		}

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
	    },


		formatName: function (name) {
	      return name || '(unknown)';
	    },

	    selectCamera: function (camera) {
	      this.activeCameraId = camera.id;
	      this.scanner.start(camera);
	    }



	    
  },


})

