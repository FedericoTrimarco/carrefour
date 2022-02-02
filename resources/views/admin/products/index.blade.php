@extends('layouts.app')

@section('content')
    <section class="products-archive container">
        <h1 class="text-uppercase mb-5">
            Products archive
        </h1>

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
                            {{ $product->title }}
                        </td>
                        <td>
                            {{ $product->brand }}
                        </td>
                        <td>
                            <a href="{{ route('admin.products.show', $post->id) }}" class="btn btn-primary">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.products.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection