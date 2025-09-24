@extends('vendor.layouts.layout')

@section('vendor_page_title')
    Manage store
@endsection

@section('vendor_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Manage Store</h5>
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
                            <th>Store Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td>{{ $store->store_name }}</td>
                                <td>{{ $store->slug }}</td>
                                <td>{{ $store->details }}</td>
                                <td>
                                    <a href="{{route('update.store', $store->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('delete.store',$store->id)}}" method="POST">
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
