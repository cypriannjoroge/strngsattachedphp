<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class CategorySubcategory extends Component
{
    public $categories=[];
    public $selectedcategory;
    public $subcategories=[];

    public function mount(){
        $this->categories=Category::all();
    }
    public function updatedSelectedcategory($category_id){
        $this->subcategories=Subcategory::where('category_id',$category_id)->get();
    }
    public function render()
    {
        return view('livewire.category-subcategory');
    }
}
