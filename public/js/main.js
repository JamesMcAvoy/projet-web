$(() => {
	//main

	/**
	 * submit connection form
	 */
	$('#SubmitConnexion').click((e) => {
		if($('#EmailConnexion').val() === '') {
			e.preventDefault()
			$('#EmailConnexion').addClass('is-invalid')
			$('#EmailConnexion ~ div').text('Le courriel est vide')
		}
		if($('#MotDePasseConnexion').val() === '') {
			e.preventDefault()
			$('#MotDePasseConnexion').addClass('is-invalid')
			$('#MotDePasseConnexion ~ div').text('Le MDP est vide')
		}
	})

	/**
	 * Register
	 */
	$('[data-toggle="tooltip"]').tooltip();							
	$( "form" ).submit(function( event ) {
	  if ( ($( "#MotDePasseConfirmation" ).val() === $( "#MotDePasseInscription" ).val()) && ($( "#MotDePasseInscription" ).val()!== '' )&& ($( "#MotDePasseConfirmation" ).val()!== '' )&& ($( "#NomInscription" ).val()!== '' )&& ($( "#PrenomInscription" ).val()!== '' )&& ($( "#Email" ).val()!== '' )) {
		return;
	  }
	  else
	  {
		$("#NomInscription").addClass("is-valid");
		$("#PrenomInscription").addClass("is-valid");
		$("#Email").addClass("is-valid");
		$("#MotDePasseInscription").addClass("is-valid");
		$("#MotDePasseConfirmation").addClass("is-valid");
		
		if($( "#MotDePasseConfirmation" ).val() !== $( "#MotDePasseInscription" ).val())
		{
			$("#MotDePasseConfirmation").removeClass("is-valid");
			$("#MotDePasseConfirmation").addClass("is-invalid");
		}
		if($( "#NomInscription" ).val() == '')
		{
			$("#NomInscription").addClass("is-invalid");
		}
		if($( "#PrenomInscription" ).val() == '')
		{
			$("#PrenomInscription").addClass("is-invalid");
		}
		if($( "#Email" ).val() == '')
		{
			$("#Email").addClass("is-invalid");
		}
		if($( "#MotDePasseInscription" ).val() == '')
		{
			$("#MotDePasseInscription").addClass("is-invalid");
			$("#feedbackMDP").text("Veuillez rentrer un mot de passe");
		}
		/* if(Mot de passe invalide)
		{
		$("#feedbackMDP").text("Le mot de passe ne respecte pas les conditions: Au moins: Une majuscule / Une minuscule / Un chiffre / 8 caractères");
		} */
		
	  event.preventDefault();
	  }
	});

	$('#events-list').DataTable({
	  "paging"      : true,
	  "lengthChange": false,
	  "pageLength"  : 10,
	  "searching"   : true,
	  "ordering"    : false,
	  "info"        : true,
	  "autoWidth"   : false,
	  "language": {
		"sProcessing":     "Traitement en cours...",
		"sSearch":         "Rechercher&nbsp;:",
		"sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
		"sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
		"sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
		"sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
		"sInfoPostFix":    "",
		"sLoadingRecords": "Chargement en cours...",
		"sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
		"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
		"oPaginate": {
			"sFirst":      "Premier",
			"sPrevious":   "Pr&eacute;c&eacute;dent",
			"sNext":       "Suivant",
			"sLast":       "Dernier"
		},
		"oAria": {
			"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
			"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
		}
	  }
	});

		
	function getXMLHttpRequest() {
		var xhr = null;
		
		if (window.XMLHttpRequest || window.ActiveXObject) {
			if (window.ActiveXObject) {
				try {
					xhr = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
			} else {
				xhr = new XMLHttpRequest(); 
			}
		} else {
			alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
			return null;
		}
		return xhr;
	}
		
	$('.like').click(function() {
		var xhr = getXMLHttpRequest();
		console.log('like');
		xhr.open("POST", "/ideas/like/"+$(this).attr('id'), true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("");
	});


	$(".btn_buy").click(function() {
		$.post("/shop/buy/"+$(this).attr('id'))
	})




})