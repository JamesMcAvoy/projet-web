@extends('template')
	
	@section('title')
		BDE Exia Strasbourg
	@stop
	
	@section('main_content')	
        <div class="baniere">
            <h1>BDE EXIA STRASBOURG</h1>
        </div>
		
    <section>
        
        <h2>Articles les plus vendus :</h2>

          @if(!$goodies->isEmpty())
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">

                  @foreach($goodies as $key => $item)
                  <div class="carousel-item{{ ($key == 0) ? ' active' : '' }}">
                       <img src="/shop/img/{{ $item->item_id }}" alt="Slide item boutique" />
                  </div>
                  @endforeach

              </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          @else
            Il n'y a aucun article en boutique à vendre actuellement
          @endif

        <h2>Ne ratez pas les événements de ce mois-ci :</h2>

        <div class="card-group">
          @if(!$events->isEmpty())
			<div class="row">
          @foreach($events as $event)
            <div class="card col-md-4">
              <img class="card-img-top" src="/events/img/{{ $event->event_id }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $event->event_title }}</h5>
                <p class="card-text">{{ $event->event }}</p>
                <a href="/events/{{ $event->event_id }}" class="btn btn-primary">Accéder à l'évènement</a>
              </div>
              <div class="card-footer">
                <small class="text-muted">Le {{ date('j/m à H:i:s', strtotime($event->start_date)) }}</small>
              </div>
            </div>
          @endforeach
			</div>
          @else
            Il n'y a aucun événement ce mois-ci actuellement
          @endif
        </div>

		<div id="membres" class="row">
		<h2 class="col-md-12">Membres du BDE</h2>
			<div class="col-md-3 col-sm-12 ">
				<div class="personne col-md-12 col-sm-6">
					<h5>Président</h5>
					<h5>Pierre Froidevaux</h5>
					<img src="/img/membre/pierre.jpg" class="img_membre" alt="">
				</div>
				<div class="personne col-md-12 col-sm-6">
					<h5>Vice-président</h5>
					<h5>Romain Muller</h5>
					<img src="/img/membre/muller.jpg" class="img_membre" alt="">
				</div>
			</div>
			<div class="col-md-3 col-sm-12 ">
				<div class="personne col-md-12 col-sm-6">
					<h5>Trésorier</h5>
					<h5>Romain Kauffman</h5>
					<img src="/img/membre/kauffman.jpg" class="img_membre" alt="">
				</div>
				<div class="personne col-md-12 col-sm-6">
					<h5>Vice-trésorier</h5>
					<h5>Gulay Kozludere</h5>
					<img src="/img/membre/gulay.jpg" class="img_membre" alt="">
				</div>
			</div>
			<div class="col-md-3 col-sm-12 ">
				<div class="personne col-md-12 col-sm-6">
					<h5>Secrétaire</h5>
					<h5>Riadjy Bhiki</h5>
					<img src="/img/membre/riadjy.jpg" class="img_membre" alt="">
				</div>
				<div class="personne col-md-12 col-sm-6">
					<h5>Vice-secrétaire</h5>
					<h5>Stephen Wintzenreith</h5>
					<img src="/img/membre/stephen.jpg" class="img_membre" alt="">
				</div>
			</div>
			<div class="col-md-3 col-sm-12 ">
				<div class="personne col-md-12 col-sm-6">
					<h5>Community manager</h5>
					<h5>Vincent Pansera</h5>
					<img src="/img/membre/pansera.jpg" class="img_membre" alt="">
				</div>
				<div class="personne col-md-12 col-sm-6">
					<h5>Vice community manager</h5>
					<h5>François Schaefer</h5>
					<img src="/img/membre/schaefer.jpg" class="img_membre" alt="">
				</div>
			</div>
		</div>

    </section>
	@stop