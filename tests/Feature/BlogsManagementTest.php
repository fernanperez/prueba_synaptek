<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogsManagementTest extends TestCase
{

    /** @test */
    public function ver_hompage_livewire()
    {
        $this->get(route('homepage'))->assertSeeLivewire('component-homepage');

    }

}
