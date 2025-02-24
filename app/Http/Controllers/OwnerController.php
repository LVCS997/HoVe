<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtém o valor do filtro (CPF) da requisição
        $cpf = $request->query('cpf');

        // Filtra os donos com base no CPF (se fornecido), ordena pelo mais recente e aplica a paginação
        $owners = Owner::when($cpf, function ($query, $cpf) {
            return $query->where('cpf', 'like', "%{$cpf}%");
        })
            ->orderBy('created_at', 'desc') // Ordena pelo mais recente primeiro
            ->paginate(10); // 10 itens por página

        // Retorna a view com os donos filtrados e ordenados
        return view('owners.index', compact('owners'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            //'rg' => 'required|unique:owners',
            'telefone' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|unique:owners',
            'cep' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
        ]);


        Owner::create(request()->all());
        return redirect()->route('pets.create')->with('message', 'Responsável cadastrado com sucesso!.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'nome' => 'required',
            'rg' => 'required|unique:owners,rg,' . $owner->id,
            'telefone' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|unique:owners,cpf,' . $owner->id,
            'cep' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'nullable',
        ]);

        $owner->update($request->all());
        return redirect()->route('owners.index')->with('success', 'Dados de responsável atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();

        // Redireciona para a lista de donos com uma mensagem de sucesso
        return redirect()->route('owners.index')->with('success', 'Responsável removido com sucesso!');
    }

    public function buscarPorCpf(Request $request)
    {
        $cpf = $request->query('cpf');
        $owner = Owner::where('cpf', $cpf)->first();

        return response()->json($owner);
    }

}
