<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\MenuItem;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        Category::query()->with('latestMenuItem')->get()->dd();
        $this->data['categories'] = Category::query()->get();

        return view('admin.category.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest   $request)
    {

        $data = $request->validated();
        Category::query()->create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        $this->data['category'] = $category;

        return view('admin.category.edit',$this->data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest   $request, string $id)
    {
        $data = $request->validated();
        Category::query()->whereKey($id)->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::query()->whereKey($id)->delete();
        return redirect()->route('categories.index');

    }
}
