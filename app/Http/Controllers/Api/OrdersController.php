<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\Order as OrderResource;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page');
        $searchStatus = $request->get('status');
        $orders = Order::query();
        if ($searchStatus){
            $orders = $orders->where('status', '=', $searchStatus);
        }
        $orders = $orders->orderBy('id')->paginate($perPage ?? 15);
        $orderCollection = new OrderCollection($orders);
        if($searchStatus){
            $orderCollection->withQuery(["status"=>"{$searchStatus}"]);
        }
        if($perPage){
            $orderCollection->withQuery(["per_page"=>"{$perPage}"]);
        }
        return $orderCollection;
    }

    public function show(Order $order)
    {
        OrderResource::withoutWrapping();
        return new OrderResource($order);
    }

    public function update(Request $request, Order $order)
    {
        $order = Order::edit(['status' => $request->get('status')], $order);
        if($order){
            return response(new OrderResource($order), 200)->send();
        }
        return response('$validator->failed()', 400)->send();
    }
}
