@extends('admin.layouts.layout')
@section('admin_page_title')
Create default Attribute
@endsection
@section('admin_layout')
    <div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">CREATE DEFAULT ATTRIBUTE</h5>
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

        @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}}    
            </div>        
        @endif
            <form action="{{route('attribute.create')}}" method="POST">
                @csrf
               <label for="atrribute_value"  class="fw-bold mb-2">Name your Attribute</label>
               <input type="text" name="attribute_value" class="form-control" placeholder="Type of cloth">
                <button type="submit" class="btn btn-primary w-100 mt-2">Add Attribute</button>

            </form>
		</div>
	</div>

@endsection