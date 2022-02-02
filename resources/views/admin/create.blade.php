@extends('layouts.main-layout')

@section('content')

    <h2>
        New Product
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
        <input type="text" name="brand" placeholder="insert brand"><br>
        <label for="name_product">nome del prodotto:</label>
        <input type="text" name="name_product" placeholder="insert name_product"><br>
        <label for="price">prezzo:</label>
        <input type="number" name="price" step="0.01" min="0"><br>
        <label for="price_detail">prezzo al dettaglio:</label>
        <input type="text" name="price_detail" placeholder="insert price_detail"><br>
        <label for="description">breve descrizione:</label>
        <input type="text" name="description" placeholder="insert description"><br>
        <label for="thumb">link all'immagine:</label>
        <input type="text" name="thumb" placeholder="insert thumb"><br>
        <label for="is_new">nuovo prodotto:</label>
        <input type="checkbox" name="is_new"><br>
        <input type="submit">
    </form>

    {{-- brand / string
    name_product / string
    price / float
    price_detail / string
    description / text
    thumb / text
    is_new / bool --}}