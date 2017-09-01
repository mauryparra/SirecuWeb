<div class="panel panel-default">
    <div class="panel-heading">Buscar</div>

    <div class="panel-body text-center">
        <form class="form-inline" role="form" method="GET">
            <div class="form-group">
                <label for="seccional">Seccional</label>
                <select class="form-control" name="seccional" required>
                    @foreach (App\Seccional::orderBy('id', 'desc')->get() as $seccional)
                        <option value="{{ $seccional->id }}" {{ Request::input('seccional') == $seccional->id ? "selected" : "" }}>{{ $seccional->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="trimestre">Trimestre</label>
                <select class="form-control" name="trimestre" required>
                    <option value=""></option>
                    @foreach (App\Trimestre::all() as $trimestre)
                        <option value="{{ $trimestre->id }}" {{ Request::input('trimestre') == $trimestre->id ? "selected" : "" }}>{{ $trimestre->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="año">Año</label>
                <input type="numeric" class="form-control" name="año" value="{{ Request::input('año') }}" placeholder="2017" required>
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>
    </div>
</div>
