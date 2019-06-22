<?php

    require_once('DBAbstract.php');
   

class employees extends DBAbstract
{

    private $employee_id;
    private $lastname;
    private $firstname;
    private $title;
    private $titleofcourtesy;
    private $birtdate;
    private $hiredate;
    private $address;
    private $city;
    private $region;
    private $postalcode;
    private $country;
    private $homepage;
    private $extension;
    private $photo;
    private $notes;
    private $reportsto;    

    public function __construct()
    {
        $this->employee_id=0;       
        $this->lastname='';
        $this->firstname='';
        $this->title='';
        $this->titleofcourtesy='';
        $this->birtdate='';
        $this->hiredate='';
        $this->address='';
        $this->city='';
        $this->region='';
        $this->postalcode=0;
        $this->country='';
        $this->homepage='';
        $this->extension='';
        $this->photo='';
        $this->notes='';
        $this->reportsto='';

    }
    public function __destruct()
    {
        
    }

    public function get_employee_id(){
        return $this->employee_id;
    }
    public function set_employee_id($employee_id){
        $this->employee_id=$employee_id;
    }

    public function get_lastname(){
        return $this->lastname;
    }
    public function set_lastname($lastname){
       $this->lastname=$lastname;
    }
    public function get_firstname(){
        return $this->firstname;
    }
    public function set_firstname($firstname){
        $this->firstname=$firstname;
    }
    public function get_title(){
        return $this->title;
    }
    public function set_title($title){
        $this->title=$title;
    }
    public function get_titleofcourtesy(){
        return $this->titleofcourtesy;
    }
    public function set_titleofcourtesy($titleofcourtesy){
        $this->titleofcourtesy=$titleofcourtesy;
    }
    public function get_birtdate(){
        return $this->birtdate;
    }
    public function set_birtdate($birtdate){
        $this->birtdate=$birtdate;
    }
    public function get_hiredate(){
        return $this->hiredate;
    }
    public function set_hiredate($hiredate){
        $this->hiredate=$hiredate;
    }
    public function get_address(){
        return $this->address;
    }
    public function set_address($address){
        $this->address=$address;
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

    public function get_postalcode(){
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

    public function get_homepage(){
        return $this->homepage;
    }
    public function set_homepage($homepage){
        $this->homepage=$homepage;
    }

    public function get_extension(){
        return $this->extension;
    }
    public function set_extension($extension){
        $this->extension=$extension;
    }
    public function get_photo(){
        return $this->photo;
    }
    public function set_photo($photo){
        $this->photo=$photo;
    }

    public function get_notes(){
        return $this->notes;
    }
    public function set_notes($notes){
        $this->notes=$notes;
    }

    public function get_reportsto(){
        return $this->reportsto;
    }
    public function set_reportsto($reportsto){
        $this->reportsto=$reportsto;
    }

    public function get_by_employee_id($employee_id=''){

        if($employee_id!=''):
            $this->query="SELECT employeeid,
            lastname ,firstname ,title ,
            titleofcourtesy ,birtdate ,
            hiredate,address ,city ,
            region,postalcode ,
            country,homepage ,
            extension, photo,
            notes,reportsto
            FROM employees
                    where employeeid='$employee_id';";
            $this->get_results_from_query();
        endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif; 

    }
    public function insert(){

        
        $this->query="INSERT INTO employees(
        lastname ,firstname ,title ,
        titleofcourtesy ,birtdate ,
        hiredate,address ,city ,
        region,postalcode ,
        country,homepage ,
        extension, photo,
        notes,reportsto)
        VALUES('$this->lastname','$this->firstname','$this->title','$this->titleofcourtesy','$this->birtdate','$this->hiredate','$this->address','$this->city','$this->region','$this->postalcode','$this->country','$this->homepage','$this->extension','$this->photo','$this->notes','$this->reportsto');";
        $this->execute_single_query();

    }
    public function get_datos_employee($_P){

        $this->lastname=$_P['lastname'];
        $this->firstname=$_P['firstname'];
        $this->title=$_P['title'];
        $this->titleofcourtesy=$_P['titleofcourtesy'];
        $this->birtdate=$_P['birtdate'];
        $this->hiredate=$_P['hiredate'];
        $this->address=$_P['address'];
        $this->city=$_P['city'];
        $this->region=$_P['region'];
        $this->postalcode=$_P['postalcode'];
        $this->country=$_P['country'];
        $this->homepage=$_P['homepage'];
        $this->extension=$_P['extension'];
        $img =  file_get_contents($_FILES['photo']['tmp_name']);
        $this->photo=base64_encode($img);

        $this->notes=$_P['notes'];
        $this->reportsto=$_P['reportsto'];
        $this->insert();

    }

    public function form_nuevo_employee(){
        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='registrar_employee' enctype='multipart/form-data'
        action='handler_employees.php?pag=registrar_employee'
        method='POST'>
		<fieldset>
		<legend>Registrar Empleado</legend>
    
    <div>
        <label for='employ'>Apellido</label>
        <input type='text' class='form-control' id='lastname' name='lastname'  required autofocus 
        placeholder='ingrese Apellido' /> 
    </div>
        <div>
        <label for='employ'>Nombre</label>
        <input type='text' class='form-control' id='firstname' name='firstname'  required autofocus 
        placeholder='ingrese Nombre' /> 
    </div>
    <div>
        <label for='employ'>Titulo</label>
        <input type='text' class='form-control' id='title' name='title'  required autofocus 
        placeholder='ingrese Titulo' /> 
    </div>   
    <div>
        <label for='employ'>Titulo de Cortesia</label>
        <input type='text' class='form-control' id='titleofcourtesy' name='titleofcourtesy'  required autofocus 
        placeholder='ingrese Titulo de Cortesia' /> 
    </div>    
    <div>
        <label for='employ'>Fecha Nacimiento</label>
        <input type='date' class='form-control' id='birtdate' name='birtdate'  required autofocus 
        placeholder='ingrese Fecha Nacimiento'  /> 
    </div>
    <div>
        <label for='employ'>Fecha de Contratacion</label>
        <input type='date' class='form-control' id='hiredate' name='hiredate'  required autofocus 
        placeholder='ingrese Fecha Contratacion' /> 
    </div>
    <div>
        <label for='employ'>Direccion</label>
        <input type='text' class='form-control' id='address' name='address'  required autofocus 
        placeholder='ingrese Direccion' /> 
    </div>
    <div>
        <label for='employ'>Ciudad</label>
        <input type='text' class='form-control' id='city' name='city'  required autofocus 
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
        <label for='employ'>Pagina Principal</label>
        <input type='text' class='form-control' id='homepage' name='homepage'  required autofocus 
        placeholder='ingrese Pagina Principal' /> 
    </div>
    <div>
        <label for='employ'>Extension</label>
        <input type='text' class='form-control' id='extension' name='extension'  required autofocus 
        placeholder='ingrese Extension' /> 
    </div>
    <div>
        <label for='employ'>Foto</label>
        <input type='file' class='form-control' id='photo' name='photo'  required autofocus  /> 
    </div>   
    <div>
        <label for='employ'>Notas</label>
        <input type='text' class='form-control' id='notes' name='notes'  required autofocus 
        placeholder='ingrese Notas' /> 
    </div>  
    <div>
        <label for='employ'>Informe</label>
        <input type='text' class='form-control' id='reportsto' name='reportsto'  required autofocus 
        placeholder='ingrese Informe' /> 
    </div>                                  

    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='registrar_employee' value='Registrar Empleado' />
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
/*public function data_uri($file,$mime){
    $contents =file_get_encode($file);
    $base64=base64_encode($contents);
    return ('data'.$mime.';base64,'.$base64);
}*/

public function update(){
    $this->query="UPDATE employees set
        lastname='$this->lastname',
        firstname ='$this->firstname',
        title ='$this->title',
        titleofcourtesy='$this->titleofcourtesy',
        birtdate ='$this->birtdate',
        hiredate ='$this->hiredate',
        address ='$this->address',
        city ='$this->city',
        region='$this->region',
        postalcode ='$this->postalcode',
        country ='$this->country',
        homepage ='$this->homepage',
        extension ='$this->extension',
        photo='$this->photo',
        notes ='$this->notes',
        reportsto='$this->reportsto'
        where employeeid='$this->employee_id';";
    $this->execute_single_query();
}
public function get_datos_modificar_employee($_P){
   

    $this->employee_id=$_P['employeeid'];
    $this->lastname=$_P['lastname'];
    $this->firstname=$_P['firstname'];
    $this->title=$_P['title'];
    $this->titleofcourtesy=$_P['titleofcourtesy'];
    $this->birtdate=$_P['birtdate'];
    $this->hiredate=$_P['hiredate'];
    $this->address=$_P['address'];
    $this->city=$_P['city'];
    $this->region=$_P['region'];
    $this->postalcode=$_P['postalcode'];
    $this->country=$_P['country'];
    $this->homepage=$_P['homepage'];
    $this->extension=$_P['extension'];
    $img = file_get_contents($_FILES['photo']['tmp_name']);
    $this->photo=base64_encode($img);
    $this->notes=$_P['notes'];
    $this->reportsto=$_P['reportsto'];
    $this->update();

}

public function form_modificar_employee(){

    $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='modificar_employee' enctype='multipart/form-data'
        action='handler_employees.php?pag=modificar_employee'
        method='POST'>
		<fieldset>
        <legend>Modificar Empleado</legend>
        
    <div>
        <label for='employ'>I.D. EMPLEADO</label>
        <input type='text' class='form-control' value='$this->employeeid' id='employeeid' name='employeeid'  required autofocus readonly='readonly'
        placeholder='ingrese Apellido' /> 
    </div>
    <div>
        <label for='employ'>Apellido</label>
        <input type='text' class='form-control' value='$this->lastname' id='lastname' name='lastname'  required autofocus 
        placeholder='ingrese Apellido' /> 
    </div>
        <div>
        <label for='employ'>Nombre</label>
        <input type='text' class='form-control' value='$this->firstname' id='firstname' name='firstname'  required autofocus 
        placeholder='ingrese Nombre' /> 
    </div>
    <div>
        <label for='employ'>Titulo</label>
        <input type='text' class='form-control' 
        value='$this->title' id='title' name='title'  required autofocus 
        placeholder='ingrese Titulo' /> 
    </div>   
    <div>
        <label for='employ'>Titulo de Cortesia</label>
        <input type='text' class='form-control' value='$this->titleofcourtesy' id='titleofcourtesy' name='titleofcourtesy'  required autofocus 
        placeholder='ingrese Titulo de Cortesia' /> 
    </div>    
    <div>
        <label for='employ'>Fecha Nacimiento</label>
        <input type='date' class='form-control' value='$this->birtdate' id='birtdate' name='birtdate'  required autofocus 
        placeholder='ingrese Fecha Nacimiento'  /> 
    </div>
    <div>
        <label for='employ'>Fecha de Contratacion</label>
        <input type='date' class='form-control' 
        value ='$this->hiredate'id='hiredate' name='hiredate'  required autofocus 
        placeholder='ingrese Fecha Contratacion' /> 
    </div>
    <div>
        <label for='employ'>Direccion</label>
        <input type='text' class='form-control' 
        value='$this->address' id='address' name='address'  required autofocus 
        placeholder='ingrese Direccion' /> 
    </div>
    <div>
        <label for='employ'>Ciudad</label>
        <input type='text' class='form-control' 
        value='$this->city' id='city' name='city'  required autofocus 
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
        value='$this->postalcode' id='postalcode' name='postalcode' 
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
        <label for='employ'>Pagina Principal</label>
        <input type='text' class='form-control' 
        value='$this->homepage' id='homepage' name='homepage'  required autofocus 
        placeholder='ingrese Pagina Principal' /> 
    </div>
    <div>
        <label for='employ'>Extension</label>
        <input type='text' class='form-control'
        value='$this->extension'  id='extension' name='extension'  required autofocus 
        placeholder='ingrese Extension' /> 
    </div> <br/>
    <label for='employ'>Foto</label>
    <div>
        
        <img src='data:image/jpg;base64,$this->photo'; style='width: 100px;heigh:100px'>
        <br/>
        
        
    </div>  
    <div>
        <label for='employ'>Foto</label>
            <input type='file' class='form-control' value='$this->photo' id='photo' name='photo'/> 
    </div> 
    <br/>      
    <div>
        <label for='employ'>Notas</label>
        <input type='text' class='form-control'
        value='$this->notes'  id='notes' name='notes'  required autofocus 
        placeholder='ingrese Notas' /> 
    </div>  
    <div>
        <label for='employ'>Informe</label>
        <input type='text' class='form-control'
        value='$this->reportsto' id='reportsto' name='reportsto'  required autofocus 
        placeholder='ingrese Informe' /> 
    </div>                                  

    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='modificar_employee' value='Modificar Empleado' />
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
    $this->query="delete from employees
        where employeeid='$this->employee_id';
    ";
    $this->execute_single_query();
}
public function get_datos_eliminar_employee($_P){
    $this->employee_id=$_P['employeeid'];
    $this->delete();
}
public function form_eliminar_employee(){
    $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='eliminar_employee' enctype='multipart/form-data'
        action='handler_employees.php?pag=eliminar_employee'
        method='POST'>
		<fieldset>
        <legend>Eliminar Empleado</legend>
        

    <div>
        <label for='employ'>Apellido</label>
        <input type='text' class='form-control' value='$this->lastname' id='lastname' name='lastname'  required autofocus 
        placeholder='ingrese Apellido' /> 
    </div>
    <br/>                             

    <div>
    <input type='hidden' name='employeeid' id='employeeid' value='$this->employeeid'/>
    <input type='submit' name='eliminar_employee' value='Eliminar Predio' />
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

public function get_tabla(){

    $sql="SELECT employeeid ,
	lastname ,
	firstname ,
	title ,
	titleofcourtesy ,
	birtdate ,
	hiredate ,
	address ,
	city ,
	region ,
	postalcode ,
	country ,
	homepage ,
	extension ,
	photo,
	notes ,
	reportsto
	FROM employees;";

    $cab="
    <h1>Administrador de Empleados</h1>
    <a href='handler_employees.php?pag=form_nuevo_employee'
    class='btn btn-success'>
    <span class='glyphicon glyphicon-plus'
     aria-hidden='true'></span> Nuevo Empleado</a>
     <br/>
    <table class='table'>
           <tr><th>I.D Empleado</th>
           <th>Apellido</th>
           <th>Nombre</th>
           <th>Titulo</th>
           <th>Titulo de Cortesia</th>
           <th>Fecha de contratacion</th>
           <th>Direccion</th>
           <th>Ciudad</th>
           <th>Region</th>
           <th>Codigo Postal</th>
           <th>Pais</th>
           <th>Pagina Principal</th>
           <th>Extension</th>
           <th>Foto</th>
           <th>Notas</th>
           <th>Informe</th>
           
           <th></th>
           <th></th></tr>
    ";
    
        $cuerpo="";
        
        $result=$this->get_results_from_query2($sql);
        while ($filas = $result->fetch_assoc()){

             $employee_id=$filas['employeeid'];
             $lastname=$filas['lastname'];
             $firstname=$filas['firstname'];
             $title=$filas['title'];
             $titleofcourtesy=$filas['titleofcourtesy'];
             $birtdate=$filas['birtdate'];
             $hiredate=$filas['hiredate'];
             $address=$filas['address'];
             $city=$filas['city'];
             $region=$filas['region'];
             $postelcode=$filas['postalcode'];
             $country=$filas['country'];
             $homepage=$filas['homepage'];
             $extension=$filas['extension'];
             $photo=$filas['photo'];
             $notes=$filas['notes'];
             $reportsto=$filas['reportsto'];

             

            $cuerpo=$cuerpo."<tr>
                
    <td>$employee_id</td>
    <td>$lastname</td>
    <td>$firstname</td>
    <td>$title</td>
    <td>$titleofcourtesy</td>
    <td>$birtdate</td>
    <td>$hiredate</td>
    <td>$address</td>
    <td>$city</td>
    <td>$region</td>
    <td>$postelcode</td>
    <td>$country</td>
    <td>$homepage</td>
    <td>$extension</td>
       
    <td><img src='data:image/jpg;base64,$photo'; style='width: 100px;heigh:100px'></td>
    <td>$notes</td>
    <td>$reportsto</td>

    <td><a class='btn btn-warning'
    href='handler_employees.php?pag=form_modificar_employee&employeeid=$employee_id'>
    <span class='glyphicon glyphicon-pencil'
     aria-hidden='true'></span> 
    MODIFICAR</a></td>
    <td><a class='btn btn-danger'
    href='handler_employees.php?pag=form_eliminar_employee&employeeid=$employee_id'>
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
        fileName: 'ListaArboles',    //Nombre del archivo 
    });
    </script>";
    
            echo $cab.$cuerpo.$pie;
}


}

?>