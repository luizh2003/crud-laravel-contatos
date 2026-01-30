@extends('layouts.app')

@section('title', 'Editar Contato')

@section('content')
    <h1 class="mb-4">Editar Contato</h1>

    <a href="{{ route('contatos.show', $contato) }}" class="btn btn-secondary mb-3">
        ⬅ Voltar
    </a>

    <form method="POST" action="{{ route('contatos.update', $contato) }}" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input
                type="text"
                name="nome"
                class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', $contato->nome) }}"
            >
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Contato</label>
            <input
                type="text"
                name="contato"
                class="form-control @error('contato') is-invalid @enderror"]
                inputmode="numeric"
                pattern="[0-9]*"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                value="{{ old('contato', $contato->contato) }}"
            >
            @error('contato')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $contato->email) }}"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            💾 Atualizar
        </button>
    </form>
@endsection
