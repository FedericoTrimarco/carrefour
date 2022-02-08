@extends('layouts.app')

@section('content')
    <section class="trashed-archive container">
        <h1>CESTINO</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trashed as $trash_item)
                    <tr>
                        <td>{{ $trash_item->id }}</td>
                        <td>{{ $trash_item->name_product }}</td>
                        <td>
                            <a href="{{ route('admin.product.restore', $trash_item->id) }}" class="btn btn-primary">Restore</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.product.forceDelete', $trash_item->id) }}" class="btn btn-danger" onclick="return confirm('Eliminare definitivamente questo elemento? ({{ $trash_item->name_product }})' )">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    {{-- hi everyone --}}
@endsection