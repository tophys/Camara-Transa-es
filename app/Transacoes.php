<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacoes extends Model
{
    public static function transacaoHome($nome, $valor)
    {
        $transacao = new Transacoes();
        $transacao->projeto = $nome;
        $transacao->valor_entrada = $valor;
        return $transacao;
    }
    
    public static function retornaValor($projeto)
    {
        $entrada = Transacoes::all()->where('ativo', 0)->where('projeto', $projeto)->sum('valor_entrada');
        if ($entrada == null) $entrada = 0;
        $saida = Transacoes::all()->where('ativo', 0)->where('projeto', $projeto)->sum('valor_saida');
        if ($saida == null) $saida = 0;
        return ($entrada - $saida);
    }
}
