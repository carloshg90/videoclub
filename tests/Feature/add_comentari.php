<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class afegir_comentari extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Afegir un comentari (amb dades preestablertes). Verificar també la Base de Dades.
    public function testExample()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $this->withoutMiddleware();
        //El nom del questionari d'on agafem les dades o el nom del camp de la BBDD no és el mateix
        //per aixó no coincideixen en el response i en el assertDatabaseHas
        $response = $this->post('/catalog/coment/1',[
            'titol' => 'comentari de test',
            'comentari' => 'bona pelicula',
            'estrelles' => 5,
          ]);

          $this->assertDatabaseHas('reviews',[
            'title' => 'comentari de test',
            'review' => 'bona pelicula',
            'stars' => 5,
          ]);

    }
}
