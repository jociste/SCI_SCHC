<div class="span12" style="align-content: center">
    <div class="row-fluid" style="align-content: center">
        <div class="form-actions" style="height: 30px;">
            <h4 style="width: 550px; align-content: center; margin: 0; padding-left: 30%">Datos Producto</h4> 
        </div>
        <form id="fm-Categoria" class="form-horizontal well" style="align-content: center">                                        
            <div class="control-group">
                <label class="control-label" for="nombre">Nombre *</label>
                <div class="controls">
                    <input class="input-xlarge focused" id="nombre" name="nombre" type="text" placeholder="Nombre producto" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="idCategoria">Categoría *</label>
                <div class="controls">
                    <select  class="input-xlarge focused" id="idCategoria" name="idCategoria" required>
                        <option value="-1">Seleccionar...</option>
                    </select>
                </div>
            </div>
            <div class="controls">
                (*) campos Obligatorios
            </div>
            <div class="form-actions" style="align-content: center">
                <button type="button" onclick="guardar()" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" onClick="location.href = 'AdministrarProductos.php'" class="btn">Cancelar</button>
            </div>
            <input type="hidden" id="accion" name="accion" value="">
             <input type="hidden" id="perfil" name="perfil" value="<?php echo $perfil; ?>">
        </form>
        <!-- FIN FORMULARIO-->
    </div>
</div>