<!--@extends, chama o layout master-->
@extends('layouts.panel.master')

<!--@section, Seleciona o código para colocado em algum lugar no master-->
@section('content')
<div class="wrapper">
    <div class="view-wrapper margin-top-trinta">
        <div class="teste">
            <div class="card">
                <div class="card-header">
                    <strong>DETALHES ORÇAMENTO</strong>
                    <!--botão de voltar, indo para rota de nome budgets(index)-->
                    <a href="{{ route('budgets') }}" class="btn btn-outline-primary btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body description">
                    <!--variável session, que vem do método show-->
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!--Variáveis que vem do método show em seus respectivos lugares-->
                    <p><strong>Cliente: </strong>{{ $budgets->client }}</p>
                    <p><strong>Vendedor: </strong>{{ $budgets->seller }}</p>
                    <p><strong>Data: </strong>{{ $budgets->date }}</p>
                    <p><strong>Horário: </strong>{{ $budgets->schedule }}</p>
                    <p><strong>valor: </strong>R${{ $budgets->cost }}</p>
                    <p><strong>Descrição: </strong>{{ $budgets->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection