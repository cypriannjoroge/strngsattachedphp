<div>
    <select class="form-control" wire:model.live="selectedcategory">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name}}</option>
        @endforeach
    </select>

    <select class="form-control">
        <option value="">Select Subcategory</option>
        @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name}}</option>
        @endforeach
    </select>
</div>
