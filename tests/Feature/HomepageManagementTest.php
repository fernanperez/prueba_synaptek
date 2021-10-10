<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageManagementTest extends TestCase
{
    /** @test */
    public function ver_homepage_livewire()
    {
        $this->get(route('homepage'))->assertSeeLivewire('component-homepage');

    }
}
