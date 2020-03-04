<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class detall_pelicula extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     // Accedir al detall de la 1a pel·lícula. (petició GET i que carregui la vista de detall).
    public function testExample()
    {
        $this->withoutMiddleware();
        $response = $this->get('/catalog/show/1');
        $response->assertViewIs('catalog.show');
    }
}
