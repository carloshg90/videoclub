<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class afegir_comentari_buit extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     // Afegir un comentari (buit sense dades).
    public function testExample()
    {
        $user = User::find(1);
        $this->actingAs($user);
        $response = $this->post('/catalog/coment/1',[
            'titol' => '',
            'comentari' => '',
            'estrelles' => '',
          ]);

          $this->assertDatabaseHas('reviews',[
            'title' => "",
            'review' => "",
            'stars' => "",
          ]);
    }
}
