<?php
require_once('DBAbstract.php');

class shippers extends DBAbstract
{
    Private $shipper_id;
    private $companyname;
    private $phone;


    public function __construct()
    {
        $this->shipper_id=0;
        $this->companyname='';
        $this->phone=0;

    }
    public function __destruct(){ }

    public function get_shipper_id(){
       return $this->shipper_id; 
    }

    public function set_shipper_id($shipper_id){
        $this->shipper_id=$shipper_id;
    }
    public function get_companyname(){
        return $this->companyname;
    }
    public function set_companyname($companyname){
        $this->companyname=$companyname;
    }
    public function get_phone(){
        return $this->phone;
    }
    public function set_phone($phone){
        $this->phone=$phone;
    }
    public function get_by_shipper_id($shipper_id=''){
        if($shipper_id!=''):
            $this->query="SELECT shipperid ,
                    companyname ,
                    phone
             FROM shippers 
            where shipperid='$shipper_id';";
            $this->get_results_from_query();
        endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif; 
    }
    public function insert(){
        $this->query="INSERT INTO shippers(companyname ,phone)
        VALUES('$this->companyname','$this->phone');";
        $this->execute_single_query();
    }
    public function get_datos_shipper($_P){

        $this->companyname=$_P['companyname'];
        $this->phone=$_P['phone'];
        $this->insert();
    }
    public function form_nuevo_shipper()
    {
        $form="
        
            <div class='row'>
                <div class='col-xs-4 col-md-2'>.</div>
                <div class='col-xs-10 col-md-8'>
                <div class='form-group'>
            <form name='registrar_shipper' 
                action='handler_shipper.php?pag=registrar_shipper'
                method='POST'>
                <fieldset>
                <legend>Registrar Cargadores</legend>
            
            <div>
                <label for='client'>Nombre de Compania</label>
                <input type='text' class='form-control' id='companyname' name='companyname'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>
            <div>
                <label for='client'>Telefono</label>
                <input type='text' class='form-control' id='phone' name='phone'  required autofocus 
                placeholder='ingrese Telefono' /> 
            </div>       
            <div>
                <br/>
                <input type='submit' class='btn btn-success' name='registrar_shipper' value='Registrar Cargadores' />
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
   
        $this->query="update shippers set               
                companyname='$this->companyname',
                phone ='$this->phone'
                where shipperid='$this->shipper_id';";
    
                $this->execute_single_query();
    }
    public function get_datos_modificar_shipper($_P){
    
            $this->shipper_id    =    $_P['shipperid'];
            $this->companyname  =    $_P['companyname'];
            $this->phone        =    $_P['phone'];
            $this->update();
    }
    public function form_modificar_shipper()
    {
        $form="
        
            <div class='row'>
                <div class='col-xs-4 col-md-2'>.</div>
                <div class='col-xs-10 col-md-8'>
                <div class='form-group'>
            <form name='modificar_shipper' 
                action='handler_shipper.php?pag=modificar_shipper'
                method='POST'>
                <fieldset>
                <legend>Modificar Cargadores</legend>
            <div>
                <label for='client'>I.D. Cargadores</label>
                <input type='text' class='form-control' 
                value='$this->shipperid' id='shipperid' readonly='readonly 'name='shipperid'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>
            <div>
                <label for='client'>Nombre de Compania</label>
                <input type='text' class='form-control'
                value='$this->companyname' id='companyname' name='companyname'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>
            <div>
                <label for='client'>Telefono</label>
                <input type='text' class='form-control' 
                value='$this->phone' id='phone' name='phone'  required autofocus 
                placeholder='ingrese Telefono' /> 
            </div>       
            <div>
                <br/>
                <input type='submit' class='btn btn-success' name='modificar_shipper' value='Modificar Cargadores' />
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
        $this->query="DELETE FROM shippers
                    where 
                    shipperid='$this->shipper_id'";
        $this->execute_single_query();
    }
    public function get_datos_eliminar_shipper($_P){

        $this->shipper_id=$_P['shipperid'];
        $this->delete();
    }
    public function form_eliminar_shipper(){

        $form="
        
            <div class='row'>
                <div class='col-xs-4 col-md-2'>.</div>
                <div class='col-xs-10 col-md-8'>
                <div class='form-group'>
            <form name='eliminar_shipper' 
                action='handler_shipper.php?pag=eliminar_shipper'
                method='POST'>
                <fieldset>
                <legend>Eliminar Cargadores</legend>
            <div>
                <label for='client'>Nombre de Compania</label>
                <input type='text' class='form-control'
                value='$this->companyname' id='companyname' name='companyname'  required autofocus 
                placeholder='ingrese Compania' /> 
            </div>       
            <br/>   
            <div>
                <input type='hidden' name='shipperid' id='shipperid' value='$this->shipperid'/>
                <input type='submit' name='eliminar_shipper' value='Eliminar Expedidora' />
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
        $sql="SELECT shipperid ,
        companyname ,
        phone
        FROM shippers";

        return $this->get_results_from_query2($sql);

    }
    public function get_tabla(){

        $sql="SELECT shipperid ,
        companyname ,
        phone
        FROM shippers
            ORDER BY shipperid;";

        $cab="
        <h1>Administrador de Cargadores</h1>
        <a href='handler_shipper.php?pag=form_nuevo_shipper'
        class='btn btn-success'>
        <span class='glyphicon glyphicon-plus'
         aria-hidden='true'></span> Nuevo Cargadores</a>
         <br/>
        <table class='table'>
               <tr><th>I.D Cargadores</th>
               <th>Nombre Compania</th>
               <th>Telefono </th>

               
               <th></th>
               <th></th></tr>
        ";
        $cuerpo="";
        
        $result=$this->get_results_from_query2($sql);
        while ($filas = $result->fetch_assoc()){
            $shipper_id=$filas['shipperid'];
            $companyname=$filas['companyname'];
            $phone=$filas['phone'];


            $cuerpo=$cuerpo."<tr>
      
            <td>$shipper_id</td>
            <td>$companyname</td>       
            <td>$phone</td>
            

            <td><a class='btn btn-warning'
            href='handler_shipper.php?pag=form_modificar_shipper&shipperid=$shipper_id'>
            <span class='glyphicon glyphicon-pencil'
            aria-hidden='true'></span> 
            MODIFICAR</a></td>
            <td><a class='btn btn-danger'
            href='handler_shipper.php?pag=form_eliminar_shipper&shipperid=$shipper_id'>
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