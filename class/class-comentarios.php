<?php

	class Comentario{

		private $codigo_comentario;
		private $codigo_usuario;
		private $codigo_publicacion;
		private $fecha_comentario;
		private $contenido_comentario;

		public function __construct($codigo_comentario,
					$codigo_usuario,
					$codigo_publicacion,
					$fecha_comentario,
					$contenido_comentario){
			$this->codigo_comentario = $codigo_comentario;
			$this->codigo_usuario = $codigo_usuario;
			$this->codigo_publicacion = $codigo_publicacion;
			$this->fecha_comentario = $fecha_comentario;
			$this->contenido_comentario = $contenido_comentario;
		}
		public function getCodigo_comentario(){
			return $this->codigo_comentario;
		}
		public function setCodigo_comentario($codigo_comentario){
			$this->codigo_comentario = $codigo_comentario;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getCodigo_publicacion(){
			return $this->codigo_publicacion;
		}
		public function setCodigo_publicacion($codigo_publicacion){
			$this->codigo_publicacion = $codigo_publicacion;
		}
		public function getFecha_comentario(){
			return $this->fecha_comentario;
		}
		public function setFecha_comentario($fecha_comentario){
			$this->fecha_comentario = $fecha_comentario;
		}
		public function getContenido_comentario(){
			return $this->contenido_comentario;
		}
		public function setContenido_comentario($contenido_comentario){
			$this->contenido_comentario = $contenido_comentario;
		}
		public function __toString(){
			return "Codigo_comentario: " . $this->codigo_comentario . 
				" Codigo_usuario: " . $this->codigo_usuario . 
				" Codigo_publicacion: " . $this->codigo_publicacion . 
				" Fecha_comentario: " . $this->fecha_comentario . 
				" Contenido_comentario: " . $this->contenido_comentario;
		}

		public function insertarComentario($conexion){
			$sql = sprintf("INSERT INTO tbl_comentarios(codigo_usuario, codigo_publicacion, fecha_comentario, contenido_comentario) VALUES (%s,%s,now(),'%s')",
		$conexion->antiInyeccion($this->codigo_usuario),
		$conexion->antiInyeccion($this->codigo_publicacion),
		$conexion->antiInyeccion($this->contenido_comentario));
		$resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
				$mensaje["mensaje"]="Comentario guardado exitosamente";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido guardar el Comentario";
				$mensaje["sql"]=$sql;
				return json_encode($mensaje);
			}
		}

		public function visualizarComentarios($conexion){
			$sql = sprintf("SELECT a.codigo_comentario, a.codigo_usuario, a.codigo_publicacion, a.fecha_comentario, a.contenido_comentario, b.url_imagen_perfil, b.nombre_usuario, b.apellido_usuario 
			FROM tbl_comentarios a
			INNER JOIN tbl_usuarios b
			INNER JOIN tbl_publicaciones c
			ON (a.codigo_usuario = b.codigo_usuario)
			WHERE a.codigo_usuario = %s
			or a.codigo_usuario in (
			select codigo_usuario_amigo from tbl_amigos
			where codigo_usuario = %s) 
			on (a.codigo_publicacion = c.codigo_publicacion)
			where codigo_publicacion=%s
			ORDER BY a.fecha_comentario DESC",
			$conexion->antiInyeccion($this->codigo_usuario),
			$conexion->antiInyeccion($this->codigo_usuario),
			$conexion->antiInyeccion($this->codigo_empleo));
			$resultado = $conexion->ejecutarConsulta($sql);
			$listaComentarios = array();
			while($fila = $conexion->obtenerFila($resultado)){
				$listaComentarios[] = $fila;
			}
			return json_encode($listaComentarios);
		}
	}
?>