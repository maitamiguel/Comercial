<?php
session_start();
include_once('model/suppliers.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new Suppliers();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_suppliers':
         echo $per->get_tabla();	
	break;
	case 'registrar_suppliers':
		$per->get_datos_suppliers($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_suppliers':
         $per->form_nuevo_suppliers();
	break;
	case 'modificar_suppliers':
		$per->get_datos_modificar($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_supplier':
	    $per->get_by_id_supplier($_GET['suppliersid']);
		$per->form_modificar_supplier();
	break;
	case 'eliminar_suppliers':
		 $per->get_datos_eliminar($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_suppliers':
		$per->get_by_id_supplier($_GET['suppliersid']);
		$per->form_eliminar_suppliers();

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