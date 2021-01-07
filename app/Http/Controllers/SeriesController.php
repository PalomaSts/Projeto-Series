<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request){
        $serie = Serie::create(['nome' => $request->nome]);
        //query faz uma consulta no objeto Serie, essa consulta está ordenada por nome, após o get pega essa consulta
        $qtdTemporadas = $request->qtd_temporadas;
        for ($i = 1; $i <= $qtdTemporadas; $i++){
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for($j = 1; $j <= $request->ep_por_temporada; $j++){
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        $request->session()->flash('mensagem', "Série {$serie->id} e suas temporadas e episódios criados com sucesso - {$serie->nome}");
        //gerando mensagem de confirmação / o flash é usado no lugar do put para que a imagem só apareça uma vez

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request){
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série removida com sucesso");
        return redirect()->route('listar_series');
    }
}
