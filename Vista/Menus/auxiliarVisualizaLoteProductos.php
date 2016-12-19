<div class="span12">
    <div class="header">
        <h4>Lotes de Producto</h4>
    </div>
    <div class="body" style="text-align: center;">
        <div>
            <a class="btn btn-success btn-block" style="width: 200px;float: right; margin-bottom: 1%" onClick="location.href = 'agregarLoteProducto.php'">
                Agregar Lote de Producto <i class="icon-book" ></i>
            </a>
        </div>
        <div class="row-fluid">
            <!-- CONTENIDO AQUI -->
            <div class="table-responsive">
                <table class="table">
                    <thead> 
                        <tr> 
                            <th>N° Boleta</th> 
                            <th>Producto</th>                                                              
                            <th>Cantidad</th> 
                            <th>Proveedor</th>
                            <th>Fecha Vencimiento</th>
                            <th>Fecha Ingreso</th>
                            <th>Accion</th>
                        </tr> 
                    </thead>
                    <tbody id="tablaLotesAuxiliar">

                    </tbody>
                </table>
                <input type="hidden" id="accion" name="accion" value="">
                 <input type="hidden" id="perfil" name="perfil" value="<?php echo $perfil; ?>">


            </div>
        </div>
    </div>
</div>