@extends('admin.layouts.layout')
@section('admin_page_title')
Create Sub category
@endsection
@section('admin_layout')
    <div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">CREATE SUBCATEGORY</h5>
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
            <form action="{{route('store.subcat')}}" method="POST">
                @csrf
               <label for="subcategory_name"  class="fw-bold mb-2">Name your subcategory</label>
               <input type="text" name="subcategory_name" class="form-control" placeholder="Type of cloth">

               <label for="category_id"  class="fw-bold mb-2">Select Category</label>
               <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $Category)
                    <option value="{{$Category->id}}">{{$Category->category_name}}</option>
                @endforeach
               </select>

                <button type="submit" class="btn btn-primary w-100 mt-2">Add subcategory</button>

            </form>
		</div>
	</div>

@endsection