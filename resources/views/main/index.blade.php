@extends('layouts.app')

@section('content')
  <h2 class="text-center">Categories</h2><br>

  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-4 mb-4">
          <div class="border wrap">
            <a href="/category/{{$category->slug}}">
              <img src="{{$category->img}}" alt="{{$category->img}}" class="img-fluid mx-auto d-block imgClass">
              <div class="border-top ref">
                {{$category->name}} ({{$category->products->count()}})
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <h2 class="text-center">Products</h2><br>

  <div class="container">
    <div class="row">
      @foreach ($products as $product)
        <div class="col-4 mb-4">
          @include('shop._product')
        </div>
      @endforeach
    </div>
  </div>

  <h2 class="text-center">Comments</h2><br>

  <div class="container">
    <div class="row">
      @foreach ($comments as $comment)
        <div class="col-4 mb-4">
          <div class="border">
              {{$comment->review}}
              <div class="border-top">
                <b>Сomment left:</b> {{$comment->created_at}}
              </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
