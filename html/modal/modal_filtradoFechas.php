<div class="modal" tabindex="-1" id="filtrado" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"><strong style="color: white;">Filtrado por Fechas</strong></h5>
        </div>
        <div class="modal-body">
        <form action="" name="formFechas" id="formFechas" method="POST">
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
                <label class="custom-control-label" for="defaultUnchecked">Fecha de Creación</label>
            </div>

            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" checked>
                <label class="custom-control-label" for="defaultChecked">Fecha Programación</label>
            </div>
            
            <div class="col-md-12 col-2 align-self-center">
                <label for="recipient-name" class="col-form-label"><strong>Fecha Inicial</strong></label>
                <input type="date" class="form-control  mb-3" id="fechaInicial" name="fechaInicial" value="<?= $fechaprogramacion; ?>">
                <label for="recipient-name" class="col-form-label"><strong>Fecha Final</strong></label>
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" value="<?= $fechaprogramacion; ?>">  
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnFiltrado" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
    </div>
</div>




