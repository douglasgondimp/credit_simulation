<?php

namespace App\Services;

use App\Models\Convenios;
use App\Models\Instituicoes;
use App\Models\TaxasInstituicoes;

class SimulacaoCreditoService
{
    protected $modelInstitutions;
    protected $modelCovenants;
    protected $modelInstitutionsFees;

    public function __construct(Instituicoes $institutions, Convenios $covenants, TaxasInstituicoes $institutions_fees)
    {
        $this->modelInstitutions     = $institutions;
        $this->modelCovenants        = $covenants;
        $this->modelInstitutionsFees = $institutions_fees;
    }

    public function getSimulationCredit(array $request)
    {
        if (isset($request['instituicoes']) && !empty($request['instituicoes'])) {
            $institutions = $this->modelInstitutions->filterInstitutions($request['instituicoes']);
            if (empty($institutions)) {
                return response()->json(['message' => 'nenhuma instituição encontrada!'], 404);
            }
        } else {
            $institutions = $this->modelInstitutions->getInstitutions();
        }

        if (isset($request['convenios']) && !empty($request['convenios'])) {
            $covenants = $this->modelCovenants->filterCovenants($request['convenios']);
            if (empty($covenants)) {
                return response()->json(['message' => 'nenhuma instituição encontrada!'], 404);
            }
        } else {
            $covenants = $this->modelCovenants->getCovenants();
        }

        $fees = $this->modelInstitutionsFees->getFees();
        $response = array();

        foreach ($institutions as $i) {
            $arr_fees = array();
            foreach($covenants as $c) {
                if (isset($request['parcela']) && (!empty($request['parcela']) || $request['parcela']  > 0)) {
                    foreach($fees as $f) {
                        if ($f['instituicao'] == $i['chave'] && $f['convenio'] == $c['chave']) {
                            $rate = $f['taxaJuros'];
                            $coefficient = $f['coeficiente'];
                            $covenant = $f['convenio'];
                        }
                    }
                    if ($covenant == $c['chave']) {
                        $portion = $request['valor_emprestimo'] * $coefficient;
                        $arr = array(
                            "taxa"          => $rate,
                            "pacelas"       => $request['parcela'],
                            "valor_parcela" => number_format($portion, 2, ".", ""),
                            "convenio"      => $c['chave']
                        );
                        array_push($arr_fees, $arr);
                    }
                } else {
                    foreach($fees as $f) {
                        if ($f['instituicao'] == $i['chave'] && $f['convenio'] == $c['chave']) {
                            $portion = $request['valor_emprestimo'] * $f['coeficiente'];
                            $arr = array(
                                "taxa"          => $f['taxaJuros'],
                                "parcelas"      => $f['parcelas'],
                                "valor_parcela" => number_format($portion, 2, ".", ""),
                                "convenio"      => $c['chave']
                            );
                            array_push($arr_fees, $arr);
                        }
                    }
                }
            }
            $arr_inst = array($i['chave'] => $arr_fees);
            array_push($response, $arr_inst);
        }

        return $response;
    }
}