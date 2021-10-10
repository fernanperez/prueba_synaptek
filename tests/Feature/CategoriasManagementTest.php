<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CategoriasManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function crearCategorias()
    {
        $this->actingAs($this->user);

        Livewire::test('component-categorias')
        ->set('nombre', 'primera categoria')
        ->set('estado', 1)
        ->call('crear_categoria');

        $this->assertCount(1, Categoria::all());
        $this->assertTrue(Categoria::whereNombre('primera categoria')->exists());
    }

    /** @test */
    public function listaCategorias()
    {
        $this->actingAs($this->user);

        Categoria::factory()->count(3)->create();
        Livewire::test('component-categorias')
        ->call('listarCategorias');

        $this->assertCount(3, Categoria::all());
    }
}
