@extends('admin.layouts.layout')
@section('admin_page_title')
Edit Attribute
@endsection
@section('admin_layout')
    <div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">EDIT ATTRIBUTE</h5>
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
            <form action="{{route('update.attribute', $attribute_info->id)}}" method="POST">
                @csrf
                @method('PUT')
               <label for="attribute_value"  class="fw-bold mb-2">Name your attribute</label>
               <input type="text" name="attribute_value" value="{{$attribute_info->attribute_value}}">
                <button type="submit" class="btn btn-primary w-100 mt-2">update attribute</button>

            </form>
		</div>
	</div>

@endsection