<!--@extends, chama o layout master-->
@extends('layouts.panel.master')

<!--@section, Seleciona o código para colocado em algum lugar no master-->
@section('content')
<div class="wrapper">
    <div class="view-wrapper margin-top-trinta">
        <div class="card-header margin-bottom">
            <strong>CRIAR ORÇAMENTO</strong>
            <!--botão de voltar, indo para rota de nome budgets(index)-->
            <a href="{{ route('budgets') }}" class="btn btn-outline-primary btn-sm float-right">Voltar</a>
        </div>
        <div class="margin-top-dez">
            <div class="content-form">
                <form action="{{route('budgets.store')}}" method="POST">
                    @csrf
                     <!--@include, chama a view form para dentro deste código-->
                    @include ('budgets.partial.form')
                    <button type="submit" class="btn btn-primary">finalizar orçamento</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection