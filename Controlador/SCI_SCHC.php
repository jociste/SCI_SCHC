<?php

include_once 'Mantenedores/BajaDAO.php';
include_once 'Mantenedores/BienDAO.php';
include_once 'Mantenedores/Bien_nivelDAO.php';
include_once 'Mantenedores/CargoDAO.php';
include_once 'Mantenedores/CategoriaDAO.php';
include_once 'Mantenedores/ComprobanteDAO.php';
include_once 'Mantenedores/Datos_generalesDAO.php';
include_once 'Mantenedores/Detalle_comprobanteDAO.php';
include_once 'Mantenedores/DocumentoDAO.php';
include_once 'Mantenedores/FuncionariaDAO.php';
include_once 'Mantenedores/Funcionaria_cargoDAO.php';
include_once 'Mantenedores/Lote_productoDAO.php';
include_once 'Mantenedores/Lote_producto_usadosDAO.php';
include_once 'Mantenedores/NivelDAO.php';
include_once 'Mantenedores/Nivel_funcionariaDAO.php';
include_once 'Mantenedores/Permiso_visualizacion_categoriaDAO.php';
include_once 'Mantenedores/Permiso_visualizacion_tipo_documentoDAO.php';
include_once 'Mantenedores/ProductoDAO.php';
include_once 'Mantenedores/Tipo_documentoDAO.php';

class SCI_SCHC {

    private static $instancia = NULL;
    private $bajaDAO;
    private $bienDAO;
    private $bien_nivelDAO;
    private $cargoDAO;
    private $categoriaDAO;
    private $comprobanteDAO;
    private $datos_generalesDAO;
    private $detalle_comprobanteDAO;
    private $documentoDAO;
    private $funcionariaDAO;
    private $funcionaria_cargoDAO;
    private $lote_productoDAO;
    private $lote_producto_usadosDAO;
    private $nivelDAO;
    private $nivel_funcionariaDAO;
    private $permiso_visualizacion_categoriaDAO;
    private $permiso_visualizacion_tipo_documentoDAO;
    private $productoDAO;
    private $tipo_documentoDAO;

    public function SCI_SCHC() {
        $this->bajaDAO = new BajaDAO();
        $this->bienDAO = new BienDAO();
        $this->bien_nivelDAO = new Bien_nivelDAO();
        $this->cargoDAO = new CargoDAO();
        $this->categoriaDAO = new CategoriaDAO();
        $this->comprobanteDAO = new ComprobanteDAO();
        $this->datos_generalesDAO = new Datos_generalesDAO();
        $this->detalle_comprobanteDAO = new Detalle_comprobanteDAO();
        $this->documentoDAO = new DocumentoDAO();
        $this->funcionariaDAO = new FuncionariaDAO();
        $this->funcionaria_cargoDAO = new Funcionaria_cargoDAO();
        $this->lote_productoDAO = new Lote_productoDAO();
        $this->lote_producto_usadosDAO = new Lote_producto_usadosDAO();
        $this->nivelDAO = new NivelDAO();
        $this->nivel_funcionariaDAO = new Nivel_funcionariaDAO();
        $this->permiso_visualizacion_categoriaDAO = new Permiso_visualizacion_categoriaDAO();
        $this->permiso_visualizacion_tipo_documentoDAO = new Permiso_visualizacion_tipo_documentoDAO();
        $this->productoDAO = new ProductoDAO();
        $this->tipo_documentoDAO = new Tipo_documentoDAO();
    }

    public static function getInstancia() {
        if (self::$instancia == NULL) {
            self::$instancia = new SCI_SCHC();
        }
        return self::$instancia;
    }

    public function getAllBajas() {
        return $this->bajaDAO->findAll();
    }

    public function addBaja($baja) {
        return $this->bajaDAO->save($baja);
    }

    public function removeBaja($idBaja) {
        return $this->bajaDAO->delete($idBaja);
    }

    public function updateBaja($baja) {
        return $this->bajaDAO->update($baja);
    }

    public function getBajaByID($idBaja) {
        return $this->bajaDAO->findByID($idBaja);
    }

    public function getBajaLikeAtrr($cadena) {
        return $this->bajaDAO->findLikeAtrr($cadena);
    }

    public function getAllBiens() {
        return $this->bienDAO->findAll();
    }

