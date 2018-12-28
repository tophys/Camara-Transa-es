@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Acompanhamento Geral</div>
                <div class="card-body">  
                    @FOREACH ($registros as $registro)
                    <!--<a href="{{ url('exportShow', ['number' => $count]) }}">-->
                    <a href="{{ route('exportShow', ['number' => $count]) }}">
                    {{ $count++ }} - {{$registro->projeto}}
                    </a>:
                    @IF ($registro->valor_entrada >= 0)
                      <font color="green">R$: + {{$registro->valor_entrada}}</font></br>
                    @ELSE
                      <font color="red">R$: {{$registro->valor_entrada}}</font></br>
                    @ENDIF
                    @ENDFOREACH
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
