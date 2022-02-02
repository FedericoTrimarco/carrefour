@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center my-5">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title">{{ Auth::product()->brand }}</h4>
              <h5 class="card-title">{{ Auth::product()->name_product }}</h5>
              <p class="card-text">{{ Auth::product()->description }}</p>
              <div>
                <p class="card-text mb-0"><small class="text-muted">{{ Auth::product()->price_detail }}</small></p>
                <p class="card-text">€ {{ Auth::product()->price }} </p>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
