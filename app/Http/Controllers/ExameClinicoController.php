<?php

namespace App\Http\Controllers;

use App\Models\ExameClinico;
use App\Models\Pet;
use App\Models\Medico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExameClinicoController extends Controller
{
    // Exibir formulário para criar um exame clínico
    public function create(Pet $pet)
    {
        return view('exame-clinico.create', compact('pet'));
    }

    // Armazenar um novo exame clínico
    public function store(Request $request, Pet $pet)
    {

        // Validação dos campos
        $request->validate([
            'escore_corporal' => 'nullable|integer|between:1,5',
            'pelo_pele' => 'nullable|string',
            'atividade_geral' => 'nullable|string',
            'desidratacao' => 'nullable|string',
            'ectoparasitas' => 'nullable|string|in:sim,nao',
            'temperatura_corporal' => 'nullable|string',
            'frequencia_respiratoria' => 'nullable|string',
            'frequencia_cardiaca' => 'nullable|string',
            'tempo_preenchimento_capilar' => 'nullable|string',
            'mucosas' => 'nullable|string',
            'perdas' => 'nullable|string',
            'afundamento_ocular' => 'nullable|string',
            'elasticidade_pele' => 'nullable|integer|between:1,4',
            'observacoes' => 'nullable|string',
            'exames_realizados' => 'nullable|string',
            'diagnostico_presuntivo' => 'nullable|string',
            'prescricao_hospitalar' => 'nullable|string',
            'prescricao_domiciliar' => 'nullable|string',
        ]);

        // Cria o exame clínico
        ExameClinico::create([
            'pet_id' => $pet->id,
            'medico_id' => auth()->user()->medico->id,
            'escore_corporal' => $request->escore_corporal,
            'pelo_pele' => $request->pelo_pele,
            'atividade_geral' => $request->atividade_geral,
            'desidratacao' => $request->desidratacao,
            'ectoparasitas' => $request->ectoparasitas,
            'temperatura_corporal' => $request->temperatura_corporal,
            'frequencia_respiratoria' => $request->frequencia_respiratoria,
            'frequencia_cardiaca' => $request->frequencia_cardiaca,
            'tempo_preenchimento_capilar' => $request->tempo_preenchimento_capilar,
            'mucosas' => $request->mucosas,
            'perdas' => $request->perdas,
            'afundamento_ocular' => $request->afundamento_ocular,
            'elasticidade_pele' => $request->elasticidade_pele,
            'observacoes' => $request->observacoes,
            'exames_realizados' => $request->exames_realizados,
            'diagnostico_presuntivo' => $request->diagnostico_presuntivo,
            'prescricao_hospitalar' => $request->prescricao_hospitalar,
            'prescricao_domiciliar' => $request->prescricao_domiciliar
        ]);

        return redirect()->route('pets.show', $pet->id)
            ->with('success', 'Exame clínico cadastrado com sucesso!');
    }

    // Exibir detalhes de um exame clínico
    public function show(ExameClinico $exameClinico)
    {
        return view('exame-clinico.show', compact('exameClinico'));
    }
    //Permite o Download do prontuário em pdf
    public function downloadPdf(ExameClinico $exameClinico)
    {
        // Passa os dados do exame clínico para a view
        $data = ['exameClinico' => $exameClinico];

        // Gera o PDF a partir da view
        $pdf = Pdf::loadView('exame-clinico.pdf', $data);

        // Define o nome do arquivo PDF
        $fileName = 'prontuario_' . $exameClinico->pet->nome . '_' . $exameClinico->created_at->format('d-m-Y') . '.pdf';

        // Faz o download do PDF
        return $pdf->download($fileName);
    }
}
