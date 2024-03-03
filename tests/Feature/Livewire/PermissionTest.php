<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Permission::class)
            ->assertStatus(200);
    }
}
