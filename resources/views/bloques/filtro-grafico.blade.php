<div class="panel panel-default">
    <div class="panel-heading">Buscar</div>

    <div class="panel-body text-center">
        <form class="form" role="form" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="grafico">Tipo de Gráfico</label>
                        <select class="form-control" name="grafico" id="tipo-grafico" required>
                            <option value="ingreso/egreso" {{ Request::input('grafico') == "ingreso/egreso" ? "selected" : "" }}>Ingresos/Egresos</option>
                            <option value="ingresos" {{ Request::input('grafico') === "ingresos" ? "selected" : "" }}>Fuentes de Ingresos</option>
                            <option value="gastosTrimestre" {{ Request::input('grafico') === "gastosTrimestre" ? "selected" : "" }}>Egresos por Categorías Trimestral</option>
                            <option value="gastos" {{ Request::input('grafico') === "gastos" ? "selected" : "" }}>Categorías de Egresos</option>
                            <option value="saldos" {{ Request::input('grafico') === "saldos" ? "selected" : "" }}>Saldos Finales por Trimestre</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="seccional">Seccional</label>
                        <select class="form-control" name="seccional" required>
                            @foreach ($seccionales as $seccional)
                                <option value="{{ $seccional->id }}" {{ Request::input('seccional') == $seccional->id ? "selected" : "" }}>{{ $seccional->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="trimestreDesde">Desde</label>
                        <select class="form-control" name="trimestreDesde" required>
                            @foreach ($trimestres as $trimestre)
                                <option value="{{ $trimestre->id }}" {{ Request::input('trimestreDesde') == $trimestre->id ? "selected" : "" }}>{{ $trimestre->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="añoDesde">Año</label>
                        <input type="numeric" class="form-control" name="añoDesde" value="{{ Request::input('añoDesde') }}" placeholder="2017" required>
                    </div>
                </div>
                <div class="col-md-4 rango">
                    <div class="form-group">
                        <label for="trimestreHasta">Hasta</label>
                        <select class="form-control" name="trimestreHasta" required>
                            @foreach ($trimestres as $trimestre)
                                <option value="{{ $trimestre->id }}" {{ Request::input('trimestreHasta') == $trimestre->id ? "selected" : "" }}>{{ $trimestre->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 rango">
                    <div class="form-group">
                        <label for="añoHasta">Año</label>
                        <input type="numeric" class="form-control" name="añoHasta" value="{{ Request::input('añoHasta') }}" placeholder="2017" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-default">Graficar</button>
        </form>
    </div>
</div>
