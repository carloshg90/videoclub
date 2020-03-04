<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class login_correcte extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //Login correcte (quan faci un POST amb dades correctes, comprovi que faci un codi de redirecció).
    public function testExample()
    {
        $response = $this->post('/login', [
            'email' => 'carlos@carlos.com',
            'password' => 'carlos'
        ]);

        $response->assertRedirect('/catalog');
    }
}
