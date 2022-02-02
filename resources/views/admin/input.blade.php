@extends('layouts.main-layout')

@section('content')

    <h2>
        Update Product
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach (errors as error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('') }}" method="POST">

        @method('POST')
        @csrf

        <label for="brand">Marca:</label>
        <input type="text" name="brand" placeholder="insert brand" value="{{ $product -> brand }}"><br>
        <label for="name_product">nome del prodotto:</label>
        <input type="text" name="name_product" placeholder="insert name_product" value="{{ $product -> name_product }}"><br>
        <label for="price">prezzo:</label>
        <input type="number" name="price" step="0.01" min="0" value="{{ $product -> price }}"><br>
        <label for="price_detail">prezzo al dettaglio:</label>
        <input type="text" name="price_detail" placeholder="insert price_detail" value="{{ $product -> price_detail }}"><br>
        <label for="description">breve descrizione:</label>
        <input type="text" name="description" placeholder="insert description" value="{{ $product -> description }}"><br>
        <label for="thumb">link all'immagine:</label>
        <input type="text" name="thumb" placeholder="insert thumb" value="{{ $product -> thumb }}"><br>
        <label for="is_new">nuovo prodotto:</label>
        <input type="checkbox" name="is_new" value="{{ $product -> is_new }}"><br>
        <input type="submit">
    </form>


    {{-- nomi colonne database
    brand / string
    name_product / string
    price / float
    price_detail / string
    description / text
    thumb / text
    is_new / bool --}}