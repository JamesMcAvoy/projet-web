@extends('template')

	@section('title')
		Événements BDE Exia
	@stop
	
	@section('main_content')

	

	<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">BOUTIQUE</h1>
          <p class="lead text-muted">Bienvenue sur la boutique officiel du BDE de l'exia Strasbourg. Nous vous souhaiton un bon shopping!</p>
          <p>
            <a href="#" class="btn btn-primary my-2">se connecter</a>
            <a href="#" class="btn btn-secondary my-2">Panier</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
		@*foreach($goodies as $thisGoodie)
         <!-- <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{$thisGoodie->$item_picture}}" alt="image {{$thisGoodie->$item_name}}">
                <div class="card-body">
                  <h3 class="card-title">{{$thisGoodie->$item_name}}</p>
				  <p class="card-text">{{$thisGoodie->$item_desc}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      
                      <button type="button" class="btn btn-sm btn-outline-secondary">Acheter</button>
                    </div>
                    <small class="text-muted">{{item_price}} €</small>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
		@*endforeach
        </div>
      </div>

    </main>

	@stop