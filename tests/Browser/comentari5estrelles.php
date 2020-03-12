<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class comentari5estrelles extends DuskTestCase
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
                    //Buscar una pelicula que existeix
                    ->type('buscador','El padrino')
                    ->pause(1000);
            //La seguent linia el que fa es presionar la tecla enter
            $browser->driver->getKeyboard()->sendKeys(\Facebook\WebDriver\WebDriverKeys::ENTER);
            $browser->pause(1000);
            //Cliquem a la pelicula
            $browser->clickLink('El padrino');
            $browser->pause(1000);
            //Fem scroll fin el final
            $browser->driver->executeScript('window.scrollTo(0, document.body.scrollHeight);');
            $browser->pause(1000);
            //Afegim comentari amb 5 estrelles
            $browser->type('titol','Titol Dusk')
            ->pause(1000)
            ->select('estrelles','5')
            ->pause(1000)
            ->type('comentari','Comentari Dusk')
            ->pause(1000)
            ->press('Enviar')
            ->pause(1000);
        });
    }
}
