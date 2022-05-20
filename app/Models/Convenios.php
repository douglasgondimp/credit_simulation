<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    private $covenants = array(
        [
            "chave" => "INSS",
            "valor" => "INSS"
        ],
        [
            "chave" => "FEDERAL",
            "valor" => "Federal"
        ],
        [
            "chave" => "SIAPE",
            "valor" => "Siape"
        ]
    );

    public function getCovenants()
    {
        return $this->covenants;
    }
}
