<?php
session_start();
include_once('model/category.php');
include_once('model/Templete.php');

function handler() {
$pag= helper_pag_data();
$per = new categoria();

$template = new Template();
$template->head();
switch ($pag) {
	case 'listar_categoria':
         echo $per->get_tabla();	
	break;
	case 'registrar_category':
		$per->get_datos_category($_POST);
		echo $per->get_tabla();
	break;
	case 'form_nuevo_category':
         $per->form_nuevo_category();
	break;
	case 'modificar_category':
		$per->get_datos_modificar_category($_POST);
		echo $per->get_tabla();
	break;
	case 'form_modificar_category':
	    $per->get_by_category_id($_GET['categoryid']);
		$per->form_modificar_category();
	break;
	case 'eliminar_category':
		 $per->get_datos_eliminar_category($_POST);
		echo $per->get_tabla();


	break;
	case 'form_eliminar_category':
		$per->get_by_category_id($_GET['categoryid']);
		$per->form_eliminar_category();

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