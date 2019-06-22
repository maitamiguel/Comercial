<?php
session_start();
include_once('model/employees.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new employees();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_employee':
         echo $per->get_tabla();	
	break;
	case 'registrar_employee':
		$per->get_datos_employee($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_employee':
         $per->form_nuevo_employee();
	break;
	case 'modificar_employee':
		$per->get_datos_modificar_employee($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_employee':
	    $per->get_by_employee_id($_GET['employeeid']);
		$per->form_modificar_employee();
	break;
	case 'eliminar_employee':
		 $per->get_datos_eliminar_employee($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_employee':
		$per->get_by_employee_id($_GET['employeeid']);
		$per->form_eliminar_employee();

	break;
	case 'exportar_pdf':
		$per->exportar_pdf();
	break;
	case 'exportar_excel':
		$per->exportar_excel();
	break;
	case 'exportar_word':
		$per->exportar_word();
	break;
	case 'buscar_per':

		break;
}

//$template->foot();

}
function helper_pag_data() {
    $pag_data=$_GET['pag'];
    return $pag_data;
    }

handler();

?>