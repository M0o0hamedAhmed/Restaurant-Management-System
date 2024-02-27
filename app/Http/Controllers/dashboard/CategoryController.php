<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $classView;

    public function __construct()
    {
        $this->classView = 'admin.category.';
        $this->middleware(['can:view categories'])->only('index', 'show');
        $this->middleware(['can:edit categories'])->only('edit', 'update');
        $this->middleware(['can:create categories'])->only('create', 'store');
        $this->middleware(['can:delete categories'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::query()->get();
        return view($this->classView . 'index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->classView . 'create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        try {
            $category = Category::query()->create($data);
            Log::info("Create Category: category created successfully with id {$category->id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        } catch (\Exception $e) {
            Log::error("Create Category : system can not   create category for this error {$e->getMessage()}");
            abort(500);
        }


        return redirect()->route('categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view($this->classView . 'edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, string $id)
    {
        $data = $request->validated();

        try {
            Category::query()->whereId($id)->update($data);
            Log::info("Update Category: category updated successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Update Category : system can not   updated category for this error {$e->getMessage()}");
            abort(500);
        }


        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Category::query()->whereId($id)->delete();
            Log::info("Delete Category: category deleted successfully with id {$id} by user id " . Auth::id() . ' and  name is ' . Auth::user()->name);
        }catch (\Exception $e){
            Log::error("Delete Category : system can not   Delete category for this error {$e->getMessage()}");
            abort(500);
        }

        return redirect()->route('categories.index');

    }
}
