<div class="border wrap">
  @if ( $product->recommended )
    <div class="recommended">Recommended</div>
  @endif
  
  <a href="/product/{{$product->slug}}">
    <img src="{{$product->img}}" alt="{{$product->img}}" class="img-fluid mx-auto d-block imgClass">
    <div class="border-top ref" >
      {{$product->name}}
    </div>
    <div class="border-top ref">
      Price: {{$product->price}} $
    </div>
    <div class="border-top ref">Category: {{$product->category->name ?? 'No category'}} </div>
    <div class="border-top ref">Comments count: {{$product->reviews->count()}} </div>
  </a>
</div>