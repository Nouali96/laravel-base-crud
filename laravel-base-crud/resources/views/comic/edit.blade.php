@extends('layouts.base')

@section('pageTitle') Modifica: {{$pastum->title}} @endsection 
    
@section('content')
    
    <form method="POST" action="{{ route('comic.update', ['pastum' => $pastum->id]) }}" class="container">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value='{{ old('thumb', $pastum->thumb)}}'>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Nome fumetto</label>
            <input type="text" class="form-control" id="title" name="title" value='{{ old('title',$pastum->title)}}'>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" value='{{ old('price',$pastum->price)}}'>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data vendita</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" value='{{ $pastum->sale_date}}'>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" value='{{ old('type',$pastum->type)}}'>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series" name="series" value='{{ old('series',$pastum->series)}}'>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrizione</label>
            <div class="form-floating"> 
                <textarea class="form-control" id="description" name="description" placeholder="Descrizione">{{ old('description',$pastum->description)}}</textarea> 
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
@endsection


