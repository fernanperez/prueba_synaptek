<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BlogsManagementTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Categoria::factory()->count(3)->create();
    }

    /** @test */
    public function crearBlog()
    {
        Livewire::actingAs($this->user)
            ->test('component-blog')
            ->set('titulo', 'primer blog')
            ->set('descripcion', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus atque, mollitia consectetur aspernatur blanditiis, earum a cupiditate, veritatis tempore repudiandae velit minima quas quia nobis beatae officia? Facilis, necessitatibus dolores!')
            ->set('imagen', 'https://picsum.photos/200/300')
            ->set('estado', 1)
            ->set('categoria_id', 1)
            ->call('crearBlog');

        $this->assertCount(1, Blog::all());
        $this->assertTrue(Blog::whereTitulo('primer blog')->exists());
    }

    public function validarDatosBlog()
    {
        Livewire::actingAs($this->user)
            ->test('component-blog')
            ->set('titulo', '')
            ->set('descripcion', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus atque, mollitia consectetur aspernatur blanditiis, earum a cupiditate, veritatis tempore repudiandae velit minima quas quia nobis beatae officia? Facilis, necessitatibus dolores!')
            ->set('imagen', 'https://picsum.photos/200/300')
            ->set('estado', 1)
            ->set('categoria_id', 1)
            ->call('crearBlog')
            ->assertHasErrors(['titulo' => 'required', 'descripcion' => 'required']);
    }
}
