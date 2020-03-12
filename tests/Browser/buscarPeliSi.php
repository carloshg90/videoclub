<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class buscarPeliSi extends DuskTestCase
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
                    //Buscar una pelicula que existeix
                    ->type('buscador','El padrino');
                    //La seguent linia el que fa es presionar la tecla enter
            $browser->driver->getKeyboard()->sendKeys(\Facebook\WebDriver\WebDriverKeys::ENTER);
            $browser->pause(2000);
        });
    }
}
