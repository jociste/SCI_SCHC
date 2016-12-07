<div id="container" class="span9" style="width: 100%; height: 600px">
    <div class="span12">
        <div class="span6">
            <div class="alert alert-block alert-error" id="AlertaPorVencer" style="float: left; width: 80% ; display: none">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><b> Advertencia</b></h4>
                <hr style="padding: 0px; margin-top: 10px">
                <h5>Existen Productos Vencidos o Por Vencer.</h5>
                <br>
                <div style="padding-left: 36%">
                    <a href="MostrarLoteProductosOrdenadosPorVencer.php" class="btn btn-danger"><i class="icon-arrow-right"></i> REVISAR</a>      
                </div>                                                                             
            </div>
        </div>
        <div class="span6">
            <div class="alert alert-block alert-danger" id="AlertaBajoStock" style="float: right; width: 80% ; display: none">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <h4><b> Advertencia</b> </h4>
                <hr style="padding: 0px; margin-top: 10px">
                <h5>Existen Productos con bajo stock. </h5>
                <br>
                <div style="padding-left: 36%">
                    <a href="MostrarLoteProductosOrdenadosPorStock.php" class="btn btn-warning"><i class="icon-arrow-right"></i> REVISAR</a>      
                </div>                                                                             
            </div>
        </div>
    </div>
    <br>
    <div class="span9">
        <div style="width: 100%; align-content: center; padding-left: 52%; padding-top: 5%;">
            <!--<a href="AdministrarFuncionariasHabilitadas.php" class="button button-pill btn btn-warning" style="height: 83px; width: 110px; padding-top: 50px"><i class="icon-group"></i>&nbsp;Personal</a>  &nbsp;-->                      
            <a href="AdministrarLotesProducto.php" class="button button-pill btn btn-info" style="height: 83px; width: 110px; padding-top: 50px"><i class="icon-archive"></i>&nbsp;Inventario Productos</a>&nbsp;  &nbsp;                       
        </div>
    </div>
</div>