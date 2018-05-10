<?php

	class Chat{

		private $codigo_chat;
		private $codigo_usuario_amigo;
		private $codigo_usuario;

		public function __construct($codigo_chat,
					$codigo_usuario_amigo,
					$codigo_usuario){
			$this->codigo_chat = $codigo_chat;
			$this->codigo_usuario_amigo = $codigo_usuario_amigo;
			$this->codigo_usuario = $codigo_usuario;
		}
		public function getCodigo_chat(){
			return $this->codigo_chat;
		}
		public function setCodigo_chat($codigo_chat){
			$this->codigo_chat = $codigo_chat;
		}
		public function getCodigo_usuario_amigo(){
			return $this->codigo_usuario_amigo;
		}
		public function setCodigo_usuario_amigo($codigo_usuario_amigo){
			$this->codigo_usuario_amigo = $codigo_usuario_amigo;
		}
		public function getCodigo_usuario(){
			return $this->codigo_usuario;
		}
		public function setCodigo_usuario($codigo_usuario){
			$this->codigo_usuario = $codigo_usuario;
		}
		public function __toString(){
			return "Codigo_chat: " . $this->codigo_chat . 
				" Codigo_usuario_amigo: " . $this->codigo_usuario_amigo . 
				" Codigo_usuario: " . $this->codigo_usuario;
        }
        
		public function listaChat($conexion){
			$sql =sprintf("SELECT a.codigo_chat, a.codigo_usuario_amigo, a.codigo_usuario, b.nombre_usuario, b.apellido_usuario, b.url_imagen_perfil
			FROM tbl_chats 
			inner join tbl_usuarios b	
			ON(a.codigo_usuario = b.codigo_usuario)
			WHERE a.codigo_usuario = %s",
			$conexion->antiInyeccion($this->codigo_usuario));
			$resultado = $conexion->ejecutarConsulta($sql);
			$listaChats = array();
			while($fila = $conexion->obtenerFila($resultado)){
				$listaChats[] = $fila;
			}
			return json_encode($listaChats);
		}
	}
?>