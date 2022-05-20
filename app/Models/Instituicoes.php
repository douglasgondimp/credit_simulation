<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicoes extends Model
{
    private $institutions = array(
        [
            "chave" => "PAN",
            "valor" => "Pan"
        ],
        [
            "chave" => "OLE",
            "valor" => "Ole"
        ],
        [
            "chave" => "BMG",
            "valor" => "Bmg"
        ]
    );

    public function getInstitutions()
    {
        return $this->institutions;
    }
}
