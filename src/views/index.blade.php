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

        <div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="/img/sweet.png" alt="First slide">
                    </div>

                    <div class="carousel-item">
                         <img src="/img/iphoneX.jpg" alt="Second slide">
                    </div>

                    <div class="carousel-item">
                        <img src="/img/4chan.jpg" alt="Third slide">
                    </div>

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
        </div>

        <h2>Ne ratez pas les événements de ce mois-ci :</h2>

        <div>

        <div class="card-group">
          <div class="card">
            <img class="card-img-top" src="/img/nuitInfo.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/img/lan.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="/img/event.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
        
        </div>
		<div id="membres" class="row">
		<h2 class="col-md-12">Membres du BDE</h2>
			<div class="col-md-3 col-sm-12">
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
			<div class="col-md-3 col-sm-12">
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
			<div class="col-md-3 col-sm-12">
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
			<div class="col-md-3 col-sm-12">
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