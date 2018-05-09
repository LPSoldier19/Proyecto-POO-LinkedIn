<?php

	class Usuario{

		private $codigo_usuario;
		private $codigo_genero;
		private $nombre_usuario;
		private $apellido_usuario;
		private $correo;
		private $contrasena;
		private $url_imagen_perfil;
		private $titular;
		private $educacion;
		private $logros;

		public function __construct($codigo_usuario,
					$codigo_genero,
					$nombre_usuario,
					$apellido_usuario,
					$correo,
					$contrasena,
					$url_imagen_perfil,
					$titular,
					$educacion,
					$logros){
			$this->codigo_usuario = $codigo_usuario;
			$this->codigo_genero = $codigo_genero;
			$this->nombre_usuario = $nombre_usuario;
			$this->apellido_usuario = $apellido_usuario;
			$this->correo = $correo;
			$this->contrasena = $contrasena;
			$this->url_imagen_perfil = $url_imagen_perfil;
			$this->titular = $titular;
			$this->educacion = $educacion;
			$this->logros = $logros;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getCodigo_genero(){
			return $this->codigo_genero;
		}
		public function setCodigo_genero($codigo_genero){
			$this->codigo_genero = $codigo_genero;
		}
		public function getNombre_usuario(){
			return $this->nombre_usuario;
		}
		public function setNombre_usuario($nombre_usuario){
			$this->nombre_usuario = $nombre_usuario;
		}
		public function getApellido_usuario(){
			return $this->apellido_usuario;
		}
		public function setApellido_usuario($apellido_usuario){
			$this->apellido_usuario = $apellido_usuario;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		public function getUrl_imagen_perfil(){
			return $this->url_imagen_perfil;
		}
		public function setUrl_imagen_perfil($url_imagen_perfil){
			$this->url_imagen_perfil = $url_imagen_perfil;
		}
		public function getTitular(){
			return $this->titular;
		}
		public function setTitular($titular){
			$this->titular = $titular;
		}
		public function getEducacion(){
			return $this->educacion;
		}
		public function setEducacion($educacion){
			$this->educacion = $educacion;
		}
		public function getLogros(){
			return $this->logros;
		}
		public function setLogros($logros){
			$this->logros = $logros;
		}
		public function __toString(){
			return "Codigo_usuario: " . $this->codigo_usuario . 
				" Codigo_genero: " . $this->codigo_genero . 
				" Nombre_usuario: " . $this->nombre_usuario . 
				" Apellido_usuario: " . $this->apellido_usuario . 
				" Correo: " . $this->correo . 
				" Contrasena: " . $this->contrasena . 
				" Url_imagen_perfil: " . $this->url_imagen_perfil . 
				" Titular: " . $this->titular . 
				" Educacion: " . $this->educacion . 
				" Logros: " . $this->logros;
        }
        
        public function insertarUsuario($conexion){
            $sql = sprintf("INSERT INTO tbl_usuarios(codigo_genero, nombre_usuario, apellido_usuario, correo, contrasena, url_imagen_perfil, titular, educacion, logros) 
            VALUES (%s,'%s','%s','%s',sha1('%s'),null,null,null,null)",
            $conexion->antiInyeccion($this->codigo_genero),
            $conexion->antiInyeccion($this->nombre_usuario),
            $conexion->antiInyeccion($this->apellido_usuario),
            $conexion->antiInyeccion($this->correo),
            $conexion->antiInyeccion($this->contrasena));
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
				$mensaje["mensaje"]="Usuario registrado exitosamente";
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido registrar al usuario";
				return json_encode($mensaje);
			}
		}

		public function actualizarInfoUsuario($conexion){
			$sql = sprintf("UPDATE tbl_usuarios SET url_imagen_perfil='%s',titular='%s',educacion='%s',logros='%s' where codigo_usuario = %s",
			$conexion->antiInyeccion($this->url_imagen_perfil),
			$conexion->antiInyeccion($this->titular),
			$conexion->antiInyeccion($this->educacion),
			$conexion->antiInyeccion($this->logros),
			$conexion->antiInyeccion($this->codigo_usuario));
			$resultado = $conexion->ejecutarConsulta($sql);
			if($resultado){
				$mensaje["mensaje"]="Usuario actualizado exitosamente";
				return json_encode($mensaje);
			}
			else{
				$mensaje["mensaje"]="No se ha podido actualizar la informacion";
				return json_encode($mensaje);
			}
		}

		public function listaUsuarios($conexion){
			$sql = sprintf("SELECT codigo_usuario, codigo_genero, nombre_usuario, apellido_usuario, correo, contrasena, url_imagen_perfil, titular, educacion, logros FROM tbl_usuarios WHERE codigo_usuario != %s",
			$conexion->antiInyeccion($this->codigo_usuario));
			$resultado = $conexion->ejecutarConsulta($sql);
			$listaUsuarios = array();
			while($fila = $conexion->obtenerFila($resultado)){
				$listaUsuarios[] = $fila;
			}
			return json_encode($listaUsuarios);
		}
		
		
	}
?>