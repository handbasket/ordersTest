<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersController extends Controller
{
    /**
     * Shows a list of users
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function page(Request $request)
    {
        $perPage = $request->get('per_page', 15);
        $users = User::query()->paginate($perPage);
        return view('admin.users', [
            'users' => $users,
            'perPage' => $perPage
        ]);
    }
}
