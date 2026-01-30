@extends('layouts.app')

@section('title', 'Detalhes do Contato')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Contato</h1>

        <div>
            <a href="{{ route('contatos.index') }}" class="btn btn-secondary">
                ⬅ Voltar
            </a>

            <a href="{{ route('contatos.edit', $contato) }}" class="btn btn-warning">
                ✏ Editar
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $contato->id }}</p>
            <p><strong>Nome:</strong> {{ $contato->nome }}</p>
            <p><strong>Contato:</strong> {{ $contato->contato }}</p>
            <p><strong>Email:</strong> {{ $contato->email }}</p>

            <hr>

            <form
                action="{{ route('contatos.destroy', $contato) }}"
                method="POST"
                onsubmit="return confirm('Deseja excluir este contato?')"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    🗑 Excluir contato
                </button>
            </form>
        </div>
    </div>
@endsection
