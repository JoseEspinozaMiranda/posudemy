<?php
class AdminModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getDatos()
    {
        $sql = "SELECT * FROM configuracion";
        return $this->select($sql);
    }
    public function actualizar($ruc, $nombre, $telefono, $correo,
    $direccion, $impuesto, $mensaje, $id)
    {
        $sql = "UPDATE configuracion SET ruc=?, nombre=?, telefono=?, correo=?,
        direccion=?, impuesto=?, mensaje=? WHERE id=?";
        $array = array($ruc, $nombre, $telefono, $correo,
        $direccion, $impuesto, $mensaje, $id);
        return $this->save($sql, $array);
    }

    public function getTotales($table)
    {
        $sql = "SELECT COUNT(*) AS total FROM $table WHERE estado = 1";
        return $this->select($sql);
    }

    public function calcularVentasCompras($table, $desde, $hasta, $id_usuario)
    {
        $sql = "SELECT SUM(IF(MONTH(fecha) = 1, total, 0)) AS enero,
        SUM(IF(MONTH(fecha) = 2, total, 0)) AS febrero,
        SUM(IF(MONTH(fecha) = 3, total, 0)) AS marzo,
        SUM(IF(MONTH(fecha) = 4, total, 0)) AS abril,
        SUM(IF(MONTH(fecha) = 5, total, 0)) AS mayo,
        SUM(IF(MONTH(fecha) = 6, total, 0)) AS junio,
        SUM(IF(MONTH(fecha) = 7, total, 0)) AS julio,
        SUM(IF(MONTH(fecha) = 8, total, 0)) AS agosto,
        SUM(IF(MONTH(fecha) = 9, total, 0)) AS setiembre,
        SUM(IF(MONTH(fecha) = 10, total, 0)) AS octubre,
        SUM(IF(MONTH(fecha) = 11, total, 0)) AS noviembre,
        SUM(IF(MONTH(fecha) = 12, total, 0)) AS diciembre
        FROM $table WHERE fecha BETWEEN '$desde' AND '$hasta' AND id_usuario = $id_usuario";
        return $this->select($sql);
    }

    public function totalVentasCompras($table, $desde, $hasta, $id_usuario)
    {
        $sql = "SELECT COUNT(*) AS total FROM $table WHERE fecha BETWEEN '$desde' AND '$hasta' AND estado = 1 AND id_usuario = $id_usuario";
        return $this->select($sql);
    }

    public function topProductos($cantidad)
    {
        $sql = "SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id ORDER BY p.id DESC LIMIT $cantidad";
        return $this->selectAll($sql);
    }
    
    public function nuevosProductos($cantidad)
    {
        $sql = "SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id ORDER BY p.id DESC LIMIT $cantidad";
        return $this->selectAll($sql);
    }

    public function calcularGastos($desde, $hasta, $id_usuario)
    {
        $sql = "SELECT SUM(IF(MONTH(fecha) = 1, monto, 0)) AS enero,
        SUM(IF(MONTH(fecha) = 2, monto, 0)) AS febrero,
        SUM(IF(MONTH(fecha) = 3, monto, 0)) AS marzo,
        SUM(IF(MONTH(fecha) = 4, monto, 0)) AS abril,
        SUM(IF(MONTH(fecha) = 5, monto, 0)) AS mayo,
        SUM(IF(MONTH(fecha) = 6, monto, 0)) AS junio,
        SUM(IF(MONTH(fecha) = 7, monto, 0)) AS julio,
        SUM(IF(MONTH(fecha) = 8, monto, 0)) AS agosto,
        SUM(IF(MONTH(fecha) = 9, monto, 0)) AS setiembre,
        SUM(IF(MONTH(fecha) = 10, monto, 0)) AS octubre,
        SUM(IF(MONTH(fecha) = 11, monto, 0)) AS noviembre,
        SUM(IF(MONTH(fecha) = 12, monto, 0)) AS diciembre
        FROM gastos WHERE fecha BETWEEN '$desde' AND '$hasta' AND id_usuario = $id_usuario";
        return $this->select($sql);
    }

    public function minimosProductos()
    {
        $sql = "SELECT descripcion, cantidad FROM productos WHERE cantidad < 15 LIMIT 4";
        return $this->selectAll($sql);
    }
    
    // REPORTE PDF
    public function minimosProductosPDF()
    {
        $sql = "SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.cantidad < 15";
        return $this->selectAll($sql);
    }

    public function getEmpresa()
    {
        $sql = "SELECT * FROM configuracion";
        return $this->select($sql);
    }

    public function listarLogs()
    {
        $sql = "SELECT * FROM acceso";
        return $this->selectAll($sql);
    }

    public function limpiarDatos()
    {
        $sql = "TRUNCATE acceso";
        return $this->select($sql);
    }
}
?>