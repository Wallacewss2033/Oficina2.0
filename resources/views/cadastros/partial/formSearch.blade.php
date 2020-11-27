<form method="GET" action="{{ route('budgets.search') }}">
    @csrf
    <div class="form-row">

        <div class="form-group col-md-2">
            <label for="inputPassword4">Data inicial</label>
            <input type="date" name="data_inicial" class="form-control @error('data_inicial') is-invalid @enderror" id="inputPassword4">

            @error('data_inicial')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Data final</label>
            <input type="date" name="data_final" class="form-control @error('data_final') is-invalid @enderror" id="inputPassword4">
            @error('data_final')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="inputEmail4">Cliente</label>
            <input type="text" name="cliente" class="form-control @error('cliente') is-invalid @enderror" id="inputEmail4" placeholder="Nome completo">
            @error('cliente')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" form-group col-md-3">
            <label for="inputAddress">Vendedor</label>
            <input type="text" name="vendedor" class="form-control @error('vendedor') is-invalid @enderror" id="inputAddress" placeholder="Nome completo">
            @error('vendedor')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-2" style="margin-top: 31px;">
            <button type="submit" class="form-control bg-primary text-white" id="inputAddress">Pesquisar</button>
        </div>
    </div>
</form>