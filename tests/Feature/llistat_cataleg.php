<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\withoutMiddleware;

class llistat_cataleg extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     //Accedir a tot el llistat del catàleg (petició GET i que carregui la vista del catàleg).
    public function testExample()
    {
        $this->withoutMiddleware();
        $response = $this->get('/catalog');
        $response->assertViewIs('catalog.index');
    }
}
