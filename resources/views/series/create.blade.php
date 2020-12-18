@extends('layout')

@section('cabecalho')
    Adicionar série
@endsection

@section('conteudo')
    <form method="post">
        @csrf {{-- diretiva pra proteger o formulário gerando um token de validação --}}
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
