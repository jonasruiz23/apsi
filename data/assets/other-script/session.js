   var session_secs = (60*5);
  
	var countdown_secs = 10;
    var session_over = false;

    var session_count = 0;
	var countdown_count = session_secs;	

    $(document).ready(function() {

        setInterval(session_counter, 1000);
		setInterval(countdown, 1000);	

        function session_counter(){

        	if(session_count == session_secs){

                window.location.href="logout.php";

                    /*
        		$(document).ready($('#session_modal').modal('show'));
        		countdown_count = countdown_secs;
                session_over = true;
        */
        	} 
       		console.log('secs: ' + session_count);

        	session_count+= 1;
        }

        function countdown(){ 

        	if(countdown_count <= 0 && session_over){
             console.log('click');
                //$('#myform').submit();
                
           
            
        	} 

        	document.getElementById("count").innerHTML = countdown_count + ' seconds';

     	  //console.log('cnter: ' + countdown_count);


           


        	   --countdown_count;
        }


 
        //
    });


    $('#btn_session_yes').click( function(){
		 $( "#session_modal" ).modal('hide');
           session_count = 0;
           session_over = false;
	});


    $('body').mousemove(function(){
        session_count = 0;
    });
    
