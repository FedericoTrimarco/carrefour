@extends('layouts.app')

@section('content')
    <section class="container">
        <h1 class="mb-5">{{$category->name}}</h1>

        <div class="row align-items-stretch">
            @foreach ($category->products as $product)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="text-decoration-none" href="{{route('admin.products.show', $product->id)}}">
                        <div class="h-100 card p-2">
                            <div class="flex-grow-1">
                                <img src="{{$product->thumb}}" class="card-img-top" alt="{{$product->title}}">
                            </div>
                            <div class="d-flex flex-column h-100 justify-content-center">
                                <div>
                                    <h4 class="card-title">{{$product->title}}</h4>
                                    <h5 class="card-title">{{$product->brand}}</h5>
                                    <p class="card-text">{{$product->description}}</p>
                                    <p class="card-text">{{$product->price}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection