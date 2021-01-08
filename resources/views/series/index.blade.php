@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
    @if(!empty($mensagem))
    <div class="alert alert-success" role="alert">
        {{$mensagem}}
    </div>
    @endif

    <a href="{{route('add_serie')}}" class="btn btn-dark mb-3">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$serie->nome}}

                <span class="d-flex">
                    <a href="/series/{{$serie->id}}/temporadas" class="btn bt-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="/series/{{$serie->id}}"
                        onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $serie->nome)}}?')">
                        {{-- addslashes() para evitar conflitos com nomes de séries que incluam o caractere ' --}}
                        @csrf
                        @method('DELETE') {{-- html não comporta requisição além de get e post, então é necessário declarar--}}
                        <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
@endsection
