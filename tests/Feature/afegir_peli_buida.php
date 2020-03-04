<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class afegir_peli_buida extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     //Afegir una pel·lícula sense dades (no ha de "petar"...).
    public function testExample()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->post('/catalog/create',[
            'title' => '',
            'year' => '',
            'director' => '',
            'poster' => '',
            'synopsis' => '',
            'categoria' => 1,
            'trailer' => '',
          ]);

          $this->assertDatabaseHas('movies',[
            'title' => NULL,
          ]);
    }
}
