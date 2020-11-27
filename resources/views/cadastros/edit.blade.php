@extends('layouts.panel.master')

@section('content')
<div class="wrapper">
    <div class="view-wrapper margin-top-trinta">
        <div class="teste">
            <div class="content-form">
                <form action="{{ route('budgets.update', $budgets->id) }}" method="POST">
                    @csrf
                    @include ('cadastros.partial.form')
                    <button type="submit" class="btn btn-primary">atualizar orçamento</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection