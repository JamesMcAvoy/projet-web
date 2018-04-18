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
          @foreach($events as $event)
            <div class="card">
              <img class="card-img-top" src="/events/img/{{ $event->event_id }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $event->event_title }}</h5>
                <p class="card-text">{{ $event->event }}</p>
                <a href="/events/{{ $event->event_id }}" class="btn btn-primary">Accéder à l'événement</a>
              </div>
              <div class="card-footer">
                <small class="text-muted">Le {{ date('j/m à H:i:s', strtotime($event->start_date)) }}</small>
              </div>
            </div>
          @endforeach
          @else
            Il n'y a aucun événement ce mois-ci actuellement
          @endif
        </div>

    </section>
	@stop