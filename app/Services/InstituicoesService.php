<?php

namespace App\Services;

use App\Models\Instituicoes;

class InstituicoesService
{
    protected $model;

    public function __construct(Instituicoes $institutions)
    {
        $this->model = $institutions;
    }

    public function getAllInstitutions()
    {
        return $this->model->getInstitutions();
    }
}
