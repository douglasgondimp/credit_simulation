<?php

namespace App\Http\Controllers;

use App\Services\InstituicoesService;
use Illuminate\Http\Request;

class InstituicoesController extends Controller
{
    private $service;

    public function __construct(InstituicoesService $institutions)
    {
        $this->service = $institutions;
    }

    public function index()
    {
        return $this->service->getAllInstitutions();
    }
}
