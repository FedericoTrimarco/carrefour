@extends('layouts.app')

@section('content')
    <section class="container">

        <h2>
            New Product
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
    
        <form action="{{ route('admin.products.store') }}" method="POST">
    
            @method('POST')
            @csrf
            <div>
                <label for="brand" class="form-label">Marca:</label>
                <input type="text" name="brand" id="brand" placeholder="insert brand" class="form-control" value="{{ old('brand') }}">
                @error('brand')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div>
                <label for="name_product" class="form-label">nome del prodotto:</label>
                <input type="text" name="name_product" id="name_product" placeholder="insert name_product" class="form-control" value="{{ old('name_product') }}">
                @error('name_product')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div>
                <label for="price" class="form-label">prezzo:</label>
                <input type="number" name="price" id="price" step="0.01" min="0" class="form-control" value="{{ old('price') }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div>
                <label for="price_detail" class="form-label">prezzo al dettaglio:</label>
                <input type="text" name="price_detail" id="price_detail" placeholder="insert price_detail" class="form-control" value="{{ old('price_detail') }}">
                @error('price_detail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div>
                <label for="description" class="form-label">breve descrizione:</label>
                <input type="text" name="description" id="description" placeholder="insert description" class="form-control" value="{{ old('description') }}">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div>
                <label for="thumb" class="form-label">link all'immagine:</label>
                <input type="text" name="thumb" id="thumb" placeholder="insert thumb" class="form-control" value="{{ old('thumb') }}">
                @error('thumb')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="d-flex align-items-center py-3">
                <label for="is_new" class="m-0 mr-2">nuovo prodotto</label>
                <input
                    type="checkbox"
                    name="is_new"
                    id="is_new"
                    @if (old('is_new')) checked @endif
                >
            </div>
    
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
        {{-- nomi colonne database
        brand / string
        name_product / string
        price / float
        price_detail / string
        description / text
        thumb / text
        is_new / bool 
        bau--}}
    </section>
@endsection