    public function getAllBiensHabilitados() {
        return $this->bienDAO->findAllHabilitados();
    }

    public function addBien($bien) {
        return $this->bienDAO->save($bien);
    }

    public function removeBien($idBien) {
        return $this->bienDAO->delete($idBien);
    }

    public function updateBien($bien) {
        return $this->bienDAO->update($bien);
    }

    public function getBienByID($idBien) {
        return $this->bienDAO->findByID($idBien);
    }

    public function getBienesByIdCategoria($idCategoria) {
        return $this->bienDAO->findByIdCategoria($idCategoria);
    }

    public function getBienLikeAtrr($cadena) {
        return $this->bienDAO->findLikeAtrr($cadena);
    }

    public function getAllBien_nivels() {
        return $this->bien_nivelDAO->findAll();
    }

    public function addBien_nivel($bien_nivel) {
        return $this->bien_nivelDAO->save($bien_nivel);
    }

    public function removeBien_nivel($idBien) {
        return $this->bien_nivelDAO->delete($idBien);
    }

    public function updateBien_nivel($bien_nivel) {
        return $this->bien_nivelDAO->update($bien_nivel);
    }

    public function getBien_nivelByID($idNivelBien) {
        return $this->bien_nivelDAO->findByID($idNivelBien);
    }

    public function getBien_nivelLikeAtrr($cadena) {
        return $this->bien_nivelDAO->findLikeAtrr($cadena);
    }

    public function getAllCargos() {
        return $this->cargoDAO->findAll();
    }

    public function addCargo($cargo) {
        return $this->cargoDAO->save($cargo);
    }

    public function removeCargo($idCargo) {
        return $this->cargoDAO->delete($idCargo);
    }

    public function updateCargo($cargo) {
        return $this->cargoDAO->update($cargo);
    }

    public function getCargoByID($idCargo) {
        return $this->cargoDAO->findByID($idCargo);
    }

    public function getCargoLikeAtrr($cadena) {
        return $this->cargoDAO->findLikeAtrr($cadena);
    }

    public function getAllCategorias() {
        return $this->categoriaDAO->findAll();
    }

    public function addCategoria($categoria) {
        return $this->categoriaDAO->save($categoria);
    }

    public function removeCategoria($idCategoria) {
        return $this->categoriaDAO->delete($idCategoria);
    }

    public function updateCategoria($categoria) {
        return $this->categoriaDAO->update($categoria);
    }

    public function getCategoriaByID($idCategoria) {
        return $this->categoriaDAO->findByID($idCategoria);
    }

    public function getCategoriaLikeAtrr($cadena) {
        return $this->categoriaDAO->findLikeAtrr($cadena);
    }

    public function getAllComprobantes() {
        return $this->comprobanteDAO->findAll();
    }

    public function addComprobante($comprobante) {
        return $this->comprobanteDAO->save($comprobante);
    }

    public function removeComprobante($idRegistro) {
        return $this->comprobanteDAO->delete($idRegistro);
    }

    public function updateComprobante($comprobante) {
        return $this->comprobanteDAO->update($comprobante);
    }

    public function getComprobanteByID($idRegistro) {
        return $this->comprobanteDAO->findByID($idRegistro);
    }

    public function getComprobanteLikeAtrr($cadena) {
        return $this->comprobanteDAO->findLikeAtrr($cadena);
    }

    public function getAllDatos_generaless() {
        return $this->datos_generalesDAO->findAll();
    }

    public function addDatos_generales($datos_generales) {
        return $this->datos_generalesDAO->save($datos_generales);
    }

    public function removeDatos_generales($codigoEstablecimiento) {
        return $this->datos_generalesDAO->delete($codigoEstablecimiento);
    }

    public function updateDatos_generales($datos_generales) {
        return $this->datos_generalesDAO->update($datos_generales);
    }

    public function getDatos_generalesByID($codigoEstablecimiento) {
        return $this->datos_generalesDAO->findByID($codigoEstablecimiento);
    }

    public function getDatos_generalesLikeAtrr($cadena) {
        return $this->datos_generalesDAO->findLikeAtrr($cadena);
    }

    public function getAllDetalle_comprobantes() {
        return $this->detalle_comprobanteDAO->findAll();
    }

