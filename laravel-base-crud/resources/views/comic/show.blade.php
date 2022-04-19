@extends('layouts.base')

@section('pageTitle') {{$comic->title}} @endsection
    
@section('content')

    <div class="container">
        <h1>{{$comic->title}}</h1>
        <div><img src="{{$comic->thumb}}" alt=""></div>
        <div><strong>Serie: </strong>{{$comic->series}}</div>
        <div><strong>Tipo: </strong>{{$comic->type}}</div>
        <div><strong>Prezzo: </strong>{{$comic->price}} $</div>
        <div><strong>Data di vendita: </strong>{{$comic->sale_date}}</div>
        <div><strong>Descrizione: </strong>{{$comic->description}}</div>
   
    
    <a class="btn btn-primary mt-5" href="{{route('comic.index')}}" role="button">Torna alla lista</a>
    </div>
    @endsection