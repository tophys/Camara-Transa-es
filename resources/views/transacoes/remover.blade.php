@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Transação de Débito</div>
                <div class="card-body">
                  <form method="POST" action="{{ route('criar') }}" >
                    @csrf
                    <div class="form-group row">
                      <label for="projeto" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Projeto</label>
                      <div class="col-md-6">
                      <select name='projeto' id="projeto" required class="form-control{{ $errors->has('projeto') ? ' is-invalid' : '' }}" autofocus>
                          <option value="" disabled selected>Selecione um Projeto</option>
                          <option value="ABORDAGEM ESTADUAL" >ABORDAGEM ESTADUAL</option>
                          <option value="ABORDAGEM FEDERAL" >ABORDAGEM FEDERAL</option>
                          <option value="ABORDAGEM MUNICIPAL" >ABORDAGEM MUNICIPAL</option>
                          <option value="SCFV ESTADUAL" >SCFV ESTADUAL</option>
                          <option value="SCFV FEDERAL" >SCFV FEDERAL</option>
                          <option value="SCFV MUNICIPAL" >SCFV MUNICIPAL</option>
                          <option value="FUNCAÇÃO ITAÚ FOMENTO" >FUNCAÇÃO ITAÚ FOMENTO</option>
                          <option value="FUNDAÇÃO ITAÚ CMDCA - SAMBAIATUBA" >FUNDAÇÃO ITAÚ CMDCA - SAMBAIATUBA</option>
                          <option value="FUNDO MUNICIPAL DA CRIANÇA E DO ADOLESCENTE" >FUNDO MUNICIPAL DA CRIANÇA E DO ADOLESCENTE</option>
                          <option value="INSTITUCIONAL" >INSTITUCIONAL</option>
                          <option value="OUTRO POSSIVEL PROJETO" >OUTRO POSSIVEL PROJETO</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label for="competencia" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Competência</label>
                      <div class="col-md-6">
                        <input id="competencia" type="date" class="form-control{{ $errors->has('competencia') ? ' is-invalid' : '' }}" name="competencia" value="{{Carbon\Carbon::today()->format('Y-m-d')}}" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="data_execucao" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Data de Execução</label>
                      <div class="col-md-6">
                        <input id="data_execucao" type="date" class="form-control{{ $errors->has('data_execucao') ? ' is-invalid' : '' }}" name="data_execucao" value="{{Carbon\Carbon::today()->format('Y-m-d')}}" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="grupo" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Grupo</label>
                      <div class="col-md-6">
                        <select name='grupo' required class="form-control{{ $errors->has('grupo') ? ' is-invalid' : '' }}">
                          <option value="" disabled selected>Selecione um Grupo</option>
                          <option value="RH - CONTRATOS PARA INSTRUÇÃO DE ARTE, CULTURA E EDUCAÇÃO SOCIAL">RH - CONTRATOS PARA INSTRUÇÃO DE ARTE, CULTURA E EDUCAÇÃO SOCIAL</option>
                          <option value="MATERIAL CONSUMO">MATERIAL CONSUMO</option>
                          <option value="MATERIAL ESCRITÓRIO">MATERIAL ESCRITÓRIO</option>
                          <option value="MATERIAL PEDAGÓGICO">MATERIAL PEDAGÓGICO</option>
                          <option value="MATERIAL MANUTENÇÃO EQUIPAMENTOS">MATERIAL MANUTENÇÃO EQUIPAMENTOS</option>
                          <option value="MATERIAL MANUTENÇÃO ESPAÇO FÍSICO">MATERIAL MANUTENÇÃO ESPAÇO FÍSICO</option>
                          <option value="SERVIÇO DE TERCEIROS">SERVIÇO DE TERCEIROS</option>
                          <option value="SERVIÇOS GERAIS AUTÔNOMO">SERVIÇOS GERAIS AUTÔNOMO</option>
                          <option value="TRANSPORTE DE AUTÔNOMO">TRANSPORTE DE AUTÔNOMO</option>
                          <option value="TRANSPORTE MUNICIPAL">TRANSPORTE MUNICIPAL</option>
                          <option value="TRANSPORTE INTERMUNICIPAL LOCAL">TRANSPORTE INTERMUNICIPAL LOCAL</option>
                          <option value="TRANSPORTE EXPEDIÇÃO CULTUIRAL">TRANSPORTE EXPEDIÇÃO CULTUIRAL</option>
                          <option value="TRANSPORTE UBER">TRANSPORTE UBER</option>
                          <option value="REEMBOLSO">REEMBOLSO</option>
                          <option value="LIVRARIA">LIVRARIA</option>
                          <option value="FORMAÇÃO EQUIPE">FORMAÇÃO EQUIPE</option>
                          <option value="TARIFA BANCÁRIA">TARIFA BANCÁRIA</option>
                          <option value="EQUIPAMENTOS">EQUIPAMENTOS</option>
                          <option value="MATERIAL CONSUMO - COMBUSTÍVEL">MATERIAL CONSUMO - COMBUSTÍVEL</option>
                          <option value="MATERIAL CONSUMO  HIGIENE E LIMPEZA">MATERIAL CONSUMO  HIGIENE E LIMPEZA</option>
                          <option value="MATERIAL CONSUMO LANCHE EXPEDIÇÃO CULTURAL">MATERIAL CONSUMO LANCHE EXPEDIÇÃO CULTURAL</option>
                          <option value="MATERIAL CONSUMO ALIMENTAÇÃSO LANCHE DIÁRIA">MATERIAL CONSUMO ALIMENTAÇÃSO LANCHE DIÁRIA</option>
                          <option value="ALIMENTAÇÃO LANCHE EXPEDIÇÃO CULTURAL">ALIMENTAÇÃO LANCHE EXPEDIÇÃO CULTURAL</option>
                          <option value="SERVIÇO DE TERCEIROS -CONTABILIDADE">SERVIÇO DE TERCEIROS -CONTABILIDADE</option>
                          <option value="NET TELEFONIA/INTERNET">NET TELEFONIA/INTERNET</option>
                          <option value="SERVIÇO DE TERCEIRO - SEGURANÇA - VERISSURE ALARME">SERVIÇO DE TERCEIRO - SEGURANÇA - VERISSURE ALARME</option>
                          <option value="SERVIÇO DE TERCEIRO - LOCAÇÃO EQUIPAMENTO - DATACOPY">SERVIÇO DE TERCEIRO - LOCAÇÃO EQUIPAMENTO - DATACOPY</option>
                          <option value="PRIMEIROS SOCORROS">PRIMEIROS SOCORROS</option>
                          <option value="VIAGEM DE FORMAÇÃO EQUIPE">VIAGEM DE FORMAÇÃO EQUIPE</option>
                          <option value="TAXAS DIVERSAS">TAXAS DIVERSAS</option>
                          <option value="DESPESAS NÃO PREVISTAS">DESPESAS NÃO PREVISTAS</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="objetivo" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Objetivo</label>
                      <div class="col-md-6">
                        <input id="objetivo" type="text" class="form-control{{ $errors->has('objetivo') ? ' is-invalid' : '' }}" name="objetivo" value="{{ old('objetivo') }}" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="fornecedor" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Fornecedor</label>
                      <div class="col-md-6">
                        <input id="fornecedor" type="text" class="form-control{{ $errors->has('fornecedor') ? ' is-invalid' : '' }}" name="fornecedor" value="{{ old('fornecedor') }}" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="descricao" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Descrição</label>
                      <div class="col-md-6">
                        <select name='descricao' id="descricao" required class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" autofocus>
                          <option value="" disabled selected>Selecione a Descrição</option>
                          <option value="1. INVESTIMENTO EM CAPITAL FÍSICO">1. INVESTIMENTO EM CAPITAL FÍSICO</option>
                          <option value="2. RECURSOS HUMANOS">2. RECURSOS HUMANOS</option>
                          <option value="3. CUSTEIO DE DESPESA FÍSICA">3. CUSTEIO DE DESPESA FÍSICA</option>
                          <option value="4. CUSTEIO DE DESPESAS VARIÁVEIS">4. CUSTEIO DE DESPESAS VARIÁVEIS</option>
                          <option value="Programa Itaú Criança">Programa Itaú Criança</option>
                          <option value="Outro Parceiro">Outro Parceiro</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="data_documento" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Data do Documento</label>
                      <div class="col-md-6">
                        <input id="data_documento" type="date" class="form-control{{ $errors->has('data_documento') ? ' is-invalid' : '' }}" name="data_documento" value="{{Carbon\Carbon::today()->format('Y-m-d')}}" required/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="numero_cheque" class="col-md-4 col-form-label text-md-right">Número do Cheque</label>
                      <div class="col-md-6">
                        <input id="numero_cheque" type="number" class="form-control{{ $errors->has('numero_cheque') ? ' is-invalid' : '' }}" name="numero_cheque" value="{{ old('numero_cheque') }}"  /> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="numero_ted" class="col-md-4 col-form-label text-md-right">Número do TED</label>
                      <div class="col-md-6">
                        <input id="numero_ted" type="number" class="form-control{{ $errors->has('numero_ted') ? ' is-invalid' : '' }}" name="numero_ted" value="{{ old('numero_ted') }}"  /> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="numero_boleto" class="col-md-4 col-form-label text-md-right">Número do Boleto</label>
                      <div class="col-md-6">
                        <input id="numero_boleto" type="number" class="form-control{{ $errors->has('numero_boleto') ? ' is-invalid' : '' }}" name="numero_boleto" value="{{ old('numero_boleto') }}"  /> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="numero_recibo" class="col-md-4 col-form-label text-md-right">Número do Recibo</label>
                      <div class="col-md-6">
                        <input id="numero_recibo" type="number" class="form-control{{ $errors->has('numero_recibo') ? ' is-invalid' : '' }}" name="numero_recibo" value="{{ old('numero_recibo') }}"  /> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="numero_nota" class="col-md-4 col-form-label text-md-right">Número da Nota Fiscal</label>
                      <div class="col-md-6">
                        <input id="numero_nota" type="number" class="form-control{{ $errors->has('numero_nota') ? ' is-invalid' : '' }}" name="numero_nota" value="{{ old('numero_nota') }}"  /> 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="data_pagamento" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Data de Pagamento</label>
                      <div class="col-md-6">
                        <input id="data_pagamento" type="date" class="form-control{{ $errors->has('data_pagamento') ? ' is-invalid' : '' }}" name="data_pagamento" value="{{Carbon\Carbon::today()->format('Y-m-d')}}" required/>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="banco" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Banco</label>
                      <div class="col-md-6">
                        <select name='banco' id="banco" required class="form-control{{ $errors->has('banco') ? ' is-invalid' : '' }}" autofocus>
                          <option value="" disabled selected>Selecione um Banco</option>
                          <option value="CAIXA FEDERAL(Fomento Itaú)">CAIXA FEDERAL(Fomento Itaú)</option>
                          <option value="CAIXA FEDERAL(itaú Sambaituba)">CAIXA FEDERAL(itaú Sambaituba)</option>
                          <option value="BRADESCO (Institucional)">BRADESCO (Institucional)</option>
                          <option value="BANCO DO BRASIL(Abordagem Estadual)">BANCO DO BRASIL(Abordagem Estadual)</option>
                          <option value="BANCO DO BRASIL(Abordagem Federal)">BANCO DO BRASIL(Abordagem Federal)</option>
                          <option value="BANCO DO BRASIL(Abordagem Municipal)">BANCO DO BRASIL(Abordagem Municipal)</option>
                          <option value="BANCO DO BRASIL(SCFV Estadual)">BANCO DO BRASIL(SCFV Estadual)</option>
                          <option value="BANCO DO BRASIL(SCFV Federal)">BANCO DO BRASIL(SCFV Federal)</option>
                          <option value="BANCO DO BRASIL(SCFV Municipal)">BANCO DO BRASIL(SCFV Municipal)</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="conta" class="col-md-4 col-form-label text-md-right">Conta</label>
                      <div class="col-md-6">
                        <select name='conta' id="conta" class="subcat form-control{{ $errors->has('conta') ? ' is-invalid' : '' }}" autofocus>
                          <option value="" disabled selected>Selecione uma Conta</option>
                          <optgroup label="CAIXA FEDERAL(Fomento Itaú)">
                           <option value="Agencia 0354, C/C 00002599-2" selected>Agencia 0354, C/C 00002599-2</option>
                          </optgroup>
                          <optgroup label="BANCO DO BRASIL(Abordagem Estadual)">
                            <option value="Agencia 6698-2, C/C 41741-6" selected>Agencia 6698-2, C/C 41741-6</option>
                          </optgroup>
                          <optgroup label="BANCO DO BRASIL(Abordagem Federal)">
                            <option value="Agencia 6698-2, C/C 41177-9" selected>Agencia 6698-2, C/C 41177-9</option>
                          </optgroup>
                          <optgroup label="BANCO DO BRASIL(SCFV Federal)">
                            <option value="Agencia 6698-2, C/C19748-3" selected>Agencia 6698-2, C/C19748-3</option>
                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="valor_saida" class="col-md-4 col-form-label text-md-right"><font color="red">* </font>Valor Saída (R$)</label>
                      <div class="col-md-6">
                        <input id="valor_saida" type="number" min="0" step="0.01" class="form-control currency"  class="form-control{{ $errors->has('valor_saida') ? ' is-invalid' : '' }}" name="valor_saida" value="0.00" required/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col sm12 m3 right">
                        <button class="waves-effect right waves-light btn orange lighten-1">Adicionar Débito</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
