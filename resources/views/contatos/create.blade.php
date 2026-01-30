@extends('layouts.app')

@section('title', 'Novo Contato')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                ➕ Novo Contato
            </div>

            <div class="card-body">

                <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->

                <form action="{{ route('contatos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text"
                               name="nome"
                               class="form-control @error('nome') is-invalid @enderror"
                               value="{{ old('nome') }}"
                               required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contato</label>
                        <input type="tel"
                               name="contato"
                               class="form-control @error('contato') is-invalid @enderror"
                               inputmode="numeric"
                               pattern="[0-9]*"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                               value="{{ old('contato') }}"
                               required>
                        @error('contato')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('contatos.index') }}" class="btn btn-secondary">
                            ⬅ Voltar
                        </a>

                        <button class="btn btn-success">
                            💾 Salvar
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
