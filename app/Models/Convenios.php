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

    public function filterCovenants(array $filter)
    {
        $response = array();
        
        foreach ($filter as $f) {
            $key = array_search(strtoupper($f), array_column($this->covenants, 'chave'));
            if ($key !== false) {
                array_push($response, $this->covenants[$key]);
            }
        }

        return $response;
    }
}
