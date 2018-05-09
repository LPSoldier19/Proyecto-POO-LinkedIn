<?php

	class Publicacion{

		private $codigo_publicacion;
		private $codigo_usuario;
		private $contenido_publicacion;
		private $numero_likes;
		private $fecha_publicacion;
		private $ubicacion;

		public function __construct($codigo_publicacion,
					$codigo_usuario,
					$contenido_publicacion,
					$numero_likes,
					$fecha_publicacion,
					$ubicacion){
			$this->codigo_publicacion = $codigo_publicacion;
			$this->codigo_usuario = $codigo_usuario;
			$this->contenido_publicacion = $contenido_publicacion;
			$this->numero_likes = $numero_likes;
			$this->fecha_publicacion = $fecha_publicacion;
			$this->ubicacion = $ubicacion;
		}
		public function getCodigo_publicacion(){
			return $this->codigo_publicacion;
		}
		public function setCodigo_publicacion($codigo_publicacion){
			$this->codigo_publicacion = $codigo_publicacion;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getContenido_publicacion(){
			return $this->contenido_publicacion;
		}
		public function setContenido_publicacion($contenido_publicacion){
			$this->contenido_publicacion = $contenido_publicacion;
		}
		public function getNumero_likes(){
			return $this->numero_likes;
		}
		public function setNumero_likes($numero_likes){
			$this->numero_likes = $numero_likes;
		}
		public function getFecha_publicacion(){
			return $this->fecha_publicacion;
		}
		public function setFecha_publicacion($fecha_publicacion){
			$this->fecha_publicacion = $fecha_publicacion;
		}
		public function getUbicacion(){
			return $this->ubicacion;
		}
		public function setUbicacion($ubicacion){
			$this->ubicacion = $ubicacion;
		}
		public function __toString(){
			return "Codigo_publicacion: " . $this->codigo_publicacion . 
				" Codigo_usuario: " . $this->codigo_usuario . 
				" Contenido_publicacion: " . $this->contenido_publicacion . 
				" Numero_likes: " . $this->numero_likes . 
				" Fecha_publicacion: " . $this->fecha_publicacion . 
				" Ubicacion: " . $this->ubicacion;
        }
        
        public function insertarPublicacion($conexion){
            $sql = sprintf("INSERT INTO tbl_publicaciones(codigo_usuario, contenido_publicacion,fecha_publicacion, ubicacion) VALUES (%s,'%s',now(),'%s')",
            $conexion->antiInyeccion($this->codigo_usuario),
            $conexion->antiInyeccion($this->contenido_publicacion),
            $conexion->antiInyeccion($this->ubicacion));
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
				$mensaje["mensaje"]="Publicacion realizada exitosamente";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido realizar la publicacion";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
		}
		
		public function visualizarPublicaciones($conexion){
			$sql = sprintf("SELECT a.codigo_publicacion, b.nombre_usuario, b.apellido_usuario, b.url_imagen_perfil, b.titular,
            a.codigo_usuario, a.contenido_publicacion, a.numero_likes, a.fecha_publicacion, a.ubicacion
           FROM tbl_publicaciones a
           INNER JOIN tbl_usuarios b
           ON (a.codigo_usuario = b.codigo_usuario)
           WHERE a.codigo_usuario = %s
           OR a.codigo_usuario in (
        	select codigo_usuario_amigo from tbl_amigos
			where codigo_usuario = %s);",
			$conexion->antiInyeccion($this->codigo_usuario),
			$conexion->antiInyeccion($this->codigo_usuario));
			$resultado = $conexion->ejecutarConsulta($sql);
			$listaPublicaciones = array();
			while($fila = $conexion->obtenerFila($resultado)){
				$listaPublicaciones[] = $fila;
			}
			return json_encode($listaPublicaciones);
		}
	}
?>