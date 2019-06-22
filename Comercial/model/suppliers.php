<?php
require_once('DBAbstract.php');
class Suppliers extends DBAbstract
{
    private $supplier_id;
    private $companyname;
    private $contacttitle;
    private $addres;
    private $city;
    private $region ;
    private $postalcode;
    private $country;
    private $phone;
    private $fax;
    private $homepage;

    public function __construct()
    {
        $this->supplier_id=0;
        $this->companyname='';
        $this->contacttitle='';
        $this->addres='';
        $this->city='';
        $this->region='';
        $this->postalcode='';
        $this->country='';
        $this->phone=0;
        $this->fax=0;
        $this->homepage='';
    }

    public function get_supplier_id(){
        return $this->supplier_id;
    }
    public function set_supplier_id($supplier_id){
        $this->supplier_id=$supplier_id;
    }

    public function get_companyname(){
        return $this->companyname;
    }
    public function set_companyname($companyname){
        $this->companyname=$companyname;
    }

    public function get_contacttitle(){
        return $this->contacttitle;
    }
    public function set_contacttitle($contacttitle){
        $this->contacttitle=$contacttitle;
    }
    public function get_addres(){
        return $this->addres;
    }
    public function set_addres($addres){
        $this->addres=$addres;
    }
    public function get_city(){
        return $this->city;
    }
    public function set_city($city){
        $this->city=$city;
    }
    public function get_region(){
        return $this->region;
    }
    public function set_region($region){
        $this->region=$region;
    }
    public function get_postalcode()
    {
        return $this->postalcode;
    }
    public function set_postalcode($postalcode){
        $this->postalcode=$postalcode;
    }

