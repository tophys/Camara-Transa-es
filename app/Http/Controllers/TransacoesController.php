<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transacoes;
use Response;
use Illuminate\Http\Resources\Json\Resource;
 
class TransacoesController extends Controller
{
    public function homeTransacoes()
    {
        $trans1 = Transacoes::transacaoHome('ABORDAGEM ESTADUAL', Transacoes::retornaValor('ABORDAGEM ESTADUAL'));
        $trans2 = Transacoes::transacaoHome('ABORDAGEM FEDERAL', Transacoes::retornaValor('ABORDAGEM FEDERAL'));
        $trans3 = Transacoes::transacaoHome('ABORDAGEM MUNICIPAL', Transacoes::retornaValor('ABORDAGEM MUNICIPAL'));
        $trans4 = Transacoes::transacaoHome('SCFV ESTADUAL', Transacoes::retornaValor('SCFV ESTADUAL'));
        $trans5 = Transacoes::transacaoHome('SCFV FEDERAL', Transacoes::retornaValor('SCFV FEDERAL'));
        $trans6 = Transacoes::transacaoHome('SCFV MUNICIPAL', Transacoes::retornaValor('SCFV MUNICIPAL'));
        $trans7 = Transacoes::transacaoHome('FUNCAÇÃO ITAÚ FOMENTO', Transacoes::retornaValor('FUNCAÇÃO ITAÚ FOMENTO'));
        $trans8 = Transacoes::transacaoHome('FUNDAÇÃO ITAÚ CMDCA - SAMBAIATUBA', Transacoes::retornaValor('FUNDAÇÃO ITAÚ CMDCA - SAMBAIATUBA'));
        $trans9 = Transacoes::transacaoHome('FUNDO MUNICIPAL DA CRIANÇA E DO ADOLESCENTE', Transacoes::retornaValor('FUNDO MUNICIPAL DA CRIANÇA E DO ADOLESCENTE'));
        $trans10 = Transacoes::transacaoHome('INSTITUCIONAL', Transacoes::retornaValor('INSTITUCIONAL'));
        $trans11 = Transacoes::transacaoHome('OUTRO POSSIVEL PROJETO', Transacoes::retornaValor('OUTRO POSSIVEL PROJETO'));

        $array = collect([$trans1, $trans2, $trans3, $trans4, $trans5, $trans6, $trans7, $trans8, $trans9, $trans10, $trans11 ]);
        $count = 1;
        return view('home')->withRegistros($array)->withCount($count);  
    }
    public function homeAdicionar()
    {
        return view('transacoes.adicionar');  
    }
    public function homeRemover()
    {
        return view('transacoes.remover');  
    }
    public function adicionarTransacoes(Request $data)
    {
        $transacao = new Transacoes();
        $transacao->projeto = $data->projeto;
        $transacao->competencia = $data->competencia;
        $transacao->data_execucao = $data->data_execucao;
        $transacao->grupo = $data->grupo;
        $transacao->objetivo = $data->objetivo;
        $transacao->fornecedor = $data->fornecedor;
        $transacao->descricao = $data->descricao;
        $transacao->data_documento = $data->data_documento;
        $transacao->numero_cheque = $data->numero_cheque;
        $transacao->numero_ted = $data->numero_ted;
        $transacao->numero_boleto = $data->numero_boleto;
        $transacao->numero_recibo_simples = $data->numero_recibo;
        $transacao->numero_nota_fiscal = $data->numero_nota;
        $transacao->data_pagamento = $data->data_pagamento;
        $transacao->valor_entrada = $data->valor_entrada;
        $transacao->valor_saida = $data->valor_saida;
        $transacao->nome_banco = $data->banco;
        $transacao->numero_conta = $data->conta;
        $transacao->ativo = 0;
        $transacao->save();
        return redirect()->route('home');  
    }

    /*
        ABORDAGEM ESTADUAL
        ABORDAGEM FEDERAL
        ABORDAGEM MUNICIPAL
        SCFV ESTADUAL
        SCFV FEDERAL
        SCFV MUNICIPAL
        FUNCAÇÃO ITAÚ FOMENTO
        FUNDAÇÃO ITAÚ CMDCA - SAMBAIATUBA
        FUNDO MUNICIPAL DA CRIANÇA E DO ADOLESCENTE
        INSTITUCIONAL
        OUTRO POSSIVEL PROJETO
    */

    public function apresentaHistorico(Request $data, $number)
    {
        $projetos = collect([
            '1' => 'ABORDAGEM ESTADUAL',
            '2' => 'ABORDAGEM FEDERAL',
            '3' => 'ABORDAGEM MUNICIPAL',
            '4' => 'SCFV ESTADUAL',
            '5' => 'SCFV FEDERAL',
            '6' => 'SCFV MUNICIPAL',
            '7' => 'FUNCAÇÃO ITAÚ FOMENTO',
            '8' => 'FUNDAÇÃO ITAÚ CMDCA - SAMBAIATUBA',
            '9' => 'FUNDO MUNICIPAL DA CRIANÇA E DO ADOLESCENTE',
            '10' => 'INSTITUCIONAL',
            '11' => 'OUTRO POSSIVEL PROJETO',
        ]);
        $projeto = $projetos->get($number);
        $transacoes = Transacoes::all()->where('ativo', 0)->where('projeto', $projeto)->take(15);
        $caixa = Transacoes::retornaValor($projeto);
        return view('transacoes.apresentar')->withTransacoes($transacoes)->withCaixa($caixa)->withProjeto($projeto);  
    }

    public function removerTransacoes($id)
    {
        $transacao = Transacoes::find($id);
        $transacao->ativo = 1;
        $transacao->save();
        return redirect()->route('home');  
    }

    public function export($projeto)
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=Extracao.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $transacoes = Transacoes::all()->where('ativo', 0)->where('projeto', $projeto);
        $columns = array('Projeto', 'Competencia', 'DataExecucao', 'Grupo', 'Objetivo', 'Fornecedor', 'Descricao', 'DataDocumento',
        'NumeroCheque', 'NumeroTED', 'NumeroBoleto', 'NumeroReciboSimples', 'NumeroNotaFiscal', 'DataPagamento', 
        'ValorEntrada', 'ValorSaida', 'NomeBanco', 'NumeroConta');
        $fileName = 'Export' . date('dmYHis') . '.csv';
        $file = fopen($fileName, 'w+');
        fputcsv($file, $columns);

        foreach($transacoes as $transacao) {
            fputcsv($file, array($transacao->projeto, $transacao->competencia, $transacao->data_execucao, 
            $transacao->grupo, $transacao->objetivo, $transacao->fornecedor, $transacao->descricao, 
            $transacao->data_documento, $transacao->numero_cheque, $transacao->numero_ted, $transacao->numero_boleto,
            $transacao->numero_recibo_simples, $transacao->numero_nota_fiscal, $transacao->data_pagamento, 
            $transacao->valor_entrada, $transacao->valor_saida, $transacao->nome_banco, $transacao->numero_conta));
        }
        fclose($file);
        return Response::download($fileName, $fileName, $columns);
    }
    
    
}
