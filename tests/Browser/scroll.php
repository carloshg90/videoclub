<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class scroll extends DuskTestCase
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
                    ->assertPathIs('/catalog');
            //Fer scroll fin el final de la pàgina
            $browser->driver->executeScript('window.scrollTo(0, document.body.scrollHeight);');
            $browser->pause(2000);
        });
    }
}
