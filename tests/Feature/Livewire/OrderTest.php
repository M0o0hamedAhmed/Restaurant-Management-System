<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Order::class)
            ->assertStatus(200);
    }
}
