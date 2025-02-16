<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\SolicitacaoExame;
use App\Models\SolicitacaoExameItem;
use App\Models\Medico;
use Illuminate\Support\Facades\Storage;

class SolicitacaoExameController extends Controller
{

    public function index()
    {
        // Busca todas as solicitações de exames com os relacionamentos
        $solicitacoes = SolicitacaoExame::with(['pet.owner', 'medico', 'itens.exame', 'itens.categoria', 'itens.subcategoria'])
            ->orderBy('data_solicitacao', 'desc')
            ->get();

        return view('solicitacoes.index', compact('solicitacoes'));
    }

    public function create()
    {
        $exames = Exame::with('categorias.subcategorias')->get();
        $medicos = Medico::all();
        return view('solicitacoes.create', compact('exames', 'medicos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id', // Validação corrigida para a tabela 'pets'
            'medico_id' => 'required|exists:medicos,id',
            'exames' => 'required|array',
            'exames.*.categorias' => 'nullable|array',
            'exames.*.categorias.*.subcategorias' => 'nullable|array',
            'exames.*.categorias.*.categoria' => 'nullable',
        ]);

        // Verifica se o pet pertence ao dono informado
        $cpf = $request->input('filter-cpf');
        $owner = Owner::where('cpf', $cpf)->first();

        if (!$owner || !$owner->pets->contains($request->pet_id)) {
            return redirect()->back()->withErrors(['pet_id' => 'O pet selecionado não pertence ao dono informado.']);
        }

        // Criar a solicitação de exame
        $solicitacao = SolicitacaoExame::create([
            'pet_id' => $request->pet_id, // Corrigido para 'pet_id'
            'medico_id' => $request->medico_id,
            'data_solicitacao' => now(),
            'status' => 'Pendente',
        ]);

        // Salvar os itens da solicitação
        foreach ($request->exames as $exameId => $exameData) {
            foreach ($exameData['categorias'] as $categoriaId => $categoriaData) {
                if (isset($categoriaData['categoria'])) {
                    SolicitacaoExameItem::create([
                        'solicitacao_id' => $solicitacao->id,
                        'exame_id' => $exameId,
                        'categoria_id' => $categoriaId,
                        'subcategoria_id' => null,
                    ]);
                }

                if (isset($categoriaData['subcategorias'])) {
                    foreach ($categoriaData['subcategorias'] as $subcategoriaId => $subcategoriaValue) {
                        SolicitacaoExameItem::create([
                            'solicitacao_id' => $solicitacao->id,
                            'exame_id' => $exameId,
                            'categoria_id' => $categoriaId,
                            'subcategoria_id' => $subcategoriaId,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('solicitacoes.index')->with('success', 'Solicitação de exame criada com sucesso!');
    }

    public function viewPdf($id)
    {
        $solicitacao = SolicitacaoExame::findOrFail($id);

        // Verifica se o usuário tem permissão para visualizar o PDF
//        if (!auth()->user()->CheckRole(['Medico', 'Admin'])) {
//            return redirect()->route('solicitacoes.index')->with('error', 'Acesso negado.');
//        }

        // Verifica se o arquivo PDF existe
        if (!$solicitacao->arquivo_pdf || !Storage::exists($solicitacao->arquivo_pdf)) {
            return redirect()->route('solicitacoes.index')->with('error', 'Arquivo PDF não encontrado.');
        }

        // Retorna o arquivo PDF para visualização
        return response()->file(storage_path('app/public/' . $solicitacao->arquivo_pdf));
    }

    // Método para exibir a página de upload de PDF
    public function showUploadForm($id)
    {
        $solicitacao = SolicitacaoExame::findOrFail($id);
        return view('solicitacoes.upload-pdf', compact('solicitacao'));
    }

    // Método para processar o upload do PDF
    public function uploadPdf(Request $request, $id)
    {

        // Verifica se o usuário tem a role de Laboratório
        //if (!auth()->user()->hasRole('Laboratorio')) {
        //    return redirect()->route('solicitacoes.index')->with('error', 'Acesso negado.');
        //}

        $request->validate([
            'arquivo_pdf' => 'required|mimes:pdf|max:2048', // Aceita apenas arquivos PDF de até 2MB
        ]);

        $solicitacao = SolicitacaoExame::findOrFail($id);

        // Salva o arquivo PDF no storage
        if ($request->hasFile('arquivo_pdf')) {
            $arquivo = $request->file('arquivo_pdf');
            $caminho = $arquivo->store('pdfs', 'public'); // Armazena na pasta "storage/app/public/pdfs"
            $solicitacao->arquivo_pdf = $caminho;
            $solicitacao->save();
        }

        return redirect()->route('solicitacoes.index')->with('success', 'Arquivo PDF enviado com sucesso!');
    }


}
