<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddOrderController extends Controller
{
    /**
     * Shows a form to add an order
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page()
    {
        return view('admin.add_order');
    }

    /**
     * Adds order
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $order = Order::add([
            'user_id' => Auth::user()->id,
            'text' => $request->post('text'),
            'status' => 'new'
        ]);
        $statusCode = ($order) ? 201 : 500;
        return $request->wantsJson()
            ? new Response('', $statusCode)
            : redirect(route('admin.panel'));
    }
}
