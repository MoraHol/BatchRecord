$('input#user-submit').on('click', function(){
        	var user1 = $('input#user1').val();
        	if ($.trim(user1) != '') {
        		$.post('../html/controller/savedata8.php',{user1: user1}, function(data){

        			$('div#firma-data').text(data);

        		});


        	}


    });