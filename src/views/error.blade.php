
@extends('template')
    
    @section('title')
        BDE Exia Strasbourg
    @stop
    
    @section('main_content')    
       
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="bde" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Erreur</title>
        <link rel="stylesheet" href="css/styleErreur.css" />
        <link rel="icon" href="favicon.ico" />
    </head>
    <body>
        
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">AH!</h4>
            <p class="A">{{ $code }} error  </p>
            <hr>
            <p class="A">Oups désolé la page {{ $message }} n'existe pas <img class="smiley" src="/img/{{$smiley}}" alt="smiley"> </p>
        </div>

        <div class="oui"><img class="logo" src="/img/{{$background}}" alt="logo bde"></div>
    </body>
</html>
    @stop