    public function addDetalle_comprobante($detalle_comprobante) {
        return $this->detalle_comprobanteDAO->save($detalle_comprobante);
    }

    public function removeDetalle_comprobante($idRegistro) {
        return $this->detalle_comprobanteDAO->delete($idRegistro);
    }

    public function updateDetalle_comprobante($detalle_comprobante) {
        return $this->detalle_comprobanteDAO->update($detalle_comprobante);
    }

    public function getDetalle_comprobanteByID($idRegistro) {
        return $this->detalle_comprobanteDAO->findByID($idRegistro);
    }

    public function getDetalle_comprobanteLikeAtrr($cadena) {
        return $this->detalle_comprobanteDAO->findLikeAtrr($cadena);
    }

    public function getAllDocumentos() {
        return $this->documentoDAO->findAll();
    }

    public function addDocumento($documento) {
        return $this->documentoDAO->save($documento);
    }

    public function removeDocumento($idDocumento) {
        return $this->documentoDAO->delete($idDocumento);
    }

    public function updateDocumento($documento) {
        return $this->documentoDAO->update($documento);
    }

    public function getDocumentoByID($idDocumento) {
        return $this->documentoDAO->findByID($idDocumento);
    }

    public function getDocumentoLikeAtrr($cadena, $idTipoDocumento) {
        return $this->documentoDAO->findLikeAtrr($cadena, $idTipoDocumento);
    }

    public function getAllEstado_funcionarias() {
        return $this->estado_funcionariaDAO->findAll();
    }

    public function addEstado_funcionaria($estado_funcionaria) {
        return $this->estado_funcionariaDAO->save($estado_funcionaria);
    }

    public function removeEstado_funcionaria($idEstado) {
        return $this->estado_funcionariaDAO->delete($idEstado);
    }

    public function updateEstado_funcionaria($estado_funcionaria) {
        return $this->estado_funcionariaDAO->update($estado_funcionaria);
    }

    public function getEstado_funcionariaByID($idEstado) {
        return $this->estado_funcionariaDAO->findByID($idEstado);
    }

    public function getEstado_funcionariaLikeAtrr($cadena) {
        return $this->estado_funcionariaDAO->findLikeAtrr($cadena);
    }

    public function getAllFuncionarias() {
        return $this->funcionariaDAO->findAll();
    }

    public function getAllFuncionariasHabilitadas() {
        return $this->funcionariaDAO->findHabilitados();
    }

    public function getAllFuncionariasDesHabilitadas() {
        return $this->funcionariaDAO->findDesHabilitados();
    }

    public function addFuncionaria($funcionaria) {
        return $this->funcionariaDAO->save($funcionaria);
    }

    public function removeFuncionaria($runFuncionaria) {
        return $this->funcionariaDAO->delete($runFuncionaria);
    }

    public function updateFuncionaria($funcionaria) {
        return $this->funcionariaDAO->update($funcionaria);
    }

    public function getFuncionariaByID($runFuncionaria) {
        return $this->funcionariaDAO->findByID($runFuncionaria);
    }

    public function getFuncionariaLikeAtrr($cadena) {
        return $this->funcionariaDAO->findLikeAtrr($cadena);
    }

    public function getAllFuncionaria_cargos() {
        return $this->funcionaria_cargoDAO->findAll();
    }

    public function addFuncionaria_cargo($funcionaria_cargo) {
        return $this->funcionaria_cargoDAO->save($funcionaria_cargo);
    }

    public function removeFuncionaria_cargo($idCargo) {
        return $this->funcionaria_cargoDAO->delete($idCargo);
    }

    public function updateFuncionaria_cargo($funcionaria_cargo) {
        return $this->funcionaria_cargoDAO->update($funcionaria_cargo);
    }

    public function getFuncionaria_cargoByID($idCargo) {
        return $this->funcionaria_cargoDAO->findByID($idCargo);
    }

    public function cargoFuncionariaRecienteByRun($runFuncionaria) {
        return $this->funcionaria_cargoDAO->cargoRecienteByRun($runFuncionaria);
    }

    public function getFuncionaria_cargoLikeAtrr($cadena) {
        return $this->funcionaria_cargoDAO->findLikeAtrr($cadena);
    }

