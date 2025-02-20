<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', ['pets' => $pets->isEmpty() ? collect([]) : $pets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();

        return view('pets.create', [
            'owners' => $owners->isEmpty() ? collect([]) : $owners
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'especie' => 'required',
            'raca' => 'required',
            'idade' => 'required|integer',
            'sexo' => 'required',
            'porte' => 'required',
            'pelagem' => 'required',
            'castrado' => 'required|boolean',
            'vacinas' => 'required|boolean',
            'onde_vacinado' => 'nullable',
            'anamnese' => 'nullable',

            // médico
            'peso' => 'nullable|numeric',
            'cidade_nascimento' => 'nullable',
            'uf_nascimento' => 'nullable',
            'pais_nascimento' => 'nullable',
            'temperatura' => 'nullable',
            'hora_nascimento' => 'nullable',
            'data_nascimento' => 'nullable',

            'owner_id' => 'required|exists:owners,id', // Validação do owner_id
        ]);

        Pet::create($request->all());
        return redirect()->route('pets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {

        return view('pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        $owners = Owner::all();
        return view('pets.edit', compact('pet', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'nome' => 'required',
            'especie' => 'required',
            'raca' => 'required',
            'idade' => 'required|integer',
            'sexo' => 'required',
            'peso' => 'nullable|numeric',
            'pelagem' => 'required',
            'castrado' => 'required|boolean',
            'vacinas' => 'required|boolean',
            'onde_vacinado' => 'nullable',
            'anamnese' => 'nullable',

            // novos campos

            'porte' => 'required',
            'cidade_nascimento' => 'nullable',
            'uf_nascimento' => 'nullable',
            'pais_nascimento' => 'nullable',
            'temperatura' => 'nullable',
            'hora_nascimento' => 'nullable',
            'data_nascimento' => 'nullable',

        ]);

        $pet->update($request->all());
        return redirect()->route('pets.index')->with('success', 'Pet atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet excluído com sucesso!');
    }

    public function buscarPorCpf(Request $request)
    {
        $cpf = $request->query('cpf');

        // Busca o dono pelo CPF
        $owner = Owner::where('cpf', $cpf)->first();

        if ($owner) {
            // Busca os pets associados ao dono
            $pets = $owner->pets;
            return response()->json($pets);
        }

        return response()->json([]); // Retorna uma lista vazia se não encontrar o dono
    }

    public function buscarPetPorCpf(Request $request)
    {

        $cpf = $request->query('cpf');

        // Busca o dono pelo CPF
        $owner = Owner::where('cpf', $cpf)->first();

        if ($owner) {
            // Busca os pets associados ao dono
            $pets = $owner->pets;
        } else {
            // Se não encontrar o dono, retorna uma mensagem de erro
            return redirect()->route('pets.index')->with('error', 'Nenhum dono encontrado com o CPF informado.');
        }

        return view('pets.index', ['pets' => $pets]);
    }


}
