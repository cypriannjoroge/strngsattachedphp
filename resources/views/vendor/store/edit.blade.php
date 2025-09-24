@extends('vendor.layouts.layout')
@section('vendor_page_title')
Edit store
@endsection
@section('vendor_layout')
    <div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">EDIT STORE</h5>
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
            <form action="{{route('update.store', $store_info->id)}}" method="POST">
                @csrf
                @method('put')
               <label for="store_name"  class="fw-bold mb-2">Name your store</label>
               <input type="text" name="store_name" value="{{$store_info->store_name}}">
               <label for="slug"  class="fw-bold mb-2">Slug your store</label>
               <input type="text" name="slug" value="{{$store_info->slug}}">
               <label for="details"  class="fw-bold mb-2">Details your store</label>
               <input type="text" name="details" value="{{$store_info->details}}">
                <button type="submit" class="btn btn-primary w-100 mt-2">update store</button>

            </form>
		</div>
	</div>

@endsection