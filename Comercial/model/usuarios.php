<?php
require_once('DBAbstract.php');
class Usuarios extends DBAbstract
{

	private $id_usuario;
	private $nombre;
	private $password;
	private $rol;


	public function __construct(){

		$this->id_usuario=0;
		$this->nombre='';
		$this->password='';        
       
	}

	public function __destruct(){}

	public function get_id_usuario(){

		return $this->id_usuario;
	}
	public function set_id_usuario($id_usuario){

		$this->id_usuario=$id_usuario;
	}
	public function get_rol(){

		return $this->rol;
	}
	public function set_rol($rol){

		$this->rol=$rol;
	}

	public function get_nombre(){

		return $this->nombre;
	}
	public function set_nombre($nom){

		$this->nombre=$nom;
	}

	public function get_password(){
		return $this->password;
	}
	public function set_password($pass){
		$this->password=$pass;
	}
	
    public function get_validar_usuario($nom,$pass){
		$sql="SELECT nombre,password
                    from usuarios
                    where nombre='$nom' AND password='$pass'";


	$res=false;
	$result=$this->get_results_from_query2($sql);
	while ($filas = $result->fetch_assoc()){

        $res=true;
    }
	return $res;

}
public function get_by_name_pass($nombre='',$pass='') {
	if($nombre != ''):
		
		$this->query = "select * from usuarios
		where nombre ='$nombre' and password ='$pass'";
		$this->get_results_from_query();
	endif;
	if(count($this->rows) == 1):
		foreach ($this->rows[0] as $propiedad=>$valor):
		$this->$propiedad = $valor;
		endforeach;
	endif;
}

		

}//fin de class



?>