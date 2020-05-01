<div class="modal" tabindex="-1" id="filtrado" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"><strong>Filtrado por Fechas</strong></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button> -->
        </div>
        <div class="modal-body">
    <!-- Default unchecked -->
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
            <label class="custom-control-label" for="defaultUnchecked">Fecha de Creación</label>
        </div>

        <!-- Default checked -->
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" checked>
            <label class="custom-control-label" for="defaultChecked">Fecha Programación</label>
        </div>
        
        <div class="col-md-12 col-2 align-self-center">
            <label for="recipient-name" class="col-form-label"><strong>Fecha Inicial</strong></label>
            <input type="date" class="form-control" id="fecha" name="fechaprogramacion" value="<?= $fechaprogramacion; ?>">
            <label for="recipient-name" class="col-form-label"><strong>Fecha Final</strong></label>
            <input type="date" class="form-control" id="fecha" name="fechaprogramacion" value="<?= $fechaprogramacion; ?>">  
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </div>
</div>