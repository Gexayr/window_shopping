@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="container mb-4">
                <div class="row">
{{--                    @dd($products)--}}
                    @foreach($products as $product)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h2>{{$product->productType->name}}</h2>
                                <a href="{{route('products.show', ['product' => $product->id])}}">
                                    <img class="card-img-top" src="http://placehold.it/650x450&text={{$product->name}}" alt="">
                                </a>
                                <a class="text-reset" href="#"><h3 class="card-title display-4">{{Str::of($product->name)->limit(8)}}</h3></a>
                                <h6>${{$product->price}}</h6>
                                <a class="btn btn-dark my-2 add-to-cart" href="javascript: void(0)" data-id="{{$product->id}}" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
