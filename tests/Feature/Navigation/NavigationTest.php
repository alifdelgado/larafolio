<?php

namespace Tests\Feature\Navigation;

use App\Http\Livewire\Navigation\Navigation;
use App\Models\Navitem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NavigationTest extends TestCase
{
    use RefreshDatabase;

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

    /** @test */
    public function only_admin_can_see_navigation_actions()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'name'  => 'John Doe',
            'email' => 'johndoe@email.com'
        ]);

        Livewire::actingAs($user)
            ->test(Navigation::class)
            ->assertStatus(200)
            ->assertSee('Edit')
            ->assertSee('New');
    }

    /** @test */
    public function guest_user_cannot_see_navigation_actions()
    {
        Livewire::test(Navigation::class)
            ->assertStatus(200)
            ->assertDontSee('Edit')
            ->assertDontSee('New');

        $this->assertGuest();
    }
}
