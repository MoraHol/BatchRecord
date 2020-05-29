<?php 
    include_once('/Desarrollo/BatchRecord/htdocs/conexion.php');
?>

<div class="modal fade" id="modalCrearBatch" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="  background-color: #FF8D6D !important;">
                <h5 class="modal-title" id="exampleModalLabel"><span class="tcrearBatch"><b>Crear Batch Record</b></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=""  id="formBatch" name="formBatch" method="POST" autocomplete="off">
                    <input  id="idbatch"  type="hidden" class="displayallinfo" name="idbatch"> <!-- type="hidden" -->
                    
                    <div class="row page">
                        <div class="col-md-3 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Referencia</label>
                            <input  id="referencia" type="" class="displayallinfo" name="referencia" readonly> <!-- type="hidden" -->
                            <?php 
                                $query_referencia = mysqli_query($conn, 'SELECT referencia FROM producto');
                                $result = mysqli_num_rows($query_referencia);
                            ?>
                            
                            <select class="form-control" name="cmbNoReferencia" id="cmbNoReferencia" required>
                                <option disabled selected>Seleccione la referencia</option>

                                <?php 
                                    if($result > 0){
                                        while($data = mysqli_fetch_array($query_referencia)){
                                ?>
                                <option value=""> <?php echo $data['referencia'] ?> </option>
                                <?php            
                                }
                            }
                        ?>
                            </select>
                                           
                        </div>
                        <div class="col-md-9 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Nombre</label><br>
                            <input id="nombrereferencia" class="displayallinfo" readonly name="nombrereferencia">
                            
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row page">
                        
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Marca</label>
                            <input id="marca" class="displayallinfo" readonly name="marca">
                        </div>
                        <div class="col-md-8 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Propietario</label>
                            <input id="propietario" class="displayallinfo" readonly name="propietario">
                        </div>
                    </div>
                    
                    <!-- <input type="text" name="fechahoy" id="fechahoy" value="<?= $fecha; ?>" readonly > -->
                    
                    <div class="row page">
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Producto</label>
                            <input id="producto" class="displayallinfo" readonly name="producto">
                        </div>
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Presentación Comercial</label>
                            <input id="presentacioncomercial" class="displayallinfo" readonly name="presentacioncomercial" readonly>
                        </div>
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Linea</label>
                            <input id="linea" class="displayallinfo" readonly name="linea" readonly>
                        </div>
                    </div>
                    <!-- <div class="row page">
                        <div class="col-md-6 col-2 align-self-center d-none">
                            <label for="recipient-name" class="col-form-label">Estado</label><br>
                            <select class="selectpicker form-control" id="filtrar1" name="numerodelote" style="width: 80%">
                                <option value="0">Detenido</option>
                                <option value="1">Activo</option>
                            </select>
                        </div>
                    
                        <div class="col-md-6 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Estado</label><br>
                            <select class="selectpicker form-control" id="filtrar1" name="numerodelote" style="width: 80%" value="">
                                <option value="0">Detenido</option>
                                <option value="1">Activo</option>
                                <option value="2">En proceso</option>
                            </select>
                        </div>
                    </div> -->
                    <hr>
                    
                    <div class="row page">
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Notificación Sanitaria</label>
                            <input id="notificacionSanitaria" class="displayallinfo" readonly name="notificacionSanitaria">
                        </div>
                        
                      <input type="text" id="densidad" hidden> <!-- hidden -->
                    </div>
                    <hr>
                    <div class="row page">
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Unidades por Lote</label>
                            <input type="number" name="unidadesxlote" id="unidadesxlote" onchange="CalculoTamanolote(this.value);" class="form-control" min="1" value="" required />
                        </div>
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label" type="number">Tamaño del Lote (Kg)</label>
                            <input type="number" name="tamanototallote" id="tamanototallote" class="form-control Numeric" min="1" readonly value="" />
                        </div>
                        <!-- <div class="col-md-4 col-2 align-self-center d-none">
                            <label for="recipient-name" class="col-form-label">Tamaño del Lote por Presentación</label>
                            <input type="number" name="tamanolotepresentacion" id="tamanolotepresentacion" class="form-control" min="1" value="" />
                        </div> -->
                    </div>
                    <hr>
                    <div class="row page">
                        <div class="col-md-4 col-2 align-self-center">
                            <label for="recipient-name" class="col-form-label">Fecha de Programación</label>
                            <input type="date" class="form-control" id="fechaprogramacion" name="fechaprogramacion" value="" min="<?php $hoy = date("Y-m-d"); echo $hoy; ?>">
                        </div>
                        <!-- <div class="col-md-6 col-2 align-self-center">
                            <button type="button" class="btn waves-effect waves-light btn-danger pull-center" data-toggle="modal" data-target="#ClonarModal" data-dismiss="modal" aria-label="Close" style="width: 80%; margin-top: 12%">Clonar Batch
                            </button>
                        </div> -->
                    </div>
                    <hr>
                    <div class="row page">
                        <div class="col-md-6 col-2 align-self-center">
                            <!-- <form action="" method="POST"> -->
                                <label for="recipient-name" class="col-form-label">Observaciones Pesaje</label>
                                <button id="adicionarPesaje" name="adicionarPesaje" type="button" class="btn btn-primary">+</button>
                            
                                <table id="addTanquePesaje" class="mt-3">
                                    <tr>
                                        <td>
                                        <?php 
                                            $query_tanquep = mysqli_query($conn, 'SELECT capacidad FROM tanques');
                                            $result = mysqli_num_rows($query_referencia);
                                        ?>
                                        <select class="form-control" name="tanquePesaje" id="tanquePesaje" >
                                            <option disabled selected>Tanque</option>
                                                <?php 
                                                    if($result > 0){
                                                        while($data = mysqli_fetch_array($query_tanquep)){
                                                ?>
                                            <option value=""> <?php echo $data['capacidad'] ?> </option>
                                                <?php            
                                                        }
                                                    }
                                                ?>
                                        </select>
                                        </td>
                                        <td><input type="number" class="form-control" id="obpesaje" name="obpesaje" ></td>
                                        <td class="eliminarPesaje"> <input class="btn btn-warning" type="button" value="-"> </td> 
                                    </tr>
                                </table>    
                            <!-- </form> -->
                        </div>
                        <div class="col-md-6 col-2 align-self-center">
                            <!-- <form action="" method="POST"> -->
                                <label for="recipient-name" class="col-form-label">Observaciones Preparación</label>
                                <button id="adicionarPreparacion" name="adicionarPreparacion" type="button" class="btn btn-primary">+</button>
                            
                                <table id="addTanquePreparacion" class="mt-3">
                                    <tr>
                                        <td>
                                        <?php 
                                            $query_tanquep = mysqli_query($conn, 'SELECT capacidad FROM tanques');
                                            $result = mysqli_num_rows($query_referencia);
                                        ?>
                                        <select class="form-control" name="tanquePrepracion" id="tanquePrepracion" >
                                            <option disabled selected>Tanque</option>
                                                <?php 
                                                    if($result > 0){
                                                        while($data = mysqli_fetch_array($query_tanquep)){
                                                ?>
                                            <option value=""> <?php echo $data['capacidad'] ?> </option>
                                                <?php            
                                                        }
                                                    }
                                                ?>
                                        </select>
                                        </td>
                                        <td><input type="number" class="form-control" id="obpreparacion" name="obpreparacion" ></td>
                                        <td class="eliminarPreparacion"> <input class="btn btn-warning" type="button" value="-"></td> 
                                    </tr>
                                </table>    
                           <!--  </form> -->
                        </div>    
                    </div>            
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary crearbatch" name="guardarBatch" id="guardarBatch">Crear</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>