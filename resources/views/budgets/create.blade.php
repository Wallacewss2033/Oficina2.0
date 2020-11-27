@extends('layouts.panel.master')

@section('content')
<div class="wrapper">
    <div class="view-wrapper margin-top-trinta">

        <div class="teste">
            <div class="content-form">
                <form action="{{route('budgets.store')}}" method="POST">
                    @csrf
                    @include ('budgets.partial.form')
                    <button type="submit" class="btn btn-primary">finalizar orçamento</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection