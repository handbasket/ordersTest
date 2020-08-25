<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ChangeStatusOrderController extends Controller
{
    /**
     * Shows a form to change order status
     *
     * @param $id order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page($id)
    {
        if(!is_int((int) $id) || !$order = Order::findByIdentityId($id)){
            throw new NotFoundHttpException();
        }
        $statuses = Status::all();
        return view('admin.change_status_order', [
            'statuses' => $statuses,
            'order' => $order
        ]);
    }

    /**
     * Changes order status
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function change($id, Request $request)
    {
        if(!is_int((int) $id) || !$order = Order::findByIdentityId($id)){
            throw new NotFoundHttpException();
        }
        $order = Order::edit(['status' => $request->get('status')], $order);
        $statusCode = ($order) ? 200 : 500;
        return $request->wantsJson()
            ? new Response('', $statusCode)
            : redirect(route('admin.panel'));
    }
}
