<?php

namespace App\Livewire;

use App\Models\Category as CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:30', as: 'ya name 👀')]
    public $name;

    public $editingCategoryId;

    #[Rule('required|min:3|max:30')]
    public $editingCategoryName;

    public $search;


    public CategoryModel $category;


    public function store()
    {
        try {
            $category = CategoryModel::query()->create($this->validateOnly('name'));
            $this->reset();
            session()->flash('success', 'created');
            $this->resetPage();
            Log::info("Create Category: category created successfully with id {$category->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            session()->flash('error',$e->getMessage());
            Log::error("Create Category : system can not   create category for this error {$e->getMessage()}");
            abort(500);
        }
    }

    public function edit(CategoryModel $category)
    {
        $this->editingCategoryId = $category->id;
        $this->editingCategoryName = $category->name;
    }

    public function update(CategoryModel $category)
    {
        try {
            $this->validateOnly('editingCategoryName');
            $category->update(['name' => $this->editingCategoryName]);
            session()->flash('success_update', 'updated');
            $this->cancelEdit();
            Log::info("Update Category: category updated successfully with id {$category->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            session()->flash('error',$e->getMessage());
            Log::error("Update Category : system can not   updated category for this error {$e->getMessage()}");
            abort(500);
        }
    }

    public function delete(CategoryModel $category)
    {
        try {
            $category->delete();
            Log::info("Delete Category: category deleted successfully with id {$category->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            session()->flash('error',$e->getMessage());
            Log::error("Delete Category : system can not   Delete category for this error {$e->getMessage()}");
//            abort(500);
            return;
        }
    }

    public function cancelEdit()
    {
        $this->reset('editingCategoryId', 'editingCategoryName');
    }

    public function render()
    {
        return view('livewire.category', ['categories' => CategoryModel::latest()->where('name', 'like', "%{$this->search}%")->paginate(10)])->title('Categories');
    }
}
