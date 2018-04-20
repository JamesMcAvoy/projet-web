



@extends('template')
	
	@section('title')
		BDE Exia Strasbourg
	@stop
	
	@section('main_content')
<h1 class="h1Admin" >Binvenue sur la page d'administration du site</h1>

<h2 class="h2Admin">Gestion des evenement</h2>

<h3>-créé un evenement</h3>
<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form method="post" action="/createEvent" enctype="multipart/form-data">
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
			<label for="event_picture" class="col-sm-2 col-form-label">Image</label>
			<div class="col-sm-6">
			  <input type="file" class="form-control" id="event_picture" placeholder="image" name="event_picture">
			  <div class="invalid-feedback">
				Veuillez ajouter une photo
			  </div>
			</div>
			</div>
			<div class="form-group row">
			<div class="col-sm-2">
		  </div>
			<label for="date" class="col-sm-2 col-form-label">date </label>
			<div class="col-sm-6">
			  <input type="date" class="form-control" id="date" placeholder="Date" name="date" >
				<div id="feedbackMDP" class="invalid-feedback">
				</div>
			</div>
		  </div>
			<div class="form-group row">
			<div class="col-sm-2">
		  </div>
			<label for="hour" class="col-sm-2 col-form-label">Heure </label>
			<div class="col-sm-6">
			  <input type="time" class="form-control" id="hour" placeholder="Heure" name="hour" >
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
			<label for="between" class="col-sm-2 col-form-label">temps entre deux évenement</label>
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
				<select id="state" placeholder="state" name="event_state">
          <option value="up">up</option>
          <option value="ended">ended</option>
          <option value="blocked">blocked</option>
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
<h3>-idées proposées</h3>

	<div class="row">
		@if($ideas->isEmpty())
			Il n'y a aucune idée proposée actuellement
		@else
			@foreach($ideas as $idea)
			<div class="col-md-4">
			  <div class="card mb-4 box-shadow">
				<div class="card-body">
				  <p class="card-text">{{ $idea->idea_title }}<span class="text-muted">, {{ $idea->User->first_name }} {{ $idea->User->name_user }}</span></p>
				  <div class="d-flex justify-content-between align-items-center">
				  	{{ $idea->idea }}
				  	@if(isset($user))
					<span class="like" id="{{ $idea->idea_id }}">
						<i class="fas fa-thumbs-up"></i>
					</span>
					@endif
					<small class="text-muted">{{ $idea->idea_number_vote }}</small>
				  </div>
				</div>
				<div class="card-footer text-muted">
					Proposé le {{ date('j/m à H:i:s', strtotime($idea->post_at)) }}

					<div  class="flex-container btnadmin">

					<button  type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#popupFormIdea">
  					valider
					</button>


					<a type="button" href="/ideas/block/{{ $idea->idea_id }}" class="btn btn-outline-dark">blocker</a>

				</div>

					<div class="modal fade" id="popupFormIdea" tabindex="-1" role="dialog" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" >valider une idée</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">

					        <div class="jumbotron jumbotron-fluid">
							<div class="container">
							<form method="post" action="/createEvent" enctype="multipart/form-data">
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
								<label for="date" class="col-sm-2 col-form-label">date </label>
								<div class="col-sm-6">
								  <input type="date" class="form-control" id="date" placeholder="Date" name="date" >
									<div id="feedbackMDP" class="invalid-feedback">
									</div>
								</div>
							  </div>
								<div class="form-group row">
								<div class="col-sm-2">
							  </div>
								<label for="hour" class="col-sm-2 col-form-label">Heure </label>
								<div class="col-sm-6">
								  <input type="time" class="form-control" id="hour" placeholder="Heure" name="hour" >
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
								<label for="between" class="col-sm-2 col-form-label">temps entre deux évenement</label>
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
									<select id="state" placeholder="state" name="event_state">
					          <option value="up">up</option>
					          <option value="ended">ended</option>
					          <option value="blocked">blocked</option>
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
							</form>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			  </div>
					
				</div>
			  </div>
			</div>
			@endforeach
		@endif
	</div>

<h3></h3>

<h2 class="h2Admin">Gestion des utilisateurs</h2>

<h3>-membres du BDE</h3>

<h4>-créé</h4>

<h4>-editer</h4>

<h4>-suprimer</h4>

<h3>-autres utilisateurs</h3>

<h2 class="h2Admin">Gestion de la boutique</h2>

<h3>Créé une categorie d'article</h3>

<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form method="post" action="/createCategory" enctype="multipart/form-data">
		  
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="category_name" class="col-sm-2 col-form-label">Nom de la categorie</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="category_name" placeholder="Nom de la categorie" name="category_name">
			  <div class="invalid-feedback">
				Veuillez rentrer le nom de la categorie
			  </div>
			</div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-4">
			  <button type="submit" class="btn btn-outline-dark">Ajouter</button>
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
		  

<h3>Ajouter un article </h3>

<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form method="post" action="/CreateItem" enctype="multipart/form-data">

		<div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="item_name" class="col-sm-2 col-form-label">Nom de l'article</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="item_name" placeholder="Article" name="item_name">
			  <div class="invalid-feedback">
				Veuillez rentrer Le nom de l'article
			  </div>
			</div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="item_desc" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="item_desc" placeholder="description" name="item_desc">
			  <div class="invalid-feedback">
				Veuillez rentrer La description de l'article
			  </div>
			</div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="item_price" class="col-sm-2 col-form-label">Prix</label>
			<div class="col-sm-6">
			  <input type="number" class="form-control" id="item_price" placeholder="Prix" name="item_price">
			  <div class="invalid-feedback">
				Veuillez rentrer le prix de l'évenement
			  </div>
			</div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="item_picture" class="col-sm-2 col-form-label">Image</label>
			<div class="col-sm-6">
			  <input type="file" class="form-control" id="item_picture" placeholder="image" name="item_picture">
			  <div class="invalid-feedback">
				Veuillez ajouter une photo
			  </div>
			</div>
			</div>
			
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="stock" class="col-sm-2 col-form-label">quantité de stock</label>
			<div class="col-sm-6">
            <input type="number" class="form-control" id="item_number" placeholder="stock" name="item_number">
			  <div class="invalid-feedback">
				Veuillez rentrer la quantité d'article disponible
			  </div>
			</div>
		  </div>

          <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="category" class="col-sm-2 col-form-label">catégories de l'article</label>
			<div class="col-sm-6">			
				<select id="category" placeholder="category" name="category_id">
				@foreach($categories as $category)
				<option value= "{{  $category->category_id }}" > {{  $category->category_name }} </option>
				@endforeach
          </select>
			</div>
		  </div>

		  <div class="form-group row">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-4">
			  <button type="submit" class="btn btn-outline-dark">ajouter</button>
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

	