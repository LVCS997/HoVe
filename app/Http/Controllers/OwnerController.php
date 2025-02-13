<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::all();

        return view('owners.index', [
            'owners' => $owners->isEmpty() ? collect([]) : $owners
        ]);
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
            'rg' => 'required|unique:owners',
            'endereco' => 'required',
            'telefone' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|unique:owners',
        ]);

        Owner::create($request->all());
        return redirect()->route('owners.index')->with('message', 'Responsável cadastrado com sucesso!.');
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
            'endereco' => 'required',
            'telefone' => 'required',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|unique:owners,cpf,' . $owner->id,
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
        return view('owners.index')->with('success', 'Responsável removido com sucesso!');
    }
}
