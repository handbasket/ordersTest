@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a href="{{route('user.orders', $user->id)}}" class="btn btn-primary">View orders</a>
                                        <a href="{{route('user.orders', $user->id)}}?status=processed" class="btn btn-primary">View processed orders</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->appends(['per_page' => $perPage ?? 15])->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
