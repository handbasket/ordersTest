@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin panel</div>
                <div class="card-body">
                    <a href="{{route('order.add.form')}}" class="btn btn-primary">Add order</a>
                    <a href="{{route('users')}}" class="btn btn-primary">Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
