$(document).ready(function(){
	var base_url = $("#data-url").data();
	$.ajax({
		//Get the base url of the website
		url: base_url['url'] + 'details/getDetails',
		type: "POST",
		success: function(details){
			console.log(details);
			var table = $("#details");
			var tr;
			table.empty();
			//If error message echo the error message otherwise create a table with all user details
			if(details === "No user is logged in."){
				tr = details;
			}else{
				if(details[0]['tussenvoegsel']){
					var tussenvoegsel = details[0]['tussenvoegsel'];
				}else{
					var tussenvoegsel = "";
				}
				tr = '<tr>';
				tr += '</tr><tr><td>Voornaam: </td><td>' + details[0]['voornaam'] + '</td></tr><tr><td>Achternaam: ' + tussenvoegsel + ' </td><td>' + details[0]['achternaam'] + '</td></tr>';
				tr += '<tr><td>Geboortedatum: </td><td>' + details[0]['geboortedatum'] + '</td></tr><tr><td>Geslacht: </td><td>' + details[0]['geslacht'] + '</td></tr><tr><td>Niveau: </td><td>' + details[0]['niveau'] + '</td></tr>';
				tr += '<tr><td>Adres: </td><td>' + details[0]['adres'] + '</td></tr><tr><td>Postcode: </td><td>' + details[0]['postcode'] + '</td></tr><tr><td>Woonplaats: </td><td>' + details[0]['woonplaats'] + '</td></tr>';
				tr += '<tr><td>Telefoonnummer: </td><td>' + details[0]['telefoonnummer'] + '</td></tr><tr><td>Mobiel: </td><td>' + details[0]['mobiel'] + '</td></tr><tr><td>Email: </td><td>' + details[0]['email'] + '</td></tr>';
			}
			table.append(tr);
		},
		error : function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		},
		dataType : 'json'
	});
});
