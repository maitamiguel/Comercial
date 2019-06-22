<?php
require_once('DBAbstract.php');

class customers extends DBAbstract
{
    Private $customer_id;
    private $companyname;
    private $contactname;
    private $contacttitle;
    private $address;
    private $city;
    private $region;
    private $postalcode;
    private $country;
    private $phone;
    private $fax;

    public function __construct()
    {
        $this->customer_id=0;
        $this->companyname='';
        $this->contactname='';
        $this->contacttitle='';
        $this->address='';
        $this->city='';
        $this->region='';
        $this->postalcode=0;
        $this->country='';
        $this->phone=0;
        $this->fax=0;

    }
    public function __destruct(){ }

    public function get_customer_id(){
       return $this->customer_id; 
    }

    public function set_customer_id($customer_id){
        $this->customer_id=$customer_id;
    }
    public function get_companyname(){
        return $this->companyname;
    }
    public function set_companyname($companyname){
        $this->companyname=$companyname;
    }

    public function get_contactname(){
        return $this->contactname;
    }
    public function set_contactname($contactname){
        $this->contactname=$contactname;
    }
    public function get_contacttitle(){
        return $this->contacttitle;
    }
    public function set_contacttitle($contacttitle){
        $this->contacttitle=$contacttitle;
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
    public function get_by_customer_id($customer_id=''){
        if($customer_id!=''):
            $this->query="SELECT customerid ,
                    companyname ,
                    contactname ,
                    contacttitle ,
                    address ,
                    city ,
                    region ,
                    postalcode ,
                    country,
                    phone,
                    fax
             FROM customers 
            where customerid='$customer_id';";
            $this->get_results_from_query();
        endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif; 
    }
    public function insert(){
        $this->query="INSERT INTO customers(companyname ,
         contactname ,contacttitle ,address ,city , region ,postalcode ,
        country, phone,fax)
        VALUES('$this->companyname','$this->contactname','$this->contacttitle','$this->address','$this->city','$this->region','$this->postalcode','$this->country','$this->phone','$this->fax');";
        $this->execute_single_query();
    }
    public function get_datos_customer($_P){

        $this->companyname=$_P['companyname'];
        $this->contactname=$_P['contactname'];
        $this->contacttitle=$_P['contacttitle'];
        $this->address=$_P['address'];
        $this->city=$_P['city'];
        $this->region=$_P['region'];
        $this->postalcode=$_P['postalcode'];
        $this->country=$_P['country'];
        $this->phone=$_P['phone'];
        $this->fax=$_P['fax'];
        $this->insert();
    }
    public function form_nuevo_customer()
    {
        $form="
        
            <div class='row'>
                <div class='col-xs-4 col-md-2'>.</div>
                <div class='col-xs-10 col-md-8'>
                <div class='form-group'>
            <form name='registrar_customer' 
                action='handler_customers.php?pag=registrar_customer'
                method='POST'>
                <fieldset>
                <legend>Registrar Cliente</legend>
            
            <div>
                <label for='client'>Nombre de Compania</label>
                <input type='text' class='form-control' id='companyname' name='companyname'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>

            <div>
                <label for='client'>Nombre Contacto</label>
                <input type='text' class='form-control' id='contactname' name='contactname'  required autofocus 
                placeholder='ingrese Nombre de Contacto' /> 
            </div>   
            <div>
                <label for='client'>Titulo de Contacto</label>
                <input type='text' class='form-control' id='contacttitle' name='contacttitle'  required autofocus 
                placeholder='ingrese Titulo de Contacto' /> 
            </div>   
            <div>
                <label for='client'>Direccion</label>
                <input type='text' class='form-control' id='address' name='address'  required autofocus 
                placeholder='ingrese Direccion' /> 
            </div>   
            <div>
                <label for='client'>Ciudad</label>
                <input type='text' class='form-control' id='city' name='city'  required autofocus 
                placeholder='ingrese Ciudad' /> 
            </div>  
            <div>
                <label for='client'>Region</label>
                <input type='text' class='form-control' id='region' name='region'  required autofocus 
                placeholder='ingrese Region' /> 
            </div>    
            <div>
                <label for='Client'>Codigo Postal</label>
                <input type='text' class='form-control' id='postalcode' name='postalcode'  required autofocus 
                placeholder='ingrese Codigo Postal' /> 
            </div>   
            <div>
                <label for='client'>Pais</label>
                <input type='text' class='form-control' id='country' name='country'  required autofocus 
                placeholder='ingrese Pais' /> 
            </div>   
            <div>
                <label for='client'>Telefono</label>
                <input type='text' class='form-control' id='phone' name='phone'  required autofocus 
                placeholder='ingrese Telefono' /> 
            </div>  
            <div>
                <label for='client'>Fax</label>
                <input type='text' class='form-control' id='fax' name='fax'  required autofocus 
                placeholder='ingrese Fax' /> 
            </div>            
            <div>
                <br/>
                <input type='submit' class='btn btn-success' name='registrar_customer' value='Registrar Cliente' />
            </div>

            </fieldset>
            </form>
            </div>
            </div>
            <div class='col-xs-4 col-md-2'></div>
           </div>";
                    echo $form;


    }
    public function update(){
   
        $this->query="update customers set               
                companyname='$this->companyname',
                contactname='$this->contactname',
                contacttitle ='$this->contacttitle',
                address='$this->address',
                city='$this->city',
                region ='$this->region',
                postalcode='$this->postalcode',
                country='$this->country',
                phone ='$this->phone',
                fax='$this->fax'
                where customerid='$this->customer_id';";
    
                $this->execute_single_query();
    }
    public function get_datos_modificar_customer($_P){
    
            $this->customer_id  =    $_P['customerid'];
            $this->companyname  =    $_P['companyname'];
            $this->contactname  =    $_P['contactname'];
            $this->contacttitle =    $_P['contacttitle'];
            $this->address      =    $_P['address'];
            $this->city         =    $_P['city'];
            $this->region       =    $_P['region'];
            $this->postalcode   =    $_P['postalcode'];
            $this->country      =    $_P['country'];
            $this->phone        =    $_P['phone'];
            $this->fax          =    $_P['fax'];
            $this->update();
    }
    public function form_modificar_customer()
    {
        $form="
        
            <div class='row'>
                <div class='col-xs-4 col-md-2'>.</div>
                <div class='col-xs-10 col-md-8'>
                <div class='form-group'>
            <form name='modificar_customer' 
                action='handler_customers.php?pag=modificar_customer'
                method='POST'>
                <fieldset>
                <legend>Modificar Cliente</legend>
            <div>
                <label for='client'>I.D. Cliente</label>
                <input type='text' class='form-control' 
                value='$this->customerid' id='customerid' readonly='readonly 'name='customerid'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>
            <div>
                <label for='client'>Nombre de Compania</label>
                <input type='text' class='form-control'
                value='$this->companyname' id='companyname' name='companyname'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>

            <div>
                <label for='client'>Nombre Contacto</label>
                <input type='text' class='form-control' 
                value='$this->contactname' id='contactname' name='contactname'  required autofocus 
                placeholder='ingrese Nombre de Contacto' /> 
            </div>   
            <div>
                <label for='client'>Titulo de Contacto</label>
                <input type='text' class='form-control' value='$this->contacttitle' id='contacttitle' name='contacttitle'  required autofocus 
                placeholder='ingrese Titulo de Contacto' /> 
            </div>   
            <div>
                <label for='client'>Direccion</label>
                <input type='text' class='form-control'
                value='$this->address' id='address' name='address'  required autofocus 
                placeholder='ingrese Direccion' /> 
            </div>   
            <div>
                <label for='client'>Ciudad</label>
                <input type='text' class='form-control' 
                value='$this->city' id='city' name='city'  required autofocus 
                placeholder='ingrese Ciudad' /> 
            </div>   
            <div>
                <label for='client'>Region</label>
                <input type='text' class='form-control' value='$this->region' id='region' name='region'  required autofocus 
                placeholder='ingrese Region' /> 
            </div>   
            <div>
                <label for='Client'>Codigo Postal</label>
                <input type='text' class='form-control' 
                value='$this->postalcode' id='postalcode' name='postalcode'  required autofocus 
                placeholder='ingrese Codigo Postal' /> 
            </div>   
            <div>
                <label for='client'>Pais</label>
                <input type='text' class='form-control' 
                value='$this->country'  id='country' name='country'  required autofocus 
                placeholder='ingrese Pais' /> 
            </div>   
            <div>
                <label for='client'>Telefono</label>
                <input type='text' class='form-control' 
                value='$this->phone' id='phone' name='phone'  required autofocus 
                placeholder='ingrese Telefono' /> 
            </div>  
            <div>
                <label for='client'>Fax</label>
                <input type='text' class='form-control' 
                value='$this->fax' id='fax' name='fax'  required autofocus 
                placeholder='ingrese Fax' /> 
            </div>            
            <div>
                <br/>
                <input type='submit' class='btn btn-success' name='modificar_customer' value='Modificar Cliente' />
            </div>

            </fieldset>
            </form>
            </div>
            </div>
            <div class='col-xs-4 col-md-2'></div>
           </div>";
                    echo $form;

        
    }
    public function delete()
    {
        $this->query="DELETE FROM customers
                    where 
                    customerid='$this->customer_id'";
        $this->execute_single_query();
    }
    public function get_datos_eliminar_customer($_P){

        $this->customer_id=$_P['customerid'];
        $this->delete();
    }
    public function form_eliminar_customer(){

        $form="
        
            <div class='row'>
                <div class='col-xs-4 col-md-2'>.</div>
                <div class='col-xs-10 col-md-8'>
                <div class='form-group'>
            <form name='eliminar_customer' 
                action='handler_customers.php?pag=eliminar_customer'
                method='POST'>
                <fieldset>
                <legend>Eliminar Cliente</legend>
            <div>
                <label for='client'>Nombre de Compania</label>
                <input type='text' class='form-control'
                value='$this->companyname' id='companyname' name='companyname'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>       
            <br/>   
            <div>
                <input type='hidden' name='customerid' id='customerid' value='$this->customerid'/>
                <input type='submit' name='eliminar_customer' value='Eliminar Cliente' />
            </div>

            </fieldset>
            </form>
            </div>
            </div>
            <div class='col-xs-4 col-md-2'></div>
           </div>";
                    echo $form;
    }

