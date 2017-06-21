<div class="panel panel-default">
    <div class="panel-heading">Buscar</div>

    <div class="panel-body text-center">
        <form class="form-inline" role="form" method="GET">

            <div class="form-group">
                <label for="grafico">Tipo de Gráfico</label>
                <select class="form-control" name="grafico" required>
                    <option value="ingreso/egreso" {{ Request::input('grafico') === "ingreso/egreso" ? "selected" : "" }}>Ingresos/Egresos</option>
                    <option value="ingresos" {{ Request::input('grafico') === "ingresos" ? "selected" : "" }}>Fuentes de Ingresos</option>
                    <option value="gastos" {{ Request::input('grafico') === "gastos" ? "selected" : "" }}>Categorías de Gasto</option>
                    <option value="saldos" {{ Request::input('grafico') === "saldos" ? "selected" : "" }}>Saldos Finales por Trimestre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="seccional">Seccional</label>
                <select class="form-control" name="seccional" required>
                    @foreach (App\Seccional::orderBy('id', 'desc')->get() as $seccional)
                        <option value="{{ $seccional->id }}" {{ Request::input('seccional') === $seccional->id ? "selected" : "" }}>{{ $seccional->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="año">Año</label>
                <input type="numeric" class="form-control" name="año" value="{{ Request::input('año') }}" placeholder="2017" required>
            </div>
            <button type="submit" class="btn btn-default">Graficar</button>
        </form>
    </div>
</div>
