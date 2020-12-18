<?php

namespace App\Http\Controllers;
use App\Serie;
use Illuminate\http\Request;

class SeriesController extends Controller
{

    public function  index(Request $request) {
        $series = Serie::query()->orderBy('nome')->get();
        //query faz uma consulta no objeto Serie, essa consulta está ordenada por nome, após o get pega essa consulta

        $mensagem = $request->session()->get('mensagem');
        //chamando a mensagem de confirmação

        return view('series.index', compact('series', 'mensagem'));
        //a linha de cima faz a mesma coisa que essa abaixo, mas usando a função 'compact',
        //pois a chave e a variável tem o mesmo nome 'series'
        // return view('series.index', [
        //     'series' => $series
        // ]);
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem', "Série {$serie->id} criada com sucesso - {$serie->nome}");
        //gerando mensagem de confirmação / o flash é usado no lugar do put para que a imagem só apareça uma vez

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request){
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série removida com sucesso");
        return redirect()->route('listar_series');
    }
}
