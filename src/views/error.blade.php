
@extends('template')
    
    @section('title')
        ERROR
    @stop
    
    @section('main_content')    
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">AH!</h4>
            <p class="A">{{ $code }} error  </p>
            <hr>
            <p class="A">Oups désolé  {{ $message }} 
            <img class="smiley" src="/img/{{$smiley}}" alt="smiley"> </p>
        </div>

        <div class="oui"><img class="logo" src="/img/{{$background}}" alt="logo bde"></div>
    @stop