    public function getAllLote_productos1() {
        return $this->lote_productoDAO->findAll();
    }

    public function getAllLote_productos() {
        return $this->lote_productoDAO->findAllOrdenadosPorVencimiento();
    }

    public function getAllLote_productosBajoStock() {
        return $this->lote_productoDAO->findAllOrdenadosPorBajoStock();
    }

    public function addLote_producto($lote_producto) {
        return $this->lote_productoDAO->save($lote_producto);
    }

    public function removeLote_producto($idLote) {
        return $this->lote_productoDAO->delete($idLote);
    }

    public function updateLote_producto($lote_producto) {
        return $this->lote_productoDAO->update($lote_producto);
    }

    public function getLote_productoByID($idLote) {
        return $this->lote_productoDAO->findByID($idLote);
    }

    public function getLote_productoByIdProducto($idProducto) {
        return $this->lote_productoDAO->findByIdProducto($idProducto);
    }

    public function getLote_productoLikeAtrr($cadena) {
        return $this->lote_productoDAO->findLikeAtrr($cadena);
    }

    public function getLotesProductosRegistradosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino) {
        return $this->lote_productoDAO->lotesProductosRegistradosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
    }

    public function getAllLote_producto_usadoss() {
        return $this->lote_producto_usadosDAO->buscarProductosUsados();
    }

    public function addLote_producto_usados($lote_producto_usados) {
        return $this->lote_producto_usadosDAO->save($lote_producto_usados);
    }

    public function removeLote_producto_usados($idLote) {
        return $this->lote_producto_usadosDAO->delete($idLote);
    }

    public function updateLote_producto_usados($lote_producto_usados) {
        return $this->lote_producto_usadosDAO->update($lote_producto_usados);
    }

    public function getLote_producto_usadosByID($idLote) {
        return $this->lote_producto_usadosDAO->findByID($idLote);
    }

    public function getLote_producto_usadosLikeAtrr($cadena) {
        return $this->lote_producto_usadosDAO->findLikeAtrr($cadena);
    }

    public function getLotesProductosUsadosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino) {
        return $this->lote_producto_usadosDAO->lotesProductosUsadosPorProductoByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
    }

    public function getAllNivels() {
        return $this->nivelDAO->findAll();
    }

    public function addNivel($nivel) {
        return $this->nivelDAO->save($nivel);
    }

    public function removeNivel($idNivel) {
        return $this->nivelDAO->delete($idNivel);
    }

    public function updateNivel($nivel) {
        return $this->nivelDAO->update($nivel);
    }

    public function getNivelByID($idNivel) {
        return $this->nivelDAO->findByID($idNivel);
    }

    public function BuscaMaximoIdBien() {
        return $this->bienDAO->BuscaMaximoIdBien();
    }

    public function BuscaMaximoIdRegistro() {
        return $this->comprobanteDAO->BuscaMaximoIdRegistro();
    }

    public function BuscaMaximoIdNivelBien() {
        return $this->bien_nivelDAO->BuscaMaximoIdNivelBien();
    }

    public function getNivelLikeAtrr($cadena) {
        return $this->nivelDAO->findLikeAtrr($cadena);
    }

    public function getAllNivel_funcionarias() {
        return $this->nivel_funcionariaDAO->findAll();
    }

    public function addNivel_funcionaria($nivel_funcionaria) {
        return $this->nivel_funcionariaDAO->save($nivel_funcionaria);
    }

    public function removeNivel_funcionaria($idNivel) {
        return $this->nivel_funcionariaDAO->delete($idNivel);
    }

    public function updateNivel_funcionaria($nivel_funcionaria) {
        return $this->nivel_funcionariaDAO->update($nivel_funcionaria);
    }

    public function getNivel_funcionariaByID($idNivel) {
        return $this->nivel_funcionariaDAO->findByID($idNivel);
    }

    public function nivelFuncionariaRecienteByRun($runFuncionaria) {
        return $this->nivel_funcionariaDAO->nivelRecienteByRun($runFuncionaria);
    }

    public function getNivel_funcionariaLikeAtrr($cadena) {
        return $this->nivel_funcionariaDAO->findLikeAtrr($cadena);
    }

    public function getAllPermiso_visualizacion_categorias() {
        return $this->permiso_visualizacion_categoriaDAO->findAll();
    }

    public function addPermiso_visualizacion_categoria($permiso_visualizacion_categoria) {
        return $this->permiso_visualizacion_categoriaDAO->save($permiso_visualizacion_categoria);
    }

    public function removePermiso_visualizacion_categoria($idCargo) {
        return $this->permiso_visualizacion_categoriaDAO->delete($idCargo);
    }

    public function updatePermiso_visualizacion_categoria($permiso_visualizacion_categoria) {
        return $this->permiso_visualizacion_categoriaDAO->update($permiso_visualizacion_categoria);
    }

    public function getPermiso_visualizacion_categoriaByID($idCargo) {
        return $this->permiso_visualizacion_categoriaDAO->findByID($idCargo);
    }

    public function getPermiso_visualizacion_categoriaLikeAtrr($cadena) {
        return $this->permiso_visualizacion_categoriaDAO->findLikeAtrr($cadena);
    }

    public function getAllPermiso_visualizacion_tipo_documentos() {
        return $this->permiso_visualizacion_tipo_documentoDAO->findAll();
    }

    public function addPermiso_visualizacion_tipo_documento($permiso_visualizacion_tipo_documento) {
        return $this->permiso_visualizacion_tipo_documentoDAO->save($permiso_visualizacion_tipo_documento);
    }

    public function removePermiso_visualizacion_tipo_documento($idCargo) {
        return $this->permiso_visualizacion_tipo_documentoDAO->delete($idCargo);
    }

    public function updatePermiso_visualizacion_tipo_documento($permiso_visualizacion_tipo_documento) {
        return $this->permiso_visualizacion_tipo_documentoDAO->update($permiso_visualizacion_tipo_documento);
    }

    public function getPermiso_visualizacion_tipo_documentoByID($idCargo) {
        return $this->permiso_visualizacion_tipo_documentoDAO->findByID($idCargo);
    }

    public function getPermiso_visualizacion_tipo_documentoLikeAtrr($cadena) {
        return $this->permiso_visualizacion_tipo_documentoDAO->findLikeAtrr($cadena);
    }

    public function getAllProductos() {
        return $this->productoDAO->findAll();
    }

    public function addProducto($producto) {
        return $this->productoDAO->save($producto);
    }

    public function removeProducto($idProducto) {
        return $this->productoDAO->delete($idProducto);
    }

    public function updateProducto($producto) {
        return $this->productoDAO->update($producto);
    }

    public function getProductoByID($idProducto) {
        return $this->productoDAO->findByID($idProducto);
    }

    public function getProductoByIDCategoria($idCategoria) {
        return $this->productoDAO->findByIDCategoria($idCategoria);
    }

    public function getProductosByIdCategoria($idCategoria) {
        return $this->productoDAO->findByIiCategoria($idCategoria);
    }

    public function getProductoLikeAtrr($cadena) {
        return $this->productoDAO->findLikeAtrr($cadena);
    }

    public function getProductoByNombreIdCategoria($nombre, $idCategoria) {
        return $this->productoDAO->findByNombreAndIdCategoria($nombre, $idCategoria);
    }

    public function getProductosEnLotesRegistradosByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino) {
        return $this->productoDAO->productosEnLotesRegistradosByIdCategoriaAndFechas($idCategoria, $fechaInicio, $fechaTermino);
    }

    public function getAllTipo_documentos() {
        return $this->tipo_documentoDAO->findAll();
    }

    public function addTipo_documento($tipo_documento) {
        return $this->tipo_documentoDAO->save($tipo_documento);
    }

    public function removeTipo_documento($idTipoDocumento) {
        return $this->tipo_documentoDAO->delete($idTipoDocumento);
    }

    public function updateTipo_documento($tipo_documento) {
        return $this->tipo_documentoDAO->update($tipo_documento);
    }

    public function getTipo_documentoByID($idTipoDocumento) {
        return $this->tipo_documentoDAO->findByID($idTipoDocumento);
    }

    public function getTipo_documentoByNombre($nombre) {
        return $this->tipo_documentoDAO->findByNombre($nombre);
    }

    public function getTipo_documentoLikeAtrr($cadena) {
        return $this->tipo_documentoDAO->findLikeAtrr($cadena);
    }

}

?>
