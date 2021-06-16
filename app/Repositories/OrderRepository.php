<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\User;

class OrderRepository
{
    protected $order;
    protected $orderProducts;

    public function __construct(Order $order, OrderProducts $orderProducts)
    {
        $this->order = $order;
        $this->orderProducts = $orderProducts;
    }

    public function all()
    {
        return $this->order->all();
    }
    public function userAllOrders()
    {
        return $this->order->where('user_id', \Auth::id())->orderBy('id', 'desc')->get();
    }

    public function find($id): ?Order
    {
        return $this->order->find($id);
    }

    public function makeOrder(array $inCart)
    {

        $user = User::find(\Auth::id());

        $order = $this->order->create([
            'user_id' => \Auth::id()
        ]);
        $count = 0;
        foreach ($inCart as $product_id) {
            $product = Product::find($product_id);

            $price = $product->price + ($product->price * $user->calculationType->percent * 0.01);
            $iserted = $this->orderProducts->create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $price,
            ]);
            if($iserted)$count++;
        }

        return count($inCart) == $count;

    }

    public function getProducts(Order $order)
    {
        $orderProducts = $order->products;

        $products = collect([]);
        foreach($orderProducts as $orderProduct) {
            $orderedProduct = $orderProduct->product;
            $orderedProduct->price = $orderProduct->price;
            $products->push($orderedProduct);
        }

        return $products;
    }

}
