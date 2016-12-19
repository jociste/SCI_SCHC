<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/Lote_producto_usadosDTO.php';

class Lote_producto_usadosDAO {

    private $conexion;

    public function Lote_producto_usadosDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idLoteProductosUsados) {
        $this->conexion->conectar();
        $query = "DELETE FROM lote_producto_usados WHERE  idLoteProductosUsados =  " . $idLoteProductosUsados . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_producto_usadoss = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados = new Lote_producto_usadosDTO();
            $lote_producto_usados->setIdLoteProductosUsados($fila[0]);
            $lote_producto_usados->setIdLote($fila[1]);
            $lote_producto_usados->setRunFuncionaria($fila[2]);
            $lote_producto_usados->setCantidad($fila[3]);
            $lote_producto_usados->setFechaRetiro($fila[4]);
            $lote_producto_usados->setDestino($fila[5]);
            $lote_producto_usadoss[$i] = $lote_producto_usados;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_producto_usadoss;
    }

    public function buscarProductosUsadosAuxiliar() {
        $this->conexion->conectar();
        $query = "select lpu.idLoteProductosUsados, lpu.idLote, lp.idProducto, p.nombre, lpu.runFuncionaria, f.nombres, f.apellidos, lpu.cantidad, lpu.fechaRetiro, lpu.destino from lote_producto_usados as lpu 
        join funcionaria as f on lpu.runFuncionaria = f.runFuncionaria join lote_producto as lp on lp.idLote = lpu.idLote
        JOIN producto as p on p.idProducto = lp.idProducto JOIN categoria C ON p.idCategoria = C.idCategoria 
JOIN permiso_visualizacion_categoria AS pvc on pvc.idCategoria = C.idCategoria join cargo as ca on ca.idCargo = pvc.idCargo 
 where ca.idCargo = 4";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productosUsados = array();
        while ($fila = $result->fetch_row()) {
            $productos = new Lote_producto_usadosDTO();
            $productos->setIdLoteProductosUsados($fila[0]);
            $productos->setIdLote($fila[1]);
            $productos->setIdProducto($fila[2]);
            $productos->setNombreProducto($fila[3]);
            $productos->setRunFuncionaria($fila[4]);
            $productos->setNombres($fila[5]);
            $productos->setApellidos($fila[6]);
            $productos->setCantidad($fila[7]);
            $productos->setFechaRetiro($fila[8]);
            $productos->setDestino($fila[9]);
            $productosUsados[$i] = $productos;
            $i++;
        }
        $this->conexion->desconectar();
        return $productosUsados;
    }

    public function buscarProductosUsados() {
        $this->conexion->conectar();
        $query = "select lpu.idLoteProductosUsados, lpu.idLote, lp.idProducto, p.nombre, lpu.runFuncionaria, f.nombres, f.apellidos, lpu.cantidad, lpu.fechaRetiro, lpu.destino from lote_producto_usados as lpu 
        join funcionaria as f on lpu.runFuncionaria = f.runFuncionaria join lote_producto as lp on lp.idLote = lpu.idLote
        JOIN producto as p on p.idProducto = lp.idProducto";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productosUsados = array();
        while ($fila = $result->fetch_row()) {
            $productos = new Lote_producto_usadosDTO();
            $productos->setIdLoteProductosUsados($fila[0]);
            $productos->setIdLote($fila[1]);
            $productos->setIdProducto($fila[2]);
            $productos->setNombreProducto($fila[3]);
            $productos->setRunFuncionaria($fila[4]);
            $productos->setNombres($fila[5]);
            $productos->setApellidos($fila[6]);
            $productos->setCantidad($fila[7]);
            $productos->setFechaRetiro($fila[8]);
            $productos->setDestino($fila[9]);
            $productosUsados[$i] = $productos;
            $i++;
        }
        $this->conexion->desconectar();
        return $productosUsados;
    }

    public function buscarProductosUsadosByFechas($fechaInicio, $fechaTermino) {
        $this->conexion->conectar();
        $query = "select lpu.idLoteProductosUsados, lpu.idLote, lp.idProducto, p.nombre, lpu.runFuncionaria, f.nombres, f.apellidos, lpu.cantidad, lpu.fechaRetiro, lpu.destino from lote_producto_usados as lpu 
        join funcionaria as f on lpu.runFuncionaria = f.runFuncionaria join lote_producto as lp on lp.idLote = lpu.idLote
        JOIN producto as p on p.idProducto = lp.idProducto WHERE lpu.fechaRetiro <= '" . $fechaTermino . "' AND lpu.fechaRetiro >= '" . $fechaInicio . "'";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $productosUsados = array();
        while ($fila = $result->fetch_row()) {
            $productos = new Lote_producto_usadosDTO();
            $productos->setIdLoteProductosUsados($fila[0]);
            $productos->setIdLote($fila[1]);
            $productos->setIdProducto($fila[2]);
            $productos->setNombreProducto($fila[3]);
            $productos->setRunFuncionaria($fila[4]);
            $productos->setNombres($fila[5]);
            $productos->setApellidos($fila[6]);
            $productos->setCantidad($fila[7]);
            $productos->setFechaRetiro($fila[8]);
            $productos->setDestino($fila[9]);
            $productosUsados[$i] = $productos;
            $i++;
        }
        $this->conexion->desconectar();
        return $productosUsados;
    }

    public function findByID($idLoteProductosUsados) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados WHERE  idLoteProductosUsados =  " . $idLoteProductosUsados . " ";
        $result = $this->conexion->ejecutar($query);
        $lote_producto_usados = new Lote_producto_usadosDTO();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados->setIdLoteProductosUsados($fila[0]);
            $lote_producto_usados->setIdLote($fila[1]);
            $lote_producto_usados->setRunFuncionaria($fila[2]);
            $lote_producto_usados->setCantidad($fila[3]);
            $lote_producto_usados->setFechaRetiro($fila[4]);
            $lote_producto_usados->setDestino($fila[5]);
        }
        $this->conexion->desconectar();
        return $lote_producto_usados;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM lote_producto_usados WHERE  upper(idLote) LIKE upper(" . $cadena . ")  OR  upper(runFuncionaria) LIKE upper(" . $cadena . ")  OR  upper(cantidad) LIKE upper(" . $cadena . ")  OR  upper(fechaRetiro) LIKE upper(" . $cadena . ")  OR  upper(destino) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $lote_producto_usadoss = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto_usados = new Lote_producto_usadosDTO();
            $lote_producto_usados->setIdLoteProductosUsados($fila[0]);
            $lote_producto_usados->setIdLote($fila[1]);
            $lote_producto_usados->setRunFuncionaria($fila[2]);
            $lote_producto_usados->setCantidad($fila[3]);
            $lote_producto_usados->setFechaRetiro($fila[4]);
            $lote_producto_usados->setDestino($fila[5]);
            $lote_producto_usadoss[$i] = $lote_producto_usados;
            $i++;
        }
        $this->conexion->desconectar();
        return $lote_producto_usadoss;
    }

    public function save($lote_producto_usados) {
        $this->conexion->conectar();
        $query = "INSERT INTO lote_producto_usados (idLote,runFuncionaria,cantidad,fechaRetiro,destino)"
                . " VALUES ( " . $lote_producto_usados->getIdLote() . " ,  " . $lote_producto_usados->getRunFuncionaria() . " ,  " . $lote_producto_usados->getCantidad() . " , '" . $lote_producto_usados->getFechaRetiro() . "' , '" . $lote_producto_usados->getDestino() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($lote_producto_usados) {
        $this->conexion->conectar();
        $query = "UPDATE lote_producto_usados SET "
                . "  idLote =  " . $lote_producto_usados->getIdLote() . " ,"
                . "  runFuncionaria =  " . $lote_producto_usados->getRunFuncionaria() . " ,"
                . "  cantidad =  " . $lote_producto_usados->getCantidad() . " ,"
                . "  fechaRetiro = '" . $lote_producto_usados->getFechaRetiro() . "' ,"
                . "  destino = '" . $lote_producto_usados->getDestino() . "' "
                . " WHERE idLoteProductosUsados =  " . $lote_producto_usados->getIdLoteProductosUsados() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function lotesProductosUsadosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino) {
        $this->conexion->conectar();
        $query = "SELECT lpu.idLoteProductosUsados ,lpu.idLote, lpu.runFuncionaria, f.nombres,f.apellidos,lp.idProducto ,lpu.cantidad, lpu.fechaRetiro,lpu.destino FROM lote_producto_usados lpu JOIN lote_producto lp ON lpu.idLote = lp.idLote JOIN producto p ON lp.idProducto = p.idProducto JOIN funcionaria f ON lpu.runFuncionaria = f.runFuncionaria WHERE p.idCategoria = " . $idCategoria . " AND lpu.fechaRetiro BETWEEN '" . $fechaInicio . "' AND '" . $fechaTermino . "' ORDER BY lp.idProducto, lpu.fechaRetiro; ";
        $result = $this->conexion->ejecutar($query);
        $lote_productos = array();
        while ($fila = $result->fetch_row()) {
            $lote_producto = new Lote_producto_usadosDTO();
            $lote_producto->setIdLoteProductosUsados($fila[0]);
            $lote_producto->setIdLote($fila[1]);
            $lote_producto->setRunFuncionaria($fila[2]);
            $lote_producto->setNombres($fila[3]);
            $lote_producto->setApellidos($fila[4]);
            $lote_producto->setIdProducto($fila[5]);
            $lote_producto->setCantidad($fila[6]);
            $lote_producto->setFechaRetiro($fila[7]);
            $lote_producto->setDestino($fila[8]);

            if (!array_key_exists($fila[5], $lote_productos)) {
                $lote_productos[$fila[5]] = array();
            }
            array_push($lote_productos[$fila[5]], $lote_producto);
        }
        $this->conexion->desconectar();
        return $lote_productos;
    }

    public function getStockFinalProductosByIdCategoriaAndFecha($idCategoria, $fecha) {
        $this->conexion->conectar();
        $query = "SELECT ingresos.idProducto, ingresos.nombre, ingresos.cantidad as inicial, IFNULL(usados.usado,0) as utilizado, (ingresos.cantidad-IFNULL(usados.usado,0)) as stock  FROM "
                . " (SELECT lp.idProducto, sum(lp.cantidad) as cantidad, p.nombre  "
                . " FROM lote_producto lp JOIN producto p ON lp.idProducto = p.idProducto WHERE p.idCategoria = " . $idCategoria . " AND lp.fechaIngreso < '" . $fecha . "' "
                . " GROUP BY lp.idProducto "
                . " ORDER BY lp.idProducto, lp.fechaIngreso) as ingresos "
                . " LEFT JOIN  "
                . " (SELECT lp.idProducto ,sum(lpu.cantidad) as usado "
                . " FROM lote_producto_usados lpu JOIN lote_producto lp ON lpu.idLote = lp.idLote JOIN producto p ON lp.idProducto = p.idProducto  "
                . " WHERE p.idCategoria = 1 AND lp.fechaIngreso < '" . $fecha . "' "
                . " GROUP BY lp.idProducto ORDER BY lp.idProducto, lpu.fechaRetiro) as usados "
                . " ON ingresos.idProducto = usados.idProducto";
        $result = $this->conexion->ejecutar($query);
        $stock_productos = array();
        while ($fila = $result->fetch_row()) {
            $stock = array('idProducto' => $fila[0], 'nombre' => $fila[1], 'inicial' => $fila[2], 'utilizado' => $fila[3], 'stock' => $fila[4]);

            /* if (!array_key_exists($fila[0], $stock_productos)) {
              $stock_productos[$fila[0]] = array();
              } */
            $stock_productos[$fila[0]] = $stock;
            //array_push($stock_productos, $stock);
        }
        $this->conexion->desconectar();
        return $stock_productos;
    }

}
