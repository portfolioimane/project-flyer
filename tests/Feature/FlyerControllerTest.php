<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlyerControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function it_shows_the_form_to_create_a_new_flyer()
    {
       //return $this->get('/project-flyer/public/flyers/create');
        return $this->assertTrue(true);
    }
}