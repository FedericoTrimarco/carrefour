@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>
            Update Product
        </h2>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    
            @method('PUT')
            @csrf
    
            <label for="brand" class="form-label">Marca:</label>
            <input type="text" name="brand" placeholder="insert brand" value="{{ $product->brand }}" class="form-control"><br>
    
            <label for="name_product" class="form-label">nome del prodotto:</label>
            <input type="text" name="name_product" placeholder="insert name_product" value="{{ $product->name_product }}" class="form-control"><br>
    
            <label for="price" class="form-label">prezzo:</label>
            <input type="number" name="price" step="0.01" min="0" value="{{ $product->price }}"><br>
    
            <label for="price_detail" class="form-label">prezzo al dettaglio:</label>
            <input type="text" name="price_detail" placeholder="insert price_detail" value="{{ $product->price_detail }}" class="form-control"><br>
    
            <label for="description" class="form-label">breve descrizione:</label>
            <input type="text" name="description" placeholder="insert description" value="{{ $product->description }}" class="form-control"><br>
    
            <label for="thumb" class="form-label">link all'immagine:</label>
            <input type="text" name="thumb" placeholder="insert thumb" value="{{ $product->thumb }}" class="form-control"><br>
    
            <label for="is_new" class="form-label">nuovo prodotto:</label>
            <input type="checkbox" name="is_new" value="{{ $product->is_new }}"><br>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
    </div>
@endsection