<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class novaPeli extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            //Visitar la pàgina
            $browser->visit('http://localhost:8000/login')
            //Fer un login
                    ->type('email', 'carlos@carlos.com')
                    ->type('password', 'carlos')
                    ->press('Login')
                    ->assertPathIs('/catalog')
                    ->pause(1000)
            //Afegim una nova pelicula
                    ->clickLink('Nueva película')
                    ->type('title','Peli Dusk')
                    ->type('year','1990')
                    ->type('director','Carlos Dusk')
                    ->type('poster','http://www.youtube.com')
                    ->type('trailer','Trailer Dusk')
                    ->select('categoria','3')
                    ->type('synopsis','Sinopsis Dusk')
                    ->press('Añadir película')
                    ->pause(3000);
        });
    }
}
