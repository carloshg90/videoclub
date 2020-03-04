<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class login_erroni extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     //Login erroni (enviar POST sense dades, comprova que el camp que falla és el camp email).
    public function testExample()
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => ''
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');

    }
}
