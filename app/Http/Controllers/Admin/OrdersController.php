<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrdersController extends Controller
{
    /**
     * Shows orders for a specific user with pagination
     *
     * @param $user_id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function userOrders($user_id, Request $request)
    {
        if(!is_int((int) $user_id) || !$user = User::findByIdentityId($user_id)){
            throw new NotFoundHttpException();
        }
        $perPage = $request->get('per_page', 15);
        $searchStatus = $request->get('status');
        $orders = Order::query()->where('user_id', '=', $user->id);
        if ($searchStatus){
            $orders = $orders->where('status', '=', $searchStatus);
        }
        $orders = $orders->paginate($perPage);
        return view('admin.user_orders', [
            'orders' => $orders,
            'perPage' => $perPage,
            'searchStatus' => $searchStatus
        ]);
    }
}
