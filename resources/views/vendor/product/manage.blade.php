@extends('vendor.layouts.layout')

@section('vendor_page_title')
    Manage  product
@endsection

@section('vendor_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Manage product</h5>
        </div>

        @if(session('message'))
            <div class="alert alert-success">
              {{session('message')}}    
            </div>        
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <form action="{{route('vendor.delete.product',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
