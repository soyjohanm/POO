<?php
  class conectarBaseDatos {
    function __construct() {
      $BD_Configuracion = require_once './archivos/configuracion/basedatos.php';
      $this->controlador=$BD_Configuracion["BD_Controlador"];
      $this->servidor=$BD_Configuracion["BD_Servidor"];
      $this->usuario=$BD_Configuracion["BD_Usuario"];
      $this->clave=$BD_Configuracion["BD_Clave"];
      $this->nombre=$BD_Configuracion["BD_Nombre"];
      $this->caracter=$BD_Configuracion["BD_Caracter"];
    }
    public function conexion(){
      try {
        //TIPO DE GESTOR DE BASE DE DATOS
        $controlador = $this->controlador;
        //DATOS DE BASE DE DATOS
        $bd_nombre = $this->nombre;
        $bd_usuario = $this->usuario;
        $bd_clave = $this->clave;
        $bd_host = $this->servidor;
        //CONEXIÓN CON BASE DE DATOS
        $conexion = new PDO("$controlador:host=$bd_host; dbname=$bd_nombre", $bd_usuario, $bd_clave);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
  }
?>