    public function get_country(){
        return $this->country;
    }
    public function set_country($country){
        $this->country=$country;
    }
    public function get_phone(){
        return $this->phone;
    }
    public function set_phone($phone){
        $this->phone=$phone;
    }
    public function get_fax(){
        return $this->fax;
    }
    public function set_fax($fax){
        $this->fax=$fax;
    }
    public function get_homepage(){
        return $this->homepage;
    }
    public function set_homepage($homepage){
        $this->homepage=$homepage;
    }
    public function get_by_id_supplier($supplier_id=''){
        if($supplier_id!=''):
            $this->query="SELECT suppliersid,companyname,contacttitle,addres,
            city,region,postalcode,
            country,phone,fax,homepage
        FROM suppliers
        WHERE suppliersid='$supplier_id';";
        $this->get_results_from_query();
        endif;
        if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif; 
    }
    public function insert(){
        $this->query="insert into suppliers
        (companyname,contacttitle,addres,
        city,region,postalcode,
        country,phone,fax,homepage)
        values
        ('$this->companyname','$this->contacttitle','$this->addres','$this->city','$this->region','$this->postalcode','$this->country','$this->phone','$this->fax','$this->homepage');";
        $this->execute_single_query();
    }
    public function get_datos_suppliers($_P){
        $this->companyname=$_P['companyname'];
        $this->contacttitle=$_P['contacttitle'];
        $this->addres=$_P['addres'];
        $this->city=$_P['city'];
        $this->region=$_P['region'];
        $this->postalcode=$_P['postalcode'];
        $this->country=$_P['country'];
        $this->phone=$_P['phone'];
        $this->fax=$_P['fax'];
        $this->homepage=$_P['homepage'];

        $this->insert();
    }
    public function form_nuevo_suppliers(){

        $form="
    <div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
    <form name='registrar_suppliers' 
    action='handler_suppliers.php?pag=registrar_suppliers'
      method='POST'>
		<fieldset>
		
    <legend>Registrar Proveedoras</legend>

            <div>
                <label for='supli'>Compania</label>
                <input type='text' class='form-control' id='companyname' name='companyname' 
                    required autofocus 
                        placeholder='ingrese Nombre Compania' /> 
            </div>
            <div>
                <label for='supli'>Titulo de Contacto</label>
                <input type='text' class='form-control' id='contacttitle' name='contacttitle' 
                    required autofocus 
                        placeholder='ingrese Titulo de Contacto' /> 
            </div>
            <div>
                <label for='supli'>Direccion</label>
                <input type='text' class='form-control' id='addres' name='addres' 
                    required autofocus 
                        placeholder='ingrese Direccion' /> 
            </div>
            <div>
                <label for='supli'>Ciudad</label>
                <input type='text' class='form-control' id='city' name='city' 
                    required autofocus 
                        placeholder='ingrese Ciudad' /> 
            </div>

            <div>
                <label for='supli'>Region</label>
                <input type='text' class='form-control' id='region' name='region' 
                    required autofocus 
                        placeholder='ingrese Region' /> 
            </div>
            
            <div>
                <label for='supli'>Codigo Postal</label>
                <input type='text' class='form-control' id='postalcode' name='postalcode' 
                    required autofocus 
                        placeholder='ingrese Codigo Postal' /> 
            </div>
            
            <div>
                <label for='supli'>Pais</label>
                <input type='text' class='form-control' id='country' name='country' 
                    required autofocus 
                        placeholder='ingrese Ciudad' /> 
            </div>
            <div>
            <label for='supli'>Telefono</label>
            <input type='text' class='form-control' id='phone' name='phone' 
                required autofocus 
                    placeholder='ingrese Telefono' /> 
            </div>

            <div>
            <label for='supli'>Fax</label>
            <input type='text' class='form-control' id='fax' name='fax' 
                required autofocus 
                    placeholder='ingrese Fax' /> 
            </div>
            <div>
            <label for='supli'>Pagina Principal</label>
            <input type='text' class='form-control' id='homepage' name='homepage' 
                required autofocus 
                    placeholder='ingrese Pagina Principal' /> 
            </div>
            <div>
            <br />

            <input type='submit' class='btn btn-success' name='registrar_suppliers' value='Registrar Proveedores' />
            </div>
            </fieldset>
            </form>
            </div>

            </div>
            <div class='col-xs-4 col-md-2'></div>
    </div>
    	";
        echo $form;

    }
    public function update()
    {
        $this->query="UPDATE suppliers SET
        companyname='$this->companyname',contacttitle='$this->contacttitle',addres='$this->addres',
        city='$this->city',region='$this->region',postalcode='$this->postalcode',
        country='$this->country',phone='$this->phone',fax='$this->fax',homepage='$this->homepage'
        where suppliersid ='$this->supplier_id'";

        $this->execute_single_query();
    }
    public function get_datos_modificar($_P){

        $this->supplier_id=$_P['suppliersid'];
        $this->companyname=$_P['companyname'];
        $this->contacttitle=$_P['contacttitle'];
        $this->addres=$_P['addres'];
        $this->city=$_P['city'];
        $this->region=$_P['region'];
        $this->postalcode=$_P['postalcode'];
        $this->country=$_P['country'];
        $this->phone=$_P['phone'];
        $this->fax=$_P['fax'];
        $this->homepage=$_P['homepage'];
        $this->update();

    }
    public function form_modificar_supplier(){

        $form="
    <div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
    <form name='modificar_suppliers' 
    action='handler_suppliers.php?pag=modificar_suppliers'
      method='POST'>
		<fieldset>
		
    <legend>Modificar Proveedoras</legend>

    
            <div>
                <label for='supli'>I.D Proveedor</label>
                <input type='text' class='form-control'  readonly='readonly'
                value='$this->suppliersid' id='suppliersid' name='suppliersid' 
                    required autofocus 
                        placeholder='ingrese Nombre Supplier' /> 
            </div>

            <div>
                <label for='supli'>Compania</label>
                <input type='text' class='form-control'
                value='$this->companyname' id='companyname' name='companyname' 
                    required autofocus 
                        placeholder='ingrese Nombre Compania' /> 
            </div>
            <div>
                <label for='supli'>Titulo de Contacto</label>
                <input type='text' class='form-control'
                value='$this->contacttitle' id='contacttitle' name='contacttitle' 
                    required autofocus 
                        placeholder='ingrese Titulo de Contacto' /> 
            </div>
            <div>
                <label for='supli'>Direccion</label>
                <input type='text' class='form-control'
                value='$this->addres' id='addres' name='addres' 
                    required autofocus 
                        placeholder='ingrese Direccion' /> 
            </div>
            <div>
                <label for='supli'>Ciudad</label>
                <input type='text' class='form-control'
                value='$this->city' id='city' name='city' 
                    required autofocus 
                        placeholder='ingrese Ciudad' /> 
            </div>

            <div>
                <label for='supli'>Region</label>
                <input type='text' class='form-control'
                value='$this->region' id='region' name='region' 
                    required autofocus 
                        placeholder='ingrese Region' /> 
            </div>
            
            <div>
                <label for='supli'>Codigo Postal</label>
                <input type='text' class='form-control' 
                value='$this->postalcode'id='postalcode' name='postalcode' 
                    required autofocus 
                        placeholder='ingrese Codigo Postal' /> 
            </div>
            
            <div>
                <label for='supli'>Pais</label>
                <input type='text' class='form-control'
                value='$this->country' id='country' name='country' 
                    required autofocus 
                        placeholder='ingrese Ciudad' /> 
            </div>
            <div>
            <label for='supli'>Telefono</label>
            <input type='text' class='form-control' 
            value='$this->phone'id='phone' name='phone' 
                required autofocus 
                    placeholder='ingrese Telefono' /> 
            </div>

            <div>
            <label for='supli'>Fax</label>
            <input type='text' class='form-control' 
            
            value='$this->fax'
            id='fax' name='fax' 
                required autofocus 
                    placeholder='ingrese Fax' /> 
            </div>
            <div>
            <label for='supli'>Pagina Principal</label>
            <input type='text' class='form-control' 
            value='$this->homepage' id='homepage' name='homepage' 
                required autofocus 
                    placeholder='ingrese Pagina Principal' /> 
            </div>
            <div>
            <br />

            <input type='submit' class='btn btn-success' name='modificar_suppliers' value='Modificar Proveedor' />
            </div>
            </fieldset>
            </form>
            </div>

            </div>
            <div class='col-xs-4 col-md-2'></div>
    </div>
    	";
        echo $form;

    }


    
    public function get_datos_eliminar($_P){
        $this->supplier_id=$_P['suppliersid'];
        $this->delete();
    }
    public function form_eliminar_suppliers(){

        $form="
        <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
        <form name='eliminar_suppliers' 
        action='handler_suppliers.php?pag=eliminar_suppliers'
          method='POST'>
            <fieldset>
            
        <legend>Eliminar Proveedor</legend>
    
                <div>
                    <label for='supli'>Titulo de Contacto</label>
                    <input type='text' class='form-control'
                    value='$this->contacttitle' id='contacttitle' name='contacttitle' 
                        required autofocus 
                            placeholder='ingrese Titulo de Contacto' /> 
                </div>
                <br/>

                <div>
                    <input type='hidden' value='$this->suppliersid' name='suppliersid' id='suppliersid'  />
                    <input type='submit' name='eliminar_suppliers' value='Eliminar Suppliers' />
                    </div>

                </fieldset>
                </form>
                </div>
    
                </div>
                <div class='col-xs-4 col-md-2'></div>
        </div>
            ";
            echo $form;
    }