    public function get_valores(){
        $sql="SELECT customerid ,
        companyname ,
        contactname ,
        contacttitle ,
        address ,
        city ,
        region ,
        postalcode ,
        country,
        phone,
        fax
        FROM customers";

        return $this->get_results_from_query2($sql);

    }
    public function get_tabla(){

        $sql="SELECT customerid ,
                    companyname ,
                    contactname ,
                    contacttitle ,
                    address ,
                    city ,
                    region ,
                    postalcode ,
                    country,
                    phone,
                    fax
             FROM customers 
            ORDER BY customerid;";

        $cab="
        <h1>Administrador de Clientes</h1>
        <a href='handler_customers.php?pag=form_nuevo_customer'
        class='btn btn-success'>
        <span class='glyphicon glyphicon-plus'
         aria-hidden='true'></span> Nuevo Cliente</a>
         <br/>
        <table class='table'>
               <tr><th>I.D Cliente</th>
               <th>Nombre Compania</th>
               <th>Nombre de Contacto</th>
               <th>Titulo de Contacto</th>
               <th>Direccion</th>
               <th>Ciudad</th>
               <th>Region</th>
               <th>Codigo Postal</th>
               <th>Pais</th>
               <th>Telefono </th>
               <th>Fax</th>

               
               <th></th>
               <th></th></tr>
        ";
        $cuerpo="";
        
        $result=$this->get_results_from_query2($sql);
        while ($filas = $result->fetch_assoc()){
            $customer_id=$filas['customerid'];
            $companyname=$filas['companyname'];
            $contactname=$filas['contactname'];
            $conctactitle=$filas['contacttitle'];
            $address=$filas['address'];
            $city=$filas['city'];
            $region=$filas['region'];
            $postalcode=$filas['postalcode'];
            $country=$filas['country'];
            $phone=$filas['phone'];
            $fax=$filas['fax'];


            $cuerpo=$cuerpo."<tr>
      
            <td>$customer_id</td>
            <td>$companyname</td>
            <td>  $contactname</td>
            <td>$conctactitle</td>
            <td>$address</td>
            <td>$city</td>
            <td>$region</td>
            <td>$postalcode</td>
            <td>$country</td>
            <td>$phone</td>
            <td>$fax</td>
            

            <td><a class='btn btn-warning'
            href='handler_customers.php?pag=form_modificar_customer&customerid=$customer_id'>
            <span class='glyphicon glyphicon-pencil'
            aria-hidden='true'></span> 
            MODIFICAR</a></td>
            <td><a class='btn btn-danger'
            href='handler_customers.php?pag=form_eliminar_customer&customerid=$customer_id'>
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