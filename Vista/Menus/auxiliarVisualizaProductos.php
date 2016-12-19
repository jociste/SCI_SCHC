<div class="span12">
    <div class="social-box social-bordered social-blue">
        <div class="header">
            <h4>Productos</h4>
        </div>
        <div class="body" style="text-align: center;">
            <div>
                <a class="btn btn-success btn-block" style="width: 200px;float: right; margin-bottom: 1%" onClick="location.href = 'agregarProducto.php'">
                    Agregar Producto <i class="icon-book" ></i>
                </a>
            </div>
            <div class="row-fluid">
                <!-- CONTENIDO AQUI -->
                <div class="table-responsive">
                    <table class="table">
                        <thead> 
                            <tr> 
                                <th>ID</th> 
                                <th>Producto</th> 
                                <th>Categoria</th>
                                <th>Accion</th>
                            </tr> 
                        </thead>
                        <tbody id="tablaProductosAuxiliar">

                        </tbody>
                    </table>
                    <input type="hidden" id="accion" name="accion" value="">
                    <input type="hidden" id="perfil" name="perfil" value="<?php echo $perfil; ?>">
                </div>
            </div>
        </div>
    </div>
</div> 