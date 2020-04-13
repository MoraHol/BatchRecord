$('input#name-submit').on('click', cargarData)

function  cargarData() {
	var name = $('select#name').val();
	if ($.trim(name) != '') {
		$.post('../html/controller/savedata.php',{name: name}, function(data){

			$('div#name-data').text(data);

		});
		$.post('../html/controller/savedata2.php',{name: name}, function(data){

			$('div#name-data2').text(data);

		});
		$.post('../html/controller/savedata3.php',{name: name}, function(data){

			$('div#name-data3').text(data);

		});
		$.post('../html/controller/savedata4.php',{name: name}, function(data){

			$('div#name-data4').text(data);

		});
		$.post('../html/controller/savedata5.php',{name: name}, function(data){

			$('div#name-data5').text(data);

		});
		$.post('../html/controller/savedata6.php',{name: name}, function(data){

			$('div#name-data6').text(data);

		});
		$.post('../html/controller/savedata7.php',{name: name}, function(data){

			$('div#name-data7').text(data);

		});

	}
}