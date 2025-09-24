@extends('admin.layouts.layout')

@section('admin_page_title')
    Manage category
@endsection

@section('admin_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">ALL CATEGORIES</h5>
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
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{route('show.cat', $category->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('delete.cat',$category->id)}}" method="POST">
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
