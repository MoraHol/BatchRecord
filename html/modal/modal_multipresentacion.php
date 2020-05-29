
<div class="modal fade" id="Modal_Multipresentacion" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong style="color: white;">Multipresentación</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-multi">
          <div class="row page">
            <div class="col-md-8 col-2 align-self-center">
              <label for="recipient-name" class="col-form-label"><strong>Referencia</strong></label>
              
              <!-- <input type="text" class="form-control" id="unidades" name="unidades"> -->
              <?php 
               /*  $query_nref = mysqli_query($conn, "SELECT nombre_referencia FROM producto WHERE multi = 
                                                  (SELECT multi FROM producto WHERE producto.referencia = 
                                                  (SELECT batch.id_producto FROM batch WHERE batch.id_batch = 95))");
                */                                   //echo $id_batch;
                /* $result = mysqli_num_rows($query_nref); */
              ?>
                            
              <select class="form-control" name="MultiReferencia" id="MultiReferencia" required>
                <!-- <option disabled selected>Seleccione la referencia</option> -->

                  <?php 
                     /*  if($result > 0){
                          while($data = mysqli_fetch_array($query_nref)){ */
                  ?>
                  <option> <?php //echo $data['nombre_referencia'] ?> </option>
                  <?php            
                      /* }
                    } */
                  ?>
              </select>

            </div>
            <!-- <div class="col-md-4 col-2 align-self-center">
              <label for="recipient-name" class="col-form-label"><strong>Presentación</strong></label>
              <input type="text" class="form-control" id="presentacion" name="presentacion">
            </div> -->
            <div class="col-md-4 col-2 align-self-center">
              <label for="recipient-name" class="col-form-label"><strong>Tamaño Lote</strong></label>
              <input type="text" class="form-control" id="tamanolote" name="cantidad">
            </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
      </form>
    </div>
  </div>
</div>