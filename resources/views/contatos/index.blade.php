@extends('layouts.app')

@section('title', 'Lista de Contatos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📋 Contatos</h2>

    <a href="{{ route('contatos.create') }}" class="btn btn-success">
        ➕ Novo Contato
    </a>

    <a href="{{ route('contatos.trashed') }}" class="btn btn-outline-danger">
        🗑 Lixeira
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th>Email</th>
                    <th width="220">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contatos as $contato)
                    <tr>
                        <td>{{ $contato->id }}</td>
                        <td>{{ $contato->nome }}</td>
                        <td>{{ $contato->contato }}</td>
                        <td>{{ $contato->email }}</td>
                        <td>
                            <a href="{{ route('contatos.show', $contato) }}" class="btn btn-sm btn-info">
                                Ver
                            </a>

                            <a href="{{ route('contatos.edit', $contato) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <form action="{{ route('contatos.destroy', $contato) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Nenhum contato cadastrado
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
