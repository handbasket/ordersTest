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
                                <th scope="col">Text</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->text}}</td>
                                    <td>{{$order->status}}</td>
                                    <td><a href="{{route('order.change.status.form', $order->id)}}" class="btn btn-primary">Change status</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$orders->appends(['per_page' => $perPage ?? 15, 'status' => $searchStatus  ])->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
