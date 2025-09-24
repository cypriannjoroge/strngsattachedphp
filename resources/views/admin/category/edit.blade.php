@extends('admin.layouts.layout')
@section('admin_page_title')
Edit category
@endsection
@section('admin_layout')
    <div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">EDIT CATEGORY</h5>
		</div>
		<div class="card-body">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  

        @if(session('message'))
            <div class="alert alert-success">
              {{session('message')}}    
            </div>        
        @endif
            <form action="{{route('update.cat', $category_info->id)}}" method="POST">
                @csrf
                @method('PUT')
               <label for="category_name"  class="fw-bold mb-2">Name your category</label>
               <input type="text" name="category_name" value="{{$category_info->category_name}}">
                <button type="submit" class="btn btn-primary w-100 mt-2">update category</button>

            </form>
		</div>
	</div>

@endsection