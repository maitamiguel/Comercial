<?php
session_start();
include_once('model/customers.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new customers();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_cliente':
         echo $per->get_tabla();	
	break;
	case 'registrar_customer':
		$per->get_datos_customer($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_customer':
         $per->form_nuevo_customer();
	break;
	case 'modificar_customer':
		$per->get_datos_modificar_customer($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_customer':
	    $per->get_by_customer_id($_GET['customerid']);
		$per->form_modificar_customer();
	break;
	case 'eliminar_customer':
		 $per->get_datos_eliminar_customer($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_customer':
		$per->get_by_customer_id($_GET['customerid']);
		$per->form_eliminar_customer();

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