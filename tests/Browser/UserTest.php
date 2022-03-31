<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    /** @test */
    public function check_if_root_site_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Gerenciar Usuários');
        });
    }

    /** @test */
    public function check_if_register_function_is_working() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Adicionar Novo Usuário')
                ->whenAvailable('#addUserModal', function($modal) {
                    $modal->assertSee('Adicionar Usuário')
                        ->type('name', 'Teste')
                        ->type('email', 'testando2@teste.com')
                        ->type('password', '123456')
                        ->type('cpf', '12345678902')
                        ->type('birthday', '19061999')
                        ->type('phone', '75982001871')
                        ->type('street', 'Rua Teste')
                        ->type('complement', 'Casa')
                        ->type('number', '123')
                        ->type('city', 'Cidade Teste')
                        ->type('state', 'Estado Teste')
                        ->type('zipcode', '12345678')
                        ->type('country', 'Brasil')
                        ->press('Adicionar');
                })
                ->assertSee('Usuário criado com sucesso!');
        });
    }

    /** @test */
    public function check_if_update_function_is_working() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->with('.table', function ($table) {
                    $table->assertSee('Ações')
                        ->click('#edit-1');                  
                })             
                ->whenAvailable('#editUserModal-1', function($modal) {
                    $modal->assertSee('Editar Usuário')
                        ->type('name', 'Teste Alterado')
                        ->type('email', 'emailnovo@teste.com')
                        ->type('password', '123456')
                        ->type('cpf', '12345678902')
                        ->type('birthday', '19061999')
                        ->type('phone', '75982001871')
                        ->type('street', 'Rua Teste Alterado')
                        ->type('complement', 'Casa Alterada')
                        ->type('number', '12345')
                        ->type('city', 'Cidade Teste Alterado')
                        ->type('state', 'Estado Teste Alterado')
                        ->type('zipcode', '12345678')
                        ->type('country', 'Brasil')
                        ->press('Salvar');
                })
                ->assertSee('Usuário editado com sucesso!');
        });
    }

    /** @test */
    public function check_if_delete_function_is_working() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->with('.table', function ($table) {
                    $table->assertSee('Ações')
                        ->click('#delete-1');
                })
                ->whenAvailable('#deleteUserModal-1', function ($modal) {
                    $modal->assertSee('Tem certeza que deseja excluir este usuário?')
                        ->press('Sim'); 
                })
                ->assertSee('Usuário deletado com sucesso!');
        });
    }
}
