<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class alquilar_peli extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Canviar l'estat d'una pel·lícula a "alquilada"(via API).
    public function testExample()
    {
        $this->withoutMiddleware();
        $response = $this->json('PUT','api/v1/catalog/1/rent');
        $response->assertStatus(200);
    }
}
