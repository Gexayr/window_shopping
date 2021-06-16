@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="alert alert-danger product-removed">
            product removed from your cart
        </div>
        <div class="row justify-content-center">
            <div class="container mb-4">
                <div class="row">
                    {{--                    @dd($products->isEmpty())--}}
                    @if($products->isEmpty())
                        <h2>You Haven't Any Product In Your Cart</h2>
                    @else
                        <table class="table table-info">
                            <tr>
                                <th width="100"></th>
                                <th> Name </th>
                                <th> Type </th>
                                <th> Price </th>
                                <th>  </th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <a href="{{route('products.show', ['product' => $product->id])}}">
                                            <img class="card-img-top" src="http://placehold.it/50x50&text={{$product->name}}" alt="">
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle;"><h4>{{$product->name}}</h4></td>
                                    <td style="vertical-align: middle;"><h5>{{$product->productType->name}}</h5></td>
                                    <td style="vertical-align: middle;">${{$product->price}}</td>
                                    <td style="vertical-align: middle;">
                                        <a class="btn btn-dark my-2" href="{{route('products.show', ['product' => $product->id])}}"
                                           data-id="{{$product->id}}" role="button">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
