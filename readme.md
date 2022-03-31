<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre
Este é um projeto desenvolvido para uma avaliação técnica da Secretaria Municipal de Gestão - SEMGE de Salvador/BA para a vaga de Desenvolvedor PHP/Laravel.

- PHP ver. 7.0.*
- Laravel ver. 5.5

## Laravel

Laravel é um framework de aplicação web com sintaxe expressiva e elegante. Acreditamos que o desenvolvimento deve ser uma experiência agradável e criativa para ser verdadeiramente gratificante. O Laravel tenta eliminar a dor do desenvolvimento facilitando tarefas comuns usadas na maioria dos projetos da web.

O Laravel é acessível, mas poderoso, fornecendo ferramentas necessárias para aplicativos grandes e robustos.

# Começando

## Instalação

Por favor, verifique o guia oficial de instalação do laravel para os requisitos do servidor antes de começar. [Documentação Oficial](https://laravel.com/docs/5.5/installation#installation)

Clone o repositório

    git clone https://github.com/Yanzaum/challenge-semge.git

Vá para a pasta do repositório

    cd challenge-semge

Instale todas as dependências usando o composer

    composer install

Copie o arquivo env de exemplo e faça as alterações de configuração necessárias no arquivo .env (DB_DATABASE=/absolute/path/to/database.sqlite)

    cp .env.example .env
    
Execute as migrações de banco de dados (**Defina a conexão do banco de dados em .env antes de migrar**)

    php artisan migrate

Inicie o servidor de desenvolvimento local

    php artisan serve

Agora você pode acessar o servidor em http://localhost:8000

**TL;DR lista de comandos**

    git clone https://github.com/Yanzaum/challenge-semge.git
    cd challenge-semge
    composer install
    cp .env.example .env
    
**Certifique-se de definir as informações de conexão de banco de dados corretas antes de executar as migrações** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Preencha o banco de dados com dados de seed com relacionamentos que incluem usuário, endereço e telefone. Isso pode ajudá-lo a começar a testar rapidamente.**

Abra o UsersTableSeeder e defina os valores das propriedades conforme sua necessidade

    database/seeds/UsersTableSeeder.php

Run the database seeder and you're done

    php artisan db:seed --class=UsersTableSeeder

***Observação:*** É recomendável ter um banco de dados limpo antes de semear. Você pode atualizar suas migrações a qualquer momento para limpar o banco de dados executando o seguinte comando

    php artisan migrate:refresh

## Testes

Para rodar os testes de navegador com Duck utilize o comando

    php artisan duck

Para executar os testes unitários com PHPUnit utilize o comando

    vendor\bin\phpunit