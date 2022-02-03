@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center my-5">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ $product->thumb }}" class="img-fluid rounded-start" alt="{{ $product->name_product }}">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title">{{ $product->brand }}</h4>
              <h5 class="card-title">{{ $product->name_product }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <div>
                <p class="card-text mb-0"><small class="text-muted">{{ $product->price_detail }}</small></p>
                <p class="card-text">€ {{ $product->price }} </p>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection