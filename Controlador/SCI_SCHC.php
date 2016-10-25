<?php

include_once 'Mantenedores/BajaDAO.php';
include_once 'Mantenedores/BienDAO.php';
include_once 'Mantenedores/Bien_nivelDAO.php';
include_once 'Mantenedores/CargoDAO.php';
include_once 'Mantenedores/CategoriaDAO.php';
include_once 'Mantenedores/ComprobanteDAO.php';
include_once 'Mantenedores/Detalle_comprobanteDAO.php';
include_once 'Mantenedores/FuncionariaDAO.php';
include_once 'Mantenedores/Funcionaria_cargoDAO.php';
include_once 'Mantenedores/Lote_productoDAO.php';
include_once 'Mantenedores/Lote_producto_usadosDAO.php';
include_once 'Mantenedores/NivelDAO.php';
include_once 'Mantenedores/Nivel_funcionariaDAO.php';
include_once 'Mantenedores/ProductoDAO.php';

class SCI_SCHC {
    private static $instancia = NULL;
    private $bajaDAO;
    private $bienDAO;
    private $bien_nivelDAO;
    private $cargoDAO;
    private $categoriaDAO;
    private $comprobanteDAO;
    private $detalle_comprobanteDAO;
    private $funcionariaDAO;
    private $funcionaria_cargoDAO;
    private $lote_productoDAO;
    private $lote_producto_usadosDAO;
    private $nivelDAO;
    private $nivel_funcionariaDAO;
    private $productoDAO;

    public function SCI_SCHC() {
        $this->bajaDAO = new BajaDAO();
        $this->bienDAO = new BienDAO();
        $this->bien_nivelDAO = new Bien_nivelDAO();
        $this->cargoDAO = new CargoDAO();
        $this->categoriaDAO = new CategoriaDAO();
        $this->comprobanteDAO = new ComprobanteDAO();
        $this->detalle_comprobanteDAO = new Detalle_comprobanteDAO();
        $this->funcionariaDAO = new FuncionariaDAO();
        $this->funcionaria_cargoDAO = new Funcionaria_cargoDAO();
        $this->lote_productoDAO = new Lote_productoDAO();
        $this->lote_producto_usadosDAO = new Lote_producto_usadosDAO();
        $this->nivelDAO = new NivelDAO();
        $this->nivel_funcionariaDAO = new Nivel_funcionariaDAO();
        $this->productoDAO = new ProductoDAO();
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
    
    public function getBienesByIdCategoria($idCategoria){
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

    public function getBien_nivelByID($idBien) {
        return $this->bien_nivelDAO->findByID($idBien);
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

    public function cargoFuncionariaRecienteByRun($runFuncionaria){
        return $this->funcionaria_cargoDAO->cargoRecienteByRun($runFuncionaria);
    }


    public function getFuncionaria_cargoLikeAtrr($cadena) {
        return $this->funcionaria_cargoDAO->findLikeAtrr($cadena);
    }

    public function getAllLote_productos() {
        return $this->lote_productoDAO->findAll();
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

    public function getLote_productoLikeAtrr($cadena) {
        return $this->lote_productoDAO->findLikeAtrr($cadena);
    }

    public function getAllLote_producto_usadoss() {
        return $this->lote_producto_usadosDAO->findAll();
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
    
    public function nivelFuncionariaRecienteByRun($runFuncionaria){
        return $this->nivel_funcionariaDAO->nivelRecienteByRun($runFuncionaria);
    }

    public function getNivel_funcionariaLikeAtrr($cadena) {
        return $this->nivel_funcionariaDAO->findLikeAtrr($cadena);
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
    
    public function getProductosByIdCategoria($idCategoria){
        return $this->productoDAO->findByIiCategoria($idCategoria);
    }

    public function getProductoLikeAtrr($cadena) {
        return $this->productoDAO->findLikeAtrr($cadena);
    }

}
?>