@extends('layouts.app')

@section('content')
<section class="container">

    <h2>
        Modifica: {{ $product->name }}
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

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="brand" class="form-label">Marca:</label>
            <input type="text" name="brand" id="brand" placeholder="Insert brand" class="form-control" value="{{ old('brand', $product->brand->name) }}">
{{--             <Brands :brands="{{ json_encode($brands) }}" :old_input="{{ json_encode(old('brand', '')) }}" /> --}} 
{{-- Questa riga al momento richiama una componente Vue globale che dovrebbe funzionare ma non va. Per il create funziona ma qui no e non so perché. --}}
            @error('brand')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nome prodotto:</label>
            <input type="text" name="name" id="name" placeholder="insert name product" class="form-control" value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="number" name="price" id="price" step="0.01" min="0" class="form-control" value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price_detail" class="form-label">Dettaglio prezzo:</label>
            <input type="text" name="price_detail" id="price_detail" placeholder="insert price_detail" class="form-control" value="{{ old('price_detail', $product->price_detail) }}">
            @error('price_detail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria:</label>
            <select name="category_id" class="form-control">
                <option value="">Uncategorized</option>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @if ($category->id == old('category_id', $product->category_id))) selected @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
            <input type="text" name="description" id="description" placeholder="insert description" class="form-control" value="{{ old('description', $product->description) }}">
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <h4>Immagine prodotto</h4>
            <figure class="py-2">
                <div>Anteprima immagine preesistente:</div>
                <img width="200" src="{{ asset("storage/{$product->thumb}") }}" alt="Anteprima immagine prodotto">
            </figure>
            <label class="label-control" for="thumb">Carica l'immagine da sostituire:</label>
            <input class="form-control-file" type="file" name="thumb" id="thumb">
            @error('thumb')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center py-3">
            <label for="is_new" class="m-0 mr-2">Nuovo prodotto</label>
            <input type="checkbox" name="is_new" id="is_new" @if (old('is_new', $product->is_new)) checked @endif>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
@endsection