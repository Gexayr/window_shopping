@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="alert alert-success product-added">
            <strong>Success!</strong> product added in your cart
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>{{$product->name}}</h1>
                    </div>

                    <div class="card-body">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <h2>{{$product->productType->name}}</h2>
                                <a href="#">
                                    <img class="card-img-top" src="http://placehold.it/650x450&text={{$product->name}}" alt="">
                                </a>
                                <a class="text-reset" href="#"><h3 class="card-title display-4"></h3></a>
                                <h6>${{$product->price}}</h6>

                                <table class="table">
                                    @foreach($product->productType->properties as $property)
                                    <tr>
                                        <td>{{$property->name}}</td>
                                        <td>
                                        @foreach($product->properties as $product_property)
                                                {{ $product_property->name . " " . $product_property->value }}
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                <a class="btn btn-dark my-2 add-to-cart" href="javascript: void(0)" data-id="{{$product->id}}" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
