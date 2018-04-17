@extends('template')

	@section('title')
		Boutique 
	@stop
	
	@section('main_content')

	

	<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">BOUTIQUE</h1>
          <p class="lead text-muted">Bienvenue sur la boutique officielle du BDE de l'exia Strasbourg. Nous vous souhaitons un bon shopping !</p>
          <p>
          
          @if(isset($user))
            <a href="/profil#panier" class="btn btn-secondary my-2">Accéder au panier</a>
          @endif
          </p>
        </div>
      </section>

      <div class="container">
      @if($goodies->isEmpty())
        La boutique est actuellement vide
      @endif
      <table id="goodies-list">
        <thead>
          <tr>
            <th></th>
            <th><h3>Catégorie</h3></th>
            <th><h3>Nom</h3></th>
            <th><h3>Description</h3></th>
            <th><h3>Prix</h3></th>
            <th><h3>Quantité</h3></th>
            @if(isset($user))
            <th></th>
            @endif
          </tr>
        </thead>
        <tbody>
      	@foreach($goodies as $item)
        @if($item->item_number > 0)
          <tr class="ligne_item">
            <td>
              <img src="/shop/img/{{ $item->item_id }}" class="image_item" alt="Image item">
            </td>
            <td>{{ $item->category->category_name }}</td>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->item_desc }}</td>
            <td>{{ $item->item_price }} €</td>
            <td>{{ $item->item_number }}</td>
            @if(isset($user))
              <td>
                <a href="/shop/{{ $item->item_id }}" class="btn btn-primary">Ajouter au panier</a>
              </td>
            @endif
          </tr>
        @endif
      	@endforeach
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th><h3>Catégorie</h3></th>
            <th><h3>Nom</h3></th>
            <th><h3>Description</h3></th>
            <th><h3>Prix</h3></th>
            <th><h3>Quantité</h3></th>
            @if(isset($user))
            <th></th>
            @endif
          </tr>
        </tfoot>
      </table>
      </div>

    </main>

	@stop