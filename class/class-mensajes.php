<?php

	class Mensaje{

		private $codigo_mensaje;
		private $codigo_usuario;
		private $contenido_mensaje;
		private $fecha_mensaje;

		public function __construct($codigo_mensaje,
					$codigo_usuario,
					$contenido_mensaje,
					$fecha_mensaje){
			$this->codigo_mensaje = $codigo_mensaje;
			$this->codigo_usuario = $codigo_usuario;
			$this->contenido_mensaje = $contenido_mensaje;
			$this->fecha_mensaje = $fecha_mensaje;
		}
		public function getCodigo_mensaje(){
			return $this->codigo_mensaje;
		}
		public function setCodigo_mensaje($codigo_mensaje){
			$this->codigo_mensaje = $codigo_mensaje;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getContenido_mensaje(){
			return $this->contenido_mensaje;
		}
		public function setContenido_mensaje($contenido_mensaje){
			$this->contenido_mensaje = $contenido_mensaje;
		}
		public function getFecha_mensaje(){
			return $this->fecha_mensaje;
		}
		public function setFecha_mensaje($fecha_mensaje){
			$this->fecha_mensaje = $fecha_mensaje;
		}
		public function __toString(){
			return "Codigo_mensaje: " . $this->codigo_mensaje . 
				" Codigo_usuario: " . $this->codigo_usuario . 
				" Contenido_mensaje: " . $this->contenido_mensaje . 
				" Fecha_mensaje: " . $this->fecha_mensaje;
        }
        
        public function insertarMensaje($conexion){
            $sql =sprintf("INSERT INTO tbl_mensajes(codigo_usuario, contenido_mensaje, fecha_mensaje) VALUES (%s,'%s',now())",
            $conexion->antiInyeccion($this->codigo_usuario),
            $conexion->antiInyeccion($this->contenido_mensaje));
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
				$mensaje["mensaje"]="Mensaje enviado exitosamente";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido enviar el mensaje";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
        }
	}
?>