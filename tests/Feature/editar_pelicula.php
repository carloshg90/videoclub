<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class editar_pelicula extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // Editar correctament una pel·lícula (via web, no API).
    public function testExample()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->put('/catalog/edit/18',[
        'id' => '18',
        'title' => 'Ara Blade Runner',
        'year' => '1982',
        'director' => 'Rydley Scott',
        'poster' => 'https://ia.media-imdb.com/images/M/MV5BMjEyMjcyNDI',
        'synopsis' => 'A principios del siglo XXI, la poderosa Tyrell Corporation creó, gracias a los avances de la ingeniería genética, un robot llamado Nexus 6, un ser virtualmente idéntico al hombre pero superior a él en fuerza y agilidad, al que se dio el nombre de Replicante. Estos robots trabajaban como esclavos en las colonias exteriores de la Tierra. Después de la sangrienta rebelión de un equipo de Nexus-6, los Replicantes fueron desterrados de la Tierra. Brigadas especiales de policía, los Blade Runners, tenían órdenes de matar a todos los que no hubieran acatado la condena. Pero a esto no se le llamaba ejecución, se le llamaba "retiro".',
        'categoria' => '1',
        'trailer' => 'https://www.youtube.com/embed/PkqHVGFAhbU',
      ]);

      $this->assertDatabaseHas('movies',[
        'title' => 'Ara Blade Runner'
      ]);
    }
}
