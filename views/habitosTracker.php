<div class="container mt-4">
    <div class="row" id="bloqueIntervalo">
        <div class="col-md-6">
            <h2>Seleccionar Intervalo de Fechas</h2>
            <form id="form-intervalo-habito">
                <div class="form-group">
                    <label for="intervalos">Intervalos Predefinidos:</label>
                    <select id="intervalosHabito" class="form-select">
                        <option value="">Seleccionar...</option>
                        <option value="ultima_semana">Última Semana</option>
                        <option value="ultimo_mes">Último Mes</option>
                        <option value="ultimo_anio">Último Año</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaInicio">Fecha de Inicio:</label>
                    <input type="text" id="fechaInicioHabito" name="fechaInicio" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fechaFin">Fecha de Fin:</label>
                    <input type="text" id="fechaFinHabito" name="fechaFin" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ver Historial</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div id="historialHabitos"></div>
        </div>
    </div>
</div>