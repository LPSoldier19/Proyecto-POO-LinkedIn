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
	}
?>