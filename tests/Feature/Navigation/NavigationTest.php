<?php

namespace Tests\Feature\Navigation;

use App\Http\Livewire\Navigation\Navigation;
use App\Models\Navitem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NavigationTest extends TestCase
{
    /**
     * @test
     */
    public function navigation_component_can_be_rendered()
    {
        $this->withoutExceptionHandling();
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeLivewire('navigation.navigation');
    }

    /** @test */
    public function component_can_load_items_navigation()
    {
        $this->withoutExceptionHandling();
        $items = Navitem::Factory(3)->create();
        Livewire::test(Navigation::class)
            ->assertSee($items->first()->label)
            ->assertSee($items->first()->link)
        ;
    }
}
