<?php

namespace App\Entity;

class Fornecedor{

    public $id;

    public $razao_social;

    public $CNPJ;

    public $email;

    public $contato;

    public function cadastrar(){
        $this->id = "id";
    }

}