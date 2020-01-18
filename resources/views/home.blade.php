@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="links">
                        <a href="{{ url('/product')}}">get post from shopify</a>
                    </div>
                    You are logged in!
                    <table class="table bordered">
                        <thead>
                            <th>Product</th>
                            <th>SIZE</th>
                            <th>Price</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td>hello</td>
                            <td>hello</td>
                            <td>hello</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
