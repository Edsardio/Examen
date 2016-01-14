function getCursusDetails() {
	var details = $('#details');
	var selected = $('#niveau').val();
	var text;
	var beginner = ["500", "3"];
	var gevorderde = ["700", "2"];
	var wadtocht = ["800", "1"];
	details.empty();
	switch(selected) {
	case 'Beginner':
		text = 'Prijs: €<span name="prijs" id="prijs">' + beginner[0] + '</span><input type="hidden" name="prijs" id="prijs" value="' + beginner[0] + '"><br> Type boot: <span id="boot">' + ajax(beginner[1]) + '</span><input type="hidden" name="typex" id="typex" value="' + beginner[1] + '">';
		break;
	case 'Gevorderde':
		text = 'Prijs: €<span name="prijs" id="prijs">' + gevorderde[0] + '</span><input type="hidden" name="prijs" id="prijs" value="' + gevorderde[0] + '"><br> Type boot: <span id="boot">' + ajax(gevorderde[1]) + '</span><input type="hidden" name="typex" id="type" value="' + gevorderde[1] + '">';
		break;
	case 'Wadtocht':
		text = 'Prijs: €<span name="prijs" id="prijs">' + wadtocht[0] + '</span><input type="hidden" name="prijs" id="prijs" value="' + wadtocht[0] + '"><br> Type boot: <span id="boot">' + ajax(wadtocht[1]) + '</span><input type="hidden" name="typex" id="typex" value="' + wadtocht[1] + '">';
		break;
	default:
		text = 'Geen cursus geselecteerd.';
	}
	details.append(text);
}

function ajax(type) {
	var base_url = $("#data-url").data();
	$.ajax({
		url : base_url['url'] + 'admin/inplannen/getDetails',
		type : "POST",
		data : {
			'type' : type
		},
		success : function(details) {
			console.log(details['0']['boottype']);
			console.log($('#boot').val());
			$('#boot').html(details['0']['boottype']);
		},
		error : function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		},
		dataType : 'json'
	});
}

function datumStart(){
	var datum = $("#startdatum").val();
	var date = new Date(datum);
	var seconds = date.setTime(date);
	var counted = seconds + 5 * 86400000;
	var newDate = new Date(counted);
	var day = newDate.getDate();
	var month = newDate.getMonth(newDate) + 1;
	var year = newDate.getFullYear(newDate);
	if(String(day).length == "1"){
		newDay = '0' + String(day);
	}else{
		newDay = String(day);
	}
	if(String(month).length == "1"){
		newMonth = '0' + String(month);
	}else{
		newMonth = String(month);
	}
	var combined = year + '-' + newMonth + '-' + newDay;
	$("#einddatum").val(combined);
}

function datumEnd(){
	var datum = $("#einddatum").val();
	var date = new Date(datum);
	var seconds = date.setTime(date);
	var counted = seconds - 5 * 86400000;
	var newDate = new Date(counted);
	var day = newDate.getDate();
	var month = newDate.getMonth(newDate) + 1;
	var year = newDate.getFullYear(newDate);
	if(String(day).length == "1"){
		newDay = '0' + String(day);
	}else{
		newDay = String(day);
	}
	if(String(month).length == "1"){
		newMonth = '0' + String(month);
	}else{
		newMonth = String(month);
	}
	var combined = year + '-' + newMonth + '-' + newDay;
	$("#startdatum").val(combined);
}
