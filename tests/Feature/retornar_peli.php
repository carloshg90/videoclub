<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class retornar_peli extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutMiddleware();
        $response = $this->json('PUT','api/v1/catalog/1/return');
        $response->assertStatus(200);
    }
}
