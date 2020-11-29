@extends('layouts.panel.master')

@section('content')
<div class="wrapper">
    <div class="view-wrapper margin-top-trinta">
    <div class="card-header margin-bottom">
            <strong>EDITAR ORÇAMENTO</strong>
            <a href="{{ route('budgets') }}" class="btn btn-outline-primary btn-sm float-right">Voltar</a>
        </div>
        <div class="teste margin-top-dez">
            <div class="content-form">
                <form action="{{ route('budgets.update', $budgets->id) }}" method="POST">
                    @csrf
                    @include ('budgets.partial.form')
                    <button type="submit" class="btn btn-primary">atualizar orçamento</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection