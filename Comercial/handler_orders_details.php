<?php
session_start();
include_once('model/order_details.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new order_details();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_order':
         echo $per->get_tabla();	
	break;
	case 'registrar_order':
		$per->get_datos_order($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_order':
         $per->form_nuevo_order();
	break;
	case 'modificar_order':
		$per->get_datos_modificar_order($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_order':
	    $per->get_by_orderda_id($_GET['orderid']);
		$per->form_modificar_order();
	break;
	case 'eliminar_order':
		 $per->get_datos_eliminar_order($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_order':
		$per->get_by_orderda_id($_GET['orderid']);
		$per->form_eliminar_order();

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