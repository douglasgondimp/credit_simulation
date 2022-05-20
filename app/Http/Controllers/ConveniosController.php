<?php

namespace App\Http\Controllers;

use App\Services\ConveniosService;
use Illuminate\Http\Request;

class ConveniosController extends Controller
{
    private $service;

    public function __construct(ConveniosService $covenants_service)
    {
        $this->service = $covenants_service;
    }

    public function index()
    {
        return $this->service->getAllCovenants();
    }
}
