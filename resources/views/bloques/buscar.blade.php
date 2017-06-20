<div class="panel panel-default">
    <div class="panel-heading">Buscar</div>

    <div class="panel-body text-center">
        <form class="form-inline" role="form" method="GET">

            <div class="form-group">
                <label for="trimestre">Trimestre</label>
                <select class="form-control" name="trimestre" required="required">
                    <option value=""></option>
                    <option value="1">Primero</option>
                    <option value="2">Segundo</option>
                    <option value="3">Tercero</option>
                    <option value="4">Cuarto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="año">Año</label>
                <input type="numeric" class="form-control" name="año" value="{{ old('año') }}" placeholder="2017" required="required">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>
    </div>
</div>
