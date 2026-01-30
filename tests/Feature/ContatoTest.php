<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Contato;

class ContatoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function nome_e_obrigatorio_e_tem_minimo_de_6_caracteres()
    {
        $response = $this->post('/contatos', [
            'nome' => 'abc', // muito curto
            'contato' => '123456789',
            'email' => 'teste@email.com',
        ]);

        $response->assertSessionHasErrors(['nome']);
    }

    /** @test */
    public function contato_deve_ter_9_digitos()
    {
        $response = $this->post('/contatos', [
            'nome' => 'Contato Teste',
            'contato' => '12345', // errado
            'email' => 'teste@email.com',
        ]);

        $response->assertSessionHasErrors(['contato']);
    }

    /** @test */
    public function email_deve_ser_valido()
    {
        $response = $this->post('/contatos', [
            'nome' => 'Contato Teste',
            'contato' => '123456789',
            'email' => 'invalido-email',
        ]);

        $response->assertSessionHasErrors(['email']);
    }
}

