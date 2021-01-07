<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model{
    // protected $table = 'series'; essa declaração pode ser omitida nesse caso
    // pois por padrão o Laravel usa como nome da tabela o nome da classe em minúsculo e no plural
    public $timestamps = false; //informando pro laravel que não precisa guardar as infos de data de create e update
    protected $fillable = ['nome']; //toda propriedade que for ser passada pelo create()
    //no controller deve ser informada dentro desse atributo, é como o laravel previne erros

    public function temporadas(){
        return $this->hasMany(Temporada::class);
    }
}
