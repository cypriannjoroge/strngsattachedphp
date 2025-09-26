<div>
    <label for="category_id"  class="fw-bold mb-2">Select a category for your Product</label>
    <select class="form-control mb-2" name="category_id" wire:model.live="selectedcategory">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name}}</option>
        @endforeach
    </select>
    
    <label for="subcategory_id"  class="fw-bold mb-2">Select a Subcategory for your Product</label>
    <select class="form-control mb-2" name="subcategory_id">
        <option value="">Select Subcategory</option>
        @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name}}</option>
        @endforeach
    </select>
</div>
