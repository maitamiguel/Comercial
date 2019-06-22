<?php
session_start();
include_once('model/orders.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new ordenes();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_orden':
         echo $per->get_tabla();	
	break;
	case 'registrar_orders':
		$per->get_datos_orders($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_orders':
         $per->form_nuevo_orders();
	break;
	case 'modificar_orders':
		$per->get_datos_modificar_orders($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_orders':
	    $per->get_by_order_id($_GET['orderid']);
		$per->form_modificar_orders();
	break;
	case 'eliminar_orders':
		 $per->get_datos_eliminar_orders($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_orders':
		$per->get_by_order_id($_GET['orderid']);
		$per->form_eliminar_orders();

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