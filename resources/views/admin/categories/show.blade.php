@extends('layouts.app')

@section('content')
    <section class="container">
        <h1 class="mb-5">{{$category->name}}</h1>

        @foreach ($category->products as $product)
            <a href="{{route('admin.products.show', $post->id)}}">
                <div class="card" style="width: 18rem;">
                    <img src="{{$product->thumb}}" class="card-img-top" alt="{{$product->title}}">
                    <div class="card-body">
                      <h4 class="card-title">{{$product->title}}</h4>
                      <h5 class="card-title">{{$product->brand}}</h5>
                      <p class="card-text">{{$product->description}}</p>
                      <p class="card-text">{{$product->price}}</p>
                    </div>
                  </div>
            </a>
        @endforeach
    </section>
@endsection