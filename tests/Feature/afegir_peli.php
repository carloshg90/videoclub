<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class afegir_peli extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     //Afegir una pel·lícula via API (s'envien les dades necessàries). Verificar també la Base de Dades.
    public function testExample()
    {
        //No he aconseguit que funcioni i no entenc el perquè, si us plau digam quin és el problema quan la corregeixis.
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->json('POST','/api/v1/catalog', [
            'title' => 'Peli test API',
            'year' => 1990,
            'director' => 'carlos',
            'poster' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.elmegatop.com%2Fcaratulas-de-peliculas-miticas-de-los-anos-80%2F&psig=AOvVaw3DadxNLzHOr55EHTqjGi6O&ust=1583276968298000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCOjQmL_0_OcCFQAAAAAdAAAAABAD',
            'synopsis' => 'peliculon',
            'categoria' => 1,
            'trailer' => 'iawubfiuawei',
          ]);

          $this->assertDatabaseHas('movies',[
            'title' => 'Peli test API',
          ]);

    }
}