    public function delete(){

        $this->query="delete from suppliers
        where suppliersid='$this->supplier_id'";

        $this->execute_single_query();
    }
    public function get_valores(){
		$sql="SELECT suppliersid,companyname,contacttitle,addres,city,region,postalcode,country,phone,fax,homepage
    FROM suppliers;";
     return $this->get_results_from_query2($sql);		   
    }

public function get_tabla(){

        $sql="SELECT suppliersid,companyname,contacttitle,addres,
        city,region,postalcode,
        country,phone,fax,homepage
    FROM suppliers
    ORDER BY suppliersid;";
$cab="
<h1>Administrador de Proveedores</h1>
<a href='handler_suppliers.php?pag=form_nuevo_suppliers'
class='btn btn-success'>
<span class='glyphicon glyphicon-plus'
 aria-hidden='true'></span> Nuevo Proveedor</a>
 <br/>
<table class='table'>
	   <tr><th>I.D. Suppliers</th>
	   <th>Nombre de Compania</th>
	   <th>Titulo de Contacto</th>
       <th>Direccion</th>
       <th>Ciudad</th>
       <th>Region</th>
       <th>Codigo Postal</th>
       <th>Pais</th>
       <th>Telefono</th>
       <th>Fax</th>
       <th>Pagina Principal</th>

       
	   <th></th>
	   <th></th></tr>
";
	$cuerpo="";
	
	$result=$this->get_results_from_query2($sql);
	while ($filas = $result->fetch_assoc()){
		$supplier_id=$filas['suppliersid'];
		$companyname=$filas['companyname'];
		$contacttitle=$filas['contacttitle'];
        $addres=$filas['addres'];
        $city=$filas['city'];
        $region=$filas['region'];
        $postalcode=$filas['postalcode'];
        $country=$filas['country'];
        $phone=$filas['phone'];
        $fax=$filas['fax'];
        $homepage=$filas['homepage'];


    $cuerpo=$cuerpo."<tr>
  
        <td>$supplier_id</td>
        <td>$companyname</td>
        <td>$contacttitle</td>
        <td>$addres</td>
        <td>$city</td>
        <td>$region</td>
        <td>$postalcode</td>
        <td>$country</td>
        <td>$phone</td>
        <td>$fax</td>
        <td>$homepage</td>

        
        <td><a class='btn btn-warning'
        href='handler_suppliers.php?pag=form_modificar_supplier&suppliersid=$supplier_id'>
        <span class='glyphicon glyphicon-pencil'
        aria-hidden='true'></span> 
        MODIFICAR</a></td>
        <td><a class='btn btn-danger'
        href='handler_suppliers.php?pag=form_eliminar_suppliers&suppliersid=$supplier_id'>
        <span class='glyphicon glyphicon-trash'
        aria-hidden='true'></span> 
        ELIMINAR</a></td>
                            </tr>";
		}

		$pie="</table>
        <script src='js/jquery-1.12.4.min.js'></script>
            <script src='js/FileSaver.min.js'></script>
            <script src='js/Blob.min.js'></script>
            <script src='js/xls.core.min.js'></script>
            <script src='js/tableexport.js'></script>


        <script>
            $('table').tableExport({
                formats: ['xlsx','txt', 'csv'], //Tipo de archivos a exportar ('xlsx','txt', 'csv', 'xls')
                position: 'button',  // Posicion que se muestran los botones puedes ser: (top, bottom)
                bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
                fileName: 'ListadoPaises',    //Nombre del archivo 
            });
        </script>
		
		
		
		
		";

		echo $cab.$cuerpo.$pie;

    }




}

?>
