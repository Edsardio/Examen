$(document).ready(function() {
	var base_url = $("#data-url").data();
	$.ajax({
		//Get the base url of the website
		url : base_url['url'] + 'admin/gebruikers/getAllDetails',
		type : "POST",
		success : function(details) {
			var table = $("#details");
			var trU;
			var trA
			var tussenvoegsel;
			table.empty();
			//If error message echo the error message otherwise create a table with all user details
			if (details === "No admin is logged in." || details === "No user is logged in.") {
				trU = details;
			} else {
				var x = 0;
				trU = "<tr><td><b>Klanten:</b></td></tr>";
				trU += "<tr><td>Voornaam</td><td>Tussenvoegsel</td><td>Achternaam</td><td>Geslacht</td><td>Geboortedatum</td><td>Adres</td><td>Postcode</td><td>Woonplaats</td><td>Telefoonnummer</td><td>Mobiel</td><td>Email</td><td>Niveau</td><td>Verwijder</td></tr>";
				trA = "<tr><td>&nbsp;</td></tr><tr><td><b>Beheerders:</b></td></tr>";
				details.forEach(function() {
					if (details[x]['tussenvoegsel'] === null) {
						tussenvoegsel = "";
					} else {
						tussenvoegsel = details[x]['tussenvoegsel']
					}
					if (details[x]['group_id'] === '2') {
						trA += "<tr><td>" + details[x]['voornaam'] + "</td><td>" + tussenvoegsel + "</td><td>" + details[x]['achternaam'] + "</td><td>" + details[x]['geslacht'] + "</td><td>" + details[x]['geboortedatum'] + "</td><td>" + details[x]['adres'] + "</td><td>" + details[x]['postcode'] + "</td><td>" + details[x]['woonplaats'] + "</td><td>" + details[x]['telefoonnummer'] + "</td><td>" + details[x]['mobiel'] + "</td><td>" + details[x]['email'] + "</td><td>" + details[x]['niveau'] + "</td></tr>";
					} else {
						trU += "<tr><td>" + details[x]['voornaam'] + "</td><td>" + tussenvoegsel + "</td><td>" + details[x]['achternaam'] + "</td><td>" + details[x]['geslacht'] + "</td><td>" + details[x]['geboortedatum'] + "</td><td>" + details[x]['adres'] + "</td><td>" + details[x]['postcode'] + "</td><td>" + details[x]['woonplaats'] + "</td><td>" + details[x]['telefoonnummer'] + "</td><td>" + details[x]['mobiel'] + "</td><td>" + details[x]['email'] + "</td><td>" + details[x]['niveau'] + "</td><td onclick='deleteUser(" + details[x]['klant_id'] + ");'><div class='ui small basic button' style='padding: 5px 5px 5px 13px; margin-left: 8px;'><i class='delete icon'></i></a></td></tr>";
					}
					console.log(details[x]['voornaam']);
					x++;
				});
				console.log(details);
			}
			table.append(trU);
			table.append(trA);
		},
		error : function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR);
			console.log(textStatus);
			console.log(errorThrown);
		},
		dataType : 'json'
	});

});

function deleteUser(user) {
	var r = confirm("Weet u zeker dat u deze gebruiker wilt verwijderen?");
	if (r == true) {
		var base_url = $("#data-url").data();
		var temp = $("#data-user").data();
		var admin = temp['user'];
		$.ajax({
			//Get the base url of the website
			url : base_url['url'] + 'admin/gebruikers/deleteUser',
			type : "POST",
			data : {
				'user_id' : user,
				'admin_id' : admin
			},
			success : function(antwoord) {
				var table = $("#error");
				var t = alert(antwoord);
				location.reload();
				console.log(antwoord);
			},
			error : function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			},
			dataType : 'json'
		});
	}else{
		console.log("Delete canceled");
	}
}
