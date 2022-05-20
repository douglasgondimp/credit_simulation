<?php

namespace App\Services;

use App\Models\Convenios;

class ConveniosService
{
    protected $model;

    public function __construct(Convenios $covenants)
    {
        $this->model = $covenants;
    }

    public function getAllCovenants()
    {
        return $this->model->getCovenants();
    }
}