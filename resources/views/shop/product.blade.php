@extends('layouts.app')

@section('content')

  <h1 class="text-center">{{$product->name}}</h1><br>

  <div class="container">
    <div class="row">
        <div class="col-6 mb-4 offset-2">
          <div class="border">
              <img src="{{$product->img}}" alt="" class="img-fluid img-thumbnail shadow mx-auto d-block">
              <h4>{{$product->name}}</h4>
              <div class="border-top">
                <strong>Description:</strong> {{$product->description}}
              </div>
              <div class="border-top">
                <strong>Price:</strong> {{$product->price}} <b>$</b>
              </div>
              <div class="border-top">
                <strong>Category:</strong> {{$product->category ? $product->category->name : 'None'}}
              </div>
              <div class="border-top">
                <strong>Comment:</strong> {{$review[count($review) - 1]->review}} --- 
                <b>Left: </b> {{$review[count($review) - 1]->created_at}} ---
                <b>By: </b> {{$user}}
              </div>
          </div>

          <h3>Add Review</h3>
          @guest
            Login or redister
          @else
            <form action="/product/{{$product->slug}}" method="POST">
              @csrf
              <div class="form-group">
                <textarea name="comment" cols="30" rows="10" class="form-control"></textarea>
                <button class="btn btn-primary">Send</button>
              </div>
              <input type="hidden" name="product" value="{{$product->id}}">
              <input type="hidden" name="user" value="{{Auth::user()->id}}">
            </form>
          @endguest
        </div>
    </div>
  </div>

@endsection