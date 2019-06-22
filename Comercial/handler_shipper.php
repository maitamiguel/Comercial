<?php
session_start();
include_once('model/shippers.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new shippers();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_cargador':
         echo $per->get_tabla();	
	break;
	case 'registrar_shipper':
		$per->get_datos_shipper($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_shipper':
         $per->form_nuevo_shipper();
	break;
	case 'modificar_shipper':
		$per->get_datos_modificar_shipper($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_shipper':
	    $per->get_by_shipper_id($_GET['shipperid']);
		$per->form_modificar_shipper();
	break;
	case 'eliminar_shipper':
		 $per->get_datos_eliminar_shipper($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_shipper':
		$per->get_by_shipper_id($_GET['shipperid']);
		$per->form_eliminar_shipper();

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