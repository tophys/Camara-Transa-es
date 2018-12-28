@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form method="GET" action="{{ route('retornoFile', ['projeto' => $projeto]) }}" >
        @csrf
        <input id="projeto" name="projeto" type="hidden" value="{{$projeto}}" />
        <div class="card">
          <div class="card-header">Últimas Transações</div>
          
          <div class="card-body">  
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Projeto selecionado</th>
                  <th scope="col">Valor em caixa</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $projeto }}</td> 
                  <td> 
                  @IF ($caixa >= 0) 
                  <font color="green">R$: + {{$caixa}}</font>
                  @ELSE<font color="red">R$: {{$caixa}}</font>
                  @ENDIF  
                  </td>               
                </tr>
              </tbody>
            </table>
            @IF (is_null($transacoes) || $transacoes->count() == 0 )
              Não há transações neste projeto.
            @ELSE
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Competência</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Nome Banco</th>
                  <th scope="col">Número Conta</th>
                </tr>
              </thead>
              <tbody>
                @FOREACH ($transacoes as $transacao)
                <tr>
                  <td>{{date('d-m-Y', strtotime($transacao->competencia))}}</td>
                  <td>
                  @IF (!is_null($transacao->valor_entrada)) 
                  <font color="green">R$: +{{$transacao->valor_entrada}}</font>
                  @ELSE
                  <font color="red">R$: -{{$transacao->valor_saida}}</font>
                  @ENDIF
                  </td>
                  <td>{{ $transacao->nome_banco }}</td>
                  <td>{{ $transacao->numero_conta }}</td>
                </tr>
                @ENDFOREACH
              </tbody>
            </table>
          </div>
          <button type="submit" class="btn btn-primary">Exportar</button>
          @ENDIF
        </div>
      </form>  
    </div>
  </div>
</div>
@endsection
