<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Category::class)
            ->assertStatus(200);
    }

    /** @test */
    public function can_create_category()
    {
        $name = Str::random(5);
        $category = \App\Models\Category::query()->where('name', $name)->first();
        $this->assertNull($category);

        Livewire::test(Category::class)
            ->set('name', $name)
            ->call('store');


        $category = \App\Models\Category::query()->where('name', $name)->first();
        $this->assertNotNull($category);
        $this->assertEquals($name, $category->name);
    }

    /** @test */
    public function name_is_required()
    {
        Livewire::test(Category::class)->set('name', '')->call('store')->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function name_is_min()
    {
        Livewire::test(Category::class)->set('name', 'ss')->call('store')->assertHasErrors(['name' => 'min']);
    }
}
