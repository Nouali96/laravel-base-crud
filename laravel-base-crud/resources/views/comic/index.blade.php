@extends('layouts.base')

@section('pageTitle', 'Fumetti')
    
@section('content')
    <div class="container">
        <a class="btn btn-warning mt-5" href="{{route('comic.create')}}" role="button">Aggiungi nuovo fumetto</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Immagine</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Prezzo</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td>{{$comic->id}}</td>
                        <th><img src="{{$comic->thumb}}" alt="img"></th>
                        <td>{{$comic->title}}</td>
                        <td>{{$comic->type}}</td>
                        <td>{{$comic->price}} $</td>
                        <td>
                            <a class="btn btn-primary mt-5" href="{{route('comic.show', $comic->id)}}" role="button">Vedi</a>
                            <a class="btn btn-warning mt-5" href="{{route('comic.edit', $comic->id)}}" role="button">Modifica</a>
                            <form method="POST" action="{{route('comic.destroy',['pastum' => $comic->id])}}">
                                
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-danger">Elimina</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            
            
            </tbody>
        </table>
    </div>
@endsection