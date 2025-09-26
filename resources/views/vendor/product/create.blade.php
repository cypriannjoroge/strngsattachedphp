@extends('vendor.layouts.layout')
@section('vendor_page_title')
Create product    
@endsection
@section('vendor_layout')
<div class="row">
  <div class="col-12">
  <div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Add Product</h5>
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
          <form action="{{route('vendor.product.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
             <label for="product_name"  class="fw-bold mb-2">Name your product</label>
             <input type="text" name="product_name" class="form-control mb-2" placeholder="Type of cloth">

             <label for="description"  class="fw-bold mb-2">Description</label>
             <textarea name="description" id="description" class="form-control mb-2" cols="20" rows="10" ></textarea>

             <label for="images"  class="fw-bold mb-2">Upload your product images</label>
             <input type="file" name="images[]" class="form-control mb-2" multiple>

             <label for="sku"  class="fw-bold mb-2">SKU</label>
             <input type="text" name="sku" class="form-control mb-2">

             <livewire:category-subcategory/>
            
             <label for="store_id"  class="fw-bold mb-2">Select store for this product</label>
             <select name="store_id" id="store_id" class="form-control mb-2">
              @foreach ($stores as $store )
                <option value="{{ $store->id }}">{{ $store->store_name }}</option>
              @endforeach  
              </select> 

             <label for="regular_price"  class="fw-bold mb-2">Regular price</label>
             <input type="number" name="regular_price" class="form-control mb-2" >

             <label for="discounted_price"  class="fw-bold mb-2">Discounted price</label>
             <input type="number" name="discounted_price" class="form-control mb-2">

             <label for="tax_rate"  class="fw-bold mb-2">Tax rate</label>
             <input type="number" name="tax_rate" class="form-control mb-2">

             <label for="stock_quantity"  class="fw-bold mb-2">Stock quantity</label>
             <input type="number" name="stock_quantity" class="form-control mb-2">

             <label for="slug"  class="fw-bold mb-2">Slug</label>
             <input type="text" name="slug" class="form-control mb-2">

             <label for="meta_title"  class="fw-bold mb-2">Meta title</label>
             <input type="text" name="meta_title" class="form-control mb-2">

             <label for="meta_description"  class="fw-bold mb-2">Meta description</label>
             <input type="text" name="meta_description" class="form-control mb-2">
             
             <button type="submit" class="btn btn-primary w-100 mt-2">Add product</button>

          </form>
  </div>
</div>
  </div>
</div>
  
@endsection