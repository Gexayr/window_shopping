<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Http\Requests;
use Cookie;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderRepository->userAllOrders();

        return view('orders.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if(empty($order)){
            abort(404);
        }

        $products = $this->orderRepository->getProducts($order);

        return view('orders.order', compact(['order', 'products']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request, int $id)
    {
        $inCart = \Cookie::get('inCart');
        if(is_null($inCart)){
            $inCart = [];
        } else {
            $inCart = json_decode($inCart, true);
        }

        array_push($inCart, $id);
        $inCart = array_unique($inCart);

        return $this->setCookie('inCart', json_encode($inCart));
    }

    public function removeFromCart(int $id)
    {
        $inCart = json_decode(request()->cookie('inCart'), true);
        $inCart = array_unique($inCart);
        foreach ($inCart as $key=>$value) {
            if($value == $id) {
                unset($inCart[$key]);
            }
        }

        return $this->setCookie('inCart', json_encode($inCart));
    }

    public function checkout()
    {
        $inCart = json_decode(\Cookie::get('inCart'), true);

        $inCart = array_unique($inCart);

        $makeOrder = $this->orderRepository->makeOrder($inCart);
        if($makeOrder) {
            setcookie("inCart", "", time() - 3600);
        }

        $orders = $this->orderRepository->userAllOrders();
        return view('orders.orders', compact('orders'));

    }

    private function setCookie($name, $data)
    {
        $response = new Response('Hello World');
        $response->withCookie(cookie()->forever($name, $data));
        return $response;
    }

}
