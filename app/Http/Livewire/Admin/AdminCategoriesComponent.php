<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{

    use WithPagination;

    public $category_id;

    public function deleteCategory(){

        $category = Category::find($this->category_id);
        $category->delete();
        session()->flash('message', 'Category Has been Deleted');
        return redirect()->to('/admin/categories');
    }


    public function render()
    {

        $categories = Category::orderBy('id', 'ASC')->paginate(7);
        //dd($categories);
        return view('livewire.admin.admin-categories-component', [ 'categories' => $categories]);
    }
}
