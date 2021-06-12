@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="container mb-4">
                <div class="row">
{{--                    @dd($products)--}}
                    @foreach($products as $item)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h2>{{$item->productType->name}}</h2>
                                <a href="{{route('products.show', ['product' => $item->id])}}">
                                    <img class="card-img-top" src="http://placehold.it/650x450&text={{$item->name}}" alt="">
                                </a>
                                <a class="text-reset" href="#"><h3 class="card-title display-4">{{Str::of($item->name)->limit(8)}}</h3></a>
                                <h6>${{$item->price}}</h6>
                                <a class="btn btn-dark my-2" href="#" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
