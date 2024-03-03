<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Role::class)
            ->assertStatus(200);
    }
}
