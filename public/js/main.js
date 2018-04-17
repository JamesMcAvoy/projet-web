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

		if($(location).attr('href')=='http://localhost:8080/events#events' || $(location).attr('href')=='http://localhost:8080/events#form' || $(location).attr('href')=='http://localhost:8080/events#ideas')
		{
			console.log('bonne page');
			$('.bouton_event').click(function() {
				console.log('cliqué');
				scrollTo($(this).attr('href').substring(1));
				
			});
		}
})