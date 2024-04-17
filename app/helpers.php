<?php

use App\Models\EscutaInicial;


function pacienteHasEscutaInicial($pacienteSelecionado)
{
    $escutaInicial = EscutaInicial::where('pacienteSelecionado', $pacienteSelecionado)->first();
    return $escutaInicial ? true : false;
}

function medicoHasEscutaInicial($medicoSelecionado)
{
    $escutaInicial = EscutaInicial::where('medicoSelecionado', $medicoSelecionado)->first();
    return $escutaInicial ? true : false;
}

function enfermeiraHasEscutaInicial($enfermeiraSelecionado)
{
    $escutaInicial = EscutaInicial::where('enfermeiraSelecionado', $enfermeiraSelecionado)->first();
    return $escutaInicial ? true : false;
}