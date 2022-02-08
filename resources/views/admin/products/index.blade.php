@extends('layouts.app')

@section('content')
    <section class="products-archive container">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1 class="text-uppercase">
                Products archive
            </h1>
            @if (!$trash->isEmpty())
                <a href="{{ route('admin.products.trash') }}" class="text-danger" style="font-size: 30px">
                    <i class="fas fa-trash"></i>
                </a>
            @endif
        </div>

        @if (session('deleted'))
            <div class="alert alert-success my-4">
                <strong>{{ session('deleted') }}</strong>
                eliminato correttamente
            </div>
        @endif
        
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Brand
                    </th>
                    <th>
                        Novità
                    </th>
                    <th>
                        Category
                    </th>
                    <th colspan="3">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->name_product }}
                        </td>
                        <td>
                            {{ $product->brand }}
                        </td>
                        <td>
                            @if ($product->is_new == 1)
                            SI
                            @else
                            NO
                            @endif
                        </td>
                        <td>
                            @if ($product->category)
                                <a href="{{ route('admin.categories.show', $product->category->id) }}">{{ $product->category->name }}</a>
                            @else
                                Uncategorized
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-success">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Vuoi spostare questo elemento nel cestino? ({{$product->name_product}})')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    {{-- hi everyone --}}
@endsection