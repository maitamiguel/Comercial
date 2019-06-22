<?php
session_start();
include_once('model/products.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new productos();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_productos':
         echo $per->get_tabla();	
	break;
	case 'registrar_products':
		$per->get_datos_products($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_products':
         $per->form_nuevo_products();
	break;
	case 'modificar_products':
		$per->get_datos_modificar_products($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_products':
	    $per->get_by_product_id($_GET['productid']);
		$per->form_modificar_products();
	break;
	case 'eliminar_products':
		 $per->get_datos_eliminar_products($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_products':
		$per->get_by_product_id($_GET['productid']);
		$per->form_eliminar_products();

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