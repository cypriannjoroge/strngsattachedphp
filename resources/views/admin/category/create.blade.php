@extends('admin.layouts.layout')
@section('admin_page_title')
Create category
@endsection
@section('admin_layout')
    <div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">CREATE CATEGORY</h5>
		</div>
		<div class="card-body">
            <form action="{{route('st
            ore.cat')}}" method="POST">
                @csrf
               <label for="category_name"  class="fw-bold mb-2">Name your category</label>
               <input type="text" name="category_name" class="form-control" placeholder="Type of cloth">
                <button type="submit" class="btn btn-primary w-100 mt-2">Add category</button>

            </form>
		</div>
	</div>

@endsection