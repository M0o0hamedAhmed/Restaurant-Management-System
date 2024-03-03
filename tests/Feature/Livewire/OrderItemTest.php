<?php

namespace Tests\Feature\Livewire;

use App\Livewire\OrderItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OrderItemTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(OrderItem::class)
            ->assertStatus(200);
    }
}
