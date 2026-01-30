<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = Contato::latest()->get();

        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|min:6',
            'contato' => 'required|digits:9|unique:contatos,contato',
            'email' => 'required|email:rfc,dns|unique:contatos,email',
        ]);

        $contato = Contato::create($validated);

        return redirect()
        ->route('contatos.show', $contato)
        ->with('success', 'Contato criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contato $contato)
    {
        return view('contatos.show', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contato $contato)
    {
        return view('contatos.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contato $contato)
    {
        $validated = $request->validate([
            'nome' => 'required|string|min:6',
            'contato' => 'required|digits:9|unique:contatos,contato,' . $contato->id,
            'email' => 'required|email:rfc,dns|unique:contatos,email,' . $contato->id,
        ]);

        $contato->update($validated);

        return redirect()
        ->route('contatos.show', $contato)
        ->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato)
    {
        $contato->delete(); // soft delete
        return redirect()
        ->route('contatos.index')
        ->with('success', 'Contato excluído com sucesso!');
    }

    public function trashed()
    {
        $contatos = Contato::onlyTrashed()->latest()->get();

        return view('contatos.trashed', compact('contatos'));
    }

    public function restore($id)
    {
        $contato = Contato::onlyTrashed()->findOrFail($id);

        $contato->restore();

        return redirect()
            ->route('contatos.index')
            ->with('success', 'Contato restaurado com sucesso!');
    }
}
