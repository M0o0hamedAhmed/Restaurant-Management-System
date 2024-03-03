<?php

namespace Tests\Feature\Livewire;

use App\Livewire\MenuItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MenuItemTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(MenuItem::class)
            ->assertStatus(200);
    }
}
