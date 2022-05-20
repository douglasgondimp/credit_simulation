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

    public function filterInstitutions(array $filter)
    {
        $response = array();
        
        foreach ($filter as $f) {
            $key = array_search(strtoupper($f), array_column($this->institutions, 'chave'));
            if ($key !== false) {
                array_push($response, $this->institutions[$key]);
            }
        }

        return $response;
    }

}
