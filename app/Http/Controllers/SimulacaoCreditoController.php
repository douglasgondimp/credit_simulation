<?php

namespace App\Http\Controllers;

use App\Http\Requests\SimulationCreditRequest;
use App\Services\SimulacaoCreditoService;
use Illuminate\Http\Request;

class SimulacaoCreditoController extends Controller
{
    private $service;

    public function __construct(SimulacaoCreditoService $simulation_service)
    {
        $this->service = $simulation_service;
    }

    public function creditSimulation(SimulationCreditRequest $request)
    {
        return $this->service->getSimulationCredit($request->all());
    }
}
