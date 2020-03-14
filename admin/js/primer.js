	$('#buscar').keyup(function (event) {
		
		var contenido = new RegExp($(this).val(), 'i');

		$('tr').hide();

		$('tr').filter(function () {
			
			return contenido.test($(this).text());

		}).show();

		$('.cabecera').attr('style','');
	});

	$('.button-collpase').sideNav();
	$('select').material_select();
	$('.datepicker').pickadate({
		format:'yyyy-m-d',
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year,
	    today: 'Today',
	    clear: 'Clear',
	    close: 'Ok',
	    closeOnSelect: false // Close upon selecting a date,
	});

	function may(obj , id) {
		
	obj = obj.toUpperCase();
	document.getElementById(id).value = obj;
}