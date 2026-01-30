@extends('layouts.app')

@section('title', 'Contatos Excluídos')

@section('content')
<h1>Contatos Excluídos</h1>

<a href="{{ route('contatos.index') }}" class="btn btn-secondary mb-3">
    ⬅ Voltar
</a>

<table class="table table-striped table-hover mb-0">
    <div class="card-body p-0">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->contato }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>
                        <form method="POST"
                            action="{{ route('contatos.restore', $contato->id) }}">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm">
                                ♻ Restaurar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Nenhum contato excluído
                    </td>
                </tr>
            @endforelse
        </tbody>
    </div>
</table>
@endsection
