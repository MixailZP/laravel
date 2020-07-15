@extends('mainlayouts.main')

@section('content')

  <h1 class="text-center">{{$category->name}}</h1><br>

  <div class="container">
    <div class="row">
      @foreach ($products as $product)
        <div class="col-3 mb-4">
          @include('shop._product')
        </div>
      @endforeach
    </div>
    <div class="mt-5 d-flex justify-content-center">
      {{$products->links()}}
    </div>
  </div>

@endsection