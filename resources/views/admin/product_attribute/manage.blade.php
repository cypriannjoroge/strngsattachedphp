@extends('admin.layouts.layout')

@section('admin_page_title')
    Manage Default attribute
@endsection

@section('admin_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">ALL Default Attributes</h5>
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
                            <th>Attribute</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allattributes as $attribute)
                            <tr>
                                <td>{{ $attribute->id }}</td>
                                <td>{{ $attribute->attribute_value }}</td>
                                <td>
                                    <a href="{{route('show.attribute', $attribute->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('delete.attribute',$attribute->id)}}" method="POST">
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
