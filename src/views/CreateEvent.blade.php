@extends('template')
	
	@section('title')
		Créer un Evenement
	@stop
	
	@section('main_content')	
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form method="post" action="/createEvent">
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="event_title" class="col-sm-2 col-form-label">Nom de l'évenement</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="event_title" placeholder="Titre" name="event_title">
			  <div class="invalid-feedback">
				Veuillez rentrer le titre de l'évenement
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="Evenement" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="Evenement" placeholder="Evenement" name="event">
			  <div class="invalid-feedback">
				Veuillez rentrer La description de l'evenment
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="Prix" class="col-sm-2 col-form-label">Prix</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" id="Prix" placeholder="Prix" name="event_price" min="0" max="100">
			  <div class="invalid-feedback">
				Veuillez rentrer le prix de l'évenement
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="image" class="col-sm-2 col-form-label">Image</label>
			<div class="col-sm-6">
			  <input type="file" class="form-control" id="image" placeholder="image" name="event_picture">
			  <div class="invalid-feedback">
				Veuillez ajouter une photo
			  </div>
			</div>
			</div>
			<div class="form-group row">
			<div class="col-sm-2">
		  </div>
			<label for="datetime" class="col-sm-2 col-form-label">date </label>
			<div class="col-sm-6">
			  <input type="datetime" class="form-control" id="datetime" placeholder="Date"  title ="year, month, day, hour, minute, second, and fraction of a second" name="start_date" >
				<div id="feedbackMDP" class="invalid-feedback">
				</div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="time" class="col-sm-2 col-form-label">Duée de l'évenement</label>
			<div class="col-sm-6">
            <input type="number" class="form-control" id="time" placeholder="durée" name="time">
			  <div class="invalid-feedback">
				Veuillez rentrer la durée de l'évenement
			  </div>
			</div>
		  </div>
          <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="between" class="col-sm-2 col-form-label">temps entre deux évenement l'évenement</label>
			<div class="col-sm-6">
            <input type="number" class="form-control" id="between" placeholder="between" name="time_between_each">
			  <div class="invalid-feedback">
				Veuillez entrer le temps entre les évenements
			  </div>
			</div>
		  </div>
          <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="récurence" class="col-sm-2 col-form-label">récurence de l'évenement</label>
			<div class="col-sm-6">
            <input type="number" class="form-control" id="récurence" placeholder="récurence" name="event_number">
			  <div class="invalid-feedback">
				Veuillez entrer la récurence de l'évenement
			  </div>
			</div>
		  </div>
          <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="state" class="col-sm-2 col-form-label">Etat de l'évenement</label>
			<div class="col-sm-6">
            <select form="form-control" id="state" placeholder="state" name="event_number">
                <option value="up">actif</option>
                <option value="ended">terminé</option>
                <option value="blocked">bloqué</option>
            </select>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-4">
			  <button type="submit" class="btn btn-outline-dark">Créer</button>
			</div>
		  </div>
		  <div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-7">
				</div>
			</div>
		</form>
		</div>
	</div>
	@stop