@extends('layouts.panel.master')

@section('content')
<div class="wrapper">
    <div class="view-wrapper margin-top-trinta">
        <div class="teste">
            <div class="card">
                <div class="card-header">
                    <strong>DETALHES ORÇAMENTO</strong>
                    <a href="{{ route('budgets') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body description">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p><strong>Cliente: </strong>{{ $budgets->client }}</p>
                    <p><strong>Vendedor: </strong>{{ $budgets->seller }}</p>
                    <p><strong>Data: </strong>{{ $budgets->date }}</p>
                    <p><strong>Horário: </strong>{{ $budgets->schedule }}</p>
                    <p><strong>Descrição: </strong>{{ $budgets->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection