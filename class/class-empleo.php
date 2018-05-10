<?php

	class Empleo{

		private $codigo_empleo;
		private $nombre_empleo;
		private $descripcion_empleo;
		private $telefono_empleo;
		private $direccion_empleo;
		private $url_imagen_empleo;

		public function __construct($codigo_empleo,
					$nombre_empleo,
					$descripcion_empleo,
					$telefono_empleo,
					$direccion_empleo,
					$url_imagen_empleo){
			$this->codigo_empleo = $codigo_empleo;
			$this->nombre_empleo = $nombre_empleo;
			$this->descripcion_empleo = $descripcion_empleo;
			$this->telefono_empleo = $telefono_empleo;
			$this->direccion_empleo = $direccion_empleo;
			$this->url_imagen_empleo = $url_imagen_empleo;
		}
		public function getCodigo_empleo(){
			return $this->codigo_empleo;
		}
		public function setCodigo_empleo($codigo_empleo){
			$this->codigo_empleo = $codigo_empleo;
		}
		public function getNombre_empleo(){
			return $this->nombre_empleo;
		}
		public function setNombre_empleo($nombre_empleo){
			$this->nombre_empleo = $nombre_empleo;
		}
		public function getDescripcion_empleo(){
			return $this->descripcion_empleo;
		}
		public function setDescripcion_empleo($descripcion_empleo){
			$this->descripcion_empleo = $descripcion_empleo;
		}
		public function getTelefono_empleo(){
			return $this->telefono_empleo;
		}
		public function setTelefono_empleo($telefono_empleo){
			$this->telefono_empleo = $telefono_empleo;
		}
		public function getDireccion_empleo(){
			return $this->direccion_empleo;
		}
		public function setDireccion_empleo($direccion_empleo){
			$this->direccion_empleo = $direccion_empleo;
		}
		public function getUrl_imagen_empleo(){
			return $this->url_imagen_empleo;
		}
		public function setUrl_imagen_empleo($url_imagen_empleo){
			$this->url_imagen_empleo = $url_imagen_empleo;
		}
		public function __toString(){
			return "Codigo_empleo: " . $this->codigo_empleo . 
				" Nombre_empleo: " . $this->nombre_empleo . 
				" Descripcion_empleo: " . $this->descripcion_empleo . 
				" Telefono_empleo: " . $this->telefono_empleo . 
				" Direccion_empleo: " . $this->direccion_empleo . 
				" Url_imagen_empleo: " . $this->url_imagen_empleo;
        }
        
        public function obtenerListaEmpleos($conexion){
            $sql = "SELECT codigo_empleo, nombre_empleo, descripcion_empleo, telefono_empleo, direccion_empleo, url_imagen_empleo FROM tbl_empleos";
            $resultado = $conexion->ejecutarConsulta($sql);
			$listaEmpleos = array();
			while($fila = $conexion->obtenerFila($resultado)){
				$listaEmpleos[] = $fila;
			}
			return json_encode($listaEmpleos);
		}
		
		public function guardarEmpleo($conexion,$id){
			$sql = sprintf("INSERT INTO tbl_empleos_guardados(codigo_empleo_guardado, codigo_usuario) VALUES (%s,%s)",
			$conexion->antiInyeccion($this->codigo_empleo),
			$conexion->antiInyeccion($id));
			$resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
				$mensaje["mensaje"]="Empleo guardado exitosamente";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido guardar el empleo";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
		}

		public function obtenerListaEmpleosGuardados($conexion,$id){
			$sql = sprintf("SELECT a.codigo_empleo_guardado, a.codigo_usuario, b.nombre_empleo, b.descripcion_empleo, b.telefono_empleo, b.direccion_empleo, b.url_imagen_empleo 
			FROM tbl_empleos_guardados a
			INNER JOIN tbl_empleos b
			ON (a.codigo_empleo_guardado = b.codigo_empleo)
			WHERE a.codigo_usuario = %s",
			$conexion->antiInyeccion($id));
			$resultado = $conexion->ejecutarConsulta($sql);
			$listaEmpleosGuardados = array();
			while($fila = $conexion->obtenerFila($resultado)){
				$listaEmpleosGuardados[] = $fila;
			}
			return json_encode($listaEmpleosGuardados);
		}
	}
?>