<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;
use Livewire\WithPagination;

class MenuItem extends Component
{
    use WithPagination;

    public $category_id;
    public $name;
    public $price;
    public $description;
    public $search;

    public function rules()
    {
        return [
            'category_id' => ['required',ValidationRule::exists('categories', 'id')],
            'name' => 'required|min:2|max:20',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ];
    }

    public function store()
    {
        $data = $this->validate();
        try {
            $menu_item = \App\Models\MenuItem::query()->create($data);
            $this->dispatch('menu-item-created');
            $this->reset();
            $this->resetPage();
            Log::info("Create MenuItem: MenuItem created successfully with id {$menu_item->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Create MenuItem : system can not   create MenuItem for this error {$e->getMessage()}");

            abort(500);
        }

    }

    public function render()
    {
        $menu_items = \App\Models\MenuItem::query()->latest()->where('name','like',"%{$this->search}%")->paginate(config('setting.default_paginate'));
        $categories = \App\Models\Category::query()->get();
        return view('livewire.menu-item', compact('menu_items', 'categories'))->title('menu_items');
    }
}
