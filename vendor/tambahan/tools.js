function uploadFoto(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#gambarTampil').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  
  $("#gambarAmbil").change(function() {
    uploadFoto(this).fadeIn();
  });


  function uploadUsaha(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#gambarUsaha').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  
  $("#gambarAmbUsaha").change(function() {
    uploadUsaha(this).fadeIn();
  });


	$(document).ready(function() {
	  //var cek = $('#tampilPassword').val();
	  $('.tampilPassword').click(function() {
	    if ($(this).is(':checked')) {
	      $('.tampilinPass').attr('type', 'text');
	    } else {
	      $('.tampilinPass').attr('type', 'password');
	    }
    });

    $(".passTaksama").hide();
    
    $('#pass2').keyup(function (e) 
    { 
      var pass1 = $(".tampilinPass").val();
      var pass2 = $("#pass2").val();

      if (pass1=="" && pass2=="") 
      {
        $("#pass2").removeClass("merahAlert"); 
        $("#tampilinPass").removeClass("merahAlert"); 
        $(".passTaksama").hide();
      } 
      else 
      {
        if (pass2!=pass1) 
        {
          $("#pass2").addClass("merahAlert"); 
          $(".tampilinPass").addClass("merahAlert"); 
          $(".passTaksama").fadeIn(1000);
          //return false; 
        } 
        else 
        {
          $("#pass2").removeClass("merahAlert"); 
          $(".tampilinPass").removeClass("merahAlert"); 
          $("#pass2").addClass("hijauAlert"); 
          $(".tampilinPass").addClass("hijauAlert"); 
          $(".passTaksama").fadeOut(1000);
          //return true; 
        }
      }

      $(".regist").click(function (e) 
      { 
        var pass1 = $(".tampilinPass").val();
        var pass2 = $("#pass2").val();
        if (pass2==pass1) 
        {
          return true;
         // submi
          
         
        } 
        else 
        {
          return false;
        }
        
      });

      
    });
 



  
	});

  
    
  