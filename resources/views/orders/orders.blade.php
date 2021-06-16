@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="alert alert-danger product-removed">
            product removed from your cart
        </div>
        <div class="row justify-content-center">
            <div class="container mb-4">
                <div class="row">
                    @if($orders->isEmpty())
                        <h2>You have no orders</h2>
                    @else
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th> Date </th>
                                <th>  </th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <a href="{{route('orders.show', ['order' => $order->id])}}">
                                            Order № {{$order->id}}
                                        </a>
                                    </td>
                                    <td style="vertical-align: middle;">{{$order->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
