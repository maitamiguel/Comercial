<?php

require_once('DBAbstract.php');
class ordenes extends DBAbstract
{

    private $order_id;
    private $customerid;
    private $employeeid;
    private $orderdate;
    private $requiredate;
    private $shippeddata;
    private $shivia;
    private $freight;
    private $shipname;
    private $shiaddress;
    private $shipcity;
    private $shipregion;
    private $shippostalcode;
    private $shipcountry;

    public function __construct()
    {
        $this->order_id=0;
        $this->customerid=0;
        $this->employeeid=0;
        $this->orderdate=0;
        $this->requiredate=0;
        $this->shippeddata=0;
        $this->shivia='';
        $this->freight=0;
        $this->shipname='';
        $this->shiaddress='';
        $this->shipcity='';
        $this->shipregion='';
        $this->shippostalcode=0;
        $this->shipcountry='';

        
    }

    public function __destruct()
    {
        
    }

    public function get_order_id(){
        return $this->order_id;
    }
    public function  set_order_id($order_id)
    {
        $this->order_id=$order_id;
    }
    public function get_customerid(){
        return $this->customerid;
    }
    public function  set_customerid($customerid)
    {
        $this->customerid=$customerid;
    }
    public function get_employeeid(){
        return $this->employeeid;
    }
    public function  set_employeeid($employeeid)
    {
        $this->employeeid=$employeeid;
    }
    public function get_orderdate(){
        return $this->orderdate;
    }
    public function  set_orderdate($orderdate)
    {
        $this->orderdate=$orderdate;
    }
    public function get_requiredate(){
        return $this->requiredate;
    }
    public function  set_requiredate($requiredate)
    {
        $this->requiredate=$requiredate;
    }
    public function get_shippeddata(){
        return $this->shippeddata;
    }
    public function  set_shippeddata($shippeddata)
    {
        $this->shippeddata=$shippeddata;
    }
    public function get_shivia(){
        return $this->shivia;
    }
    public function  set_shivia($shivia)
    {
        $this->shivia=$shivia;
    }
    public function get_freight(){
        return $this->freight;
    }
    public function  set_freight($freight)
    {
        $this->freight=$freight;
    }
    public function get_shipname(){
        return $this->shipname;
    }
    public function  set_shipname($shipname)
    {
        $this->shipname=$shipname;
    }
    public function get_shiaddress(){
        return $this->shiaddress;
    }
    public function  set_shiaddress($shiaddress)
    {
        $this->shiaddress=$shiaddress;
    }
    public function get_shipcity(){
        return $this->shipcity;
    }
    public function  set_shipcity($shipcity)
    {
        $this->shipcity=$shipcity;
    }
    public function get_shipregion(){
        return $this->shipregion;
    }
    public function  set_shipregion($shipregion)
    {
        $this->shipregion=$shipregion;
    }
    public function get_shippostalcode(){
        return $this->shippostalcode;
    }
    public function  set_shippostalcode($shippostalcode)
    {
        $this->shippostalcode=$shippostalcode;
    }
    public function get_shipcountry(){
        return $this->shipcountry;
    }
    public function  set_shipcountry($shipcountry)
    {
        $this->shipcountry=$shipcountry;
    }
    public function get_by_order_id($order_id=''){

        if($order_id!=''):
            $this->query="SELECT orderid,customerid,employeeid,
            shipperid ,
            orderdate ,
            requireddate,
            shippeddate ,
            shipvia ,
            freight ,
            shipname ,
            shipaddress ,
            shipcity ,
            shipregion ,
            shippostal_code ,
            shipcountry 
        FROM orders        
        where orderid='$order_id';";
            $this->get_results_from_query();
        endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif; 

    }
    public function insert(){

        
        $this->query="INSERT INTO orders(customerid,employeeid,
        shipperid ,    orderdate ,
        requireddate,   shippeddate ,
        shipvia ,    freight ,
        shipname ,    shipaddress ,
        shipcity ,    shipregion ,
        shippostal_code ,
        shipcountry )
        VALUES('$this->customerid','$this->employeeid','$this->shipperid','$this->orderdate','$this->requireddate','$this->shippeddate','$this->shipvia','$this->freight','$this->shipname','$this->shipaddress','$this->shipcity','$this->shipregion','$this->shippostalcode','$this->shipcountry');";
        $this->execute_single_query();

    }
    public function get_datos_orders($_P){

        $this->customerid=$_P['customerid'];
        $this->employeeid=$_P['employeeid'];
        $this->shipperid=$_P['shipperid'];
        $this->orderdate=$_P['orderdate'];
        $this->requireddate=$_P['requireddate'];
        $this->shippeddate=$_P['shippeddate'];
        $this->shipvia=$_P['shipvia'];
        $this->freight=$_P['freight'];
        $this->shipname=$_P['shipname'];
        $this->shipaddress=$_P['shipaddress'];
        $this->shipcity=$_P['shipcity'];
        $this->shipregion=$_P['shipregion'];
        $this->shippostalcode=$_P['shippostal_code'];
        $this->shipcountry=$_P['shipcountry'];
      
        $this->insert();

    }
    public function form_nuevo_orders(){

        $sql='SELECT customerid,companyname
            from customers';
        $combo=$this->get_combo_box_all($sql,"companyname","customerid","customerid");

        $sql='SELECT employeeid,lastname
        from employees';
        $combo1=$this->get_combo_box_all($sql,"lastname","employeeid","employeeid");

        $sql='SELECT shipperid,companyname
        from shippers';
        $combo2=$this->get_combo_box_all($sql,"companyname","shipperid","shipperid");


        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='registrar_orders' enctype='multipart/form-data'
        action='handler_orders.php?pag=registrar_orders'
        method='POST'>
		<fieldset>
		<legend>Registrar Orden</legend>
    
    <div>
        <label for='order'>Cliente</label>
        $combo
        
    </div>
        <div>
        <label for='order'>Empleado</label>
        $combo1
        
    </div>
    <div>
        <label for='order'>Cargador</label>
        $combo2
        
    </div>   
    <div>
        <label for='order'>Fecha de Orden</label>
        <input type='date' class='form-control' id='orderdate' name='orderdate'  required autofocus 
        placeholder='ingrese Fecha de Orden' /> 
    </div>    
    <div>
        <label for='order'>Fecha de Solicitud</label>
        <input type='date' class='form-control' id='requireddate' name='requireddate'  required autofocus 
        placeholder='ingrese Fecha de Solicitud'  /> 
    </div>
    <div>
        <label for='order'>Fecha de Envio</label>
        <input type='date' class='form-control' id='shippeddate' name='shippeddate'  required autofocus 
        placeholder='ingrese Fecha de Envio' /> 
    </div>
    <div>
        <label for='order'>Enbarcar Via</label>
        <input type='text' class='form-control' id='shipvia' name='shipvia'  required autofocus 
        placeholder='ingrese Enbarcar Via' /> 
    </div>
    <div>
        <label for='order'>Carga</label>
        <input type='text' class='form-control' id='freight' name='freight'  required autofocus 
        placeholder='ingrese carga' /> 
    </div>
    <div>
        <label for='supli'>Nombre del Barco</label>
        <input type='text' class='form-control' id='shipname' name='shipname' 
            required autofocus 
                placeholder='ingrese Nombre del Barco' /> 
    </div>

    <div>
        <label for='supli'>Direccion de Barco</label>
        <input type='text' class='form-control' id='shipaddress' name='shipaddress' 
            required autofocus 
                placeholder='ingrese Direccion de Barco' /> 
    </div>

    <div>
        <label for='supli'>Ciudad del Barco</label>
        <input type='text' class='form-control' id='shipcity' name='shipcity' 
            required autofocus 
                placeholder='ingrese Ciudad del Barco' /> 
    </div>
    <div>
        <label for='order'>Region de Barco</label>
        <input type='text' class='form-control' id='shipregion' name='shipregion'  required autofocus 
        placeholder='ingrese Region del Barco' /> 
    </div>
    <div>
        <label for='order'>Codigo Postal del Barco</label>
        <input type='text' class='form-control' id='shippostal_code' name='shippostal_code'  required autofocus 
        placeholder='ingrese Codigo Postal del Barco' /> 
    </div>
    <div>
        <label for='order'>Pais del barco</label>
        <input type='text' class='form-control'  placeholder='Ingrese Pais del Barco' id='shipcountry' name='shipcountry'  required autofocus  /> 
    </div>                                   
    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='registrar_orders' value='Registrar Orden' />
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
    public function update(){
        $this->query="UPDATE orders set
            customerid='$this->customerid',
            employeeid ='$this->employeeid',
            shipperid ='$this->shipperid',
            orderdate='$this->orderdate',
            requireddate ='$this->requireddate',
            shippeddate ='$this->shippeddate',
            shipvia ='$this->shipvia',
            freight ='$this->freight',
            shipname='$this->shipname',
            shipaddress='$this->shipaddress',
            shipcity ='$this->shipcity',
            shipregion ='$this->shipregion',
            shippostal_code ='$this->shippostalcode',
            shipcountry ='$this->shipcountry'
            where orderid='$this->order_id';";
        $this->execute_single_query();
    }
    public function get_datos_modificar_orders($_P){
   

        $this->order_id=$_P['orderid'];
        $this->customerid=$_P['customerid'];
        $this->employeeid=$_P['employeeid'];
        $this->shipperid=$_P['shipperid'];
        $this->orderdate=$_P['orderdate'];
        $this->requireddate=$_P['requireddate'];
        $this->shippeddate=$_P['shippeddate'];
        $this->shipvia=$_P['shipvia'];
        $this->freight=$_P['freight'];
        $this->shipname=$_P['shipname'];
        $this->shipaddress=$_P['shipaddress'];
        $this->shipcity=$_P['shipcity'];
        $this->shipregion=$_P['shipregion'];
        $this->shippostalcode=$_P['shippostal_code'];
        $this->shipcountry=$_P['shipcountry'];
        $this->update();
    
    }
    public function form_modificar_orders(){

        $sql='SELECT customerid,companyname
            from customers';
        $combo=$this->get_combo_box_all($sql,"companyname","customerid","customerid");

        $sql='SELECT employeeid,lastname
        from employees';
        $combo1=$this->get_combo_box_all($sql,"lastname","employeeid","employeeid");

        $sql='SELECT shipperid,companyname
        from shippers';
        $combo2=$this->get_combo_box_all($sql,"companyname","shipperid","shipperid");


        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='modificar_orders' enctype='multipart/form-data'
        action='handler_orders.php?pag=modificar_orders'
        method='POST'>
		<fieldset>
		<legend>Modificar Orden</legend>
    <div>
        <label for='order'>I.D ORDEN</label>
        <input type='text' class='form-control' value='$this->orderid' id='orderid' name='orderid'  required autofocus readonly='readonly' /> 
    </div>  
    <div>
        <label for='order'>Cliente</label>
        $combo
        
    </div>
        <div>
        <label for='order'>Empleado</label>
        $combo1
        
    </div>
    <div>
        <label for='order'>Cargador</label>
        $combo2
        
    </div>   
    <div>
        <label for='order'>Fecha de Orden</label>
        <input type='date' class='form-control' value='$this->orderdate' id='orderdate' name='orderdate'  required autofocus 
        placeholder='ingrese Fecha de Orden' /> 
    </div>    
    <div>
        <label for='order'>Fecha de Solicitud</label>
        <input type='date' class='form-control' value='$this->requireddate' id='requireddate' name='requireddate'  required autofocus 
        placeholder='ingrese Fecha de Solicitud'  /> 
    </div>
    <div>
        <label for='order'>Fecha de Envio</label>
        <input type='date' class='form-control'  value='$this->shippeddate' id='shippeddate' name='shippeddate'  required autofocus 
        placeholder='ingrese Fecha de Envio' /> 
    </div>
    <div>
        <label for='order'>Enbarcar Via</label>
        <input type='text' class='form-control'     value='$this->shipvia' id='shipvia' name='shipvia'  required autofocus 
        placeholder='ingrese Enbarcar Via' /> 
    </div>
    <div>
        <label for='order'>Carga</label>
        <input type='text' class='form-control' value='$this->freight' id='freight' name='freight'  required autofocus 
        placeholder='ingrese carga' /> 
    </div>
    <div>
        <label for='supli'>Nombre del Barco</label>
        <input type='text' class='form-control'  value='$this->shipname' id='shipname' name='shipname' 
            required autofocus 
                placeholder='ingrese Nombre del Barco' /> 
    </div>

    <div>
        <label for='supli'>Direccion de Barco</label>
        <input type='text' class='form-control'  value='$this->shipaddress' id='shipaddress' name='shipaddress' 
            required autofocus 
                placeholder='ingrese Direccion de Barco' /> 
    </div>

    <div>
        <label for='supli'>Ciudad del Barco</label>
        <input type='text' class='form-control' value='$this->shipcity' id='shipcity' name='shipcity' 
            required autofocus 
                placeholder='ingrese Ciudad del Barco' /> 
    </div>
    <div>
        <label for='order'>Region de Barco</label>
        <input type='text' class='form-control' value='$this->shipregion' id='shipregion' name='shipregion'  required autofocus 
        placeholder='ingrese Region del Barco' /> 
    </div>
    <div>
        <label for='order'>Codigo Postal del Barco</label>
        <input type='text' class='form-control' value='$this->shippostal_code' id='shippostal_code' name='shippostal_code'  required autofocus 
        placeholder='ingrese Codigo Postal del Barco' /> 
    </div>
    <div>
        <label for='order'>Pais del barco</label>
        <input type='text' class='form-control'  placeholder='Ingrese Pais del Barco' value='$this->shipcountry' id='shipcountry' name='shipcountry'  required autofocus  /> 
    </div>                                   
    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='modificar_orders' value='Modificar Orden' />
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
        $this->query="delete from orders 
        where orderid='$this->order_id';
        ";
        $this->execute_single_query();
        } 
    public function get_datos_eliminar_orders($_P)
    {
        $this->order_id=$_P['orderid'];
        $this->delete();
    }    
    public function form_eliminar_orders(){

        $sql='SELECT customerid,companyname
            from customers';
        $combo=$this->get_combo_box_all($sql,"companyname","customerid","customerid");

        $sql='SELECT employeeid,lastname
        from employees';
        $combo1=$this->get_combo_box_all($sql,"lastname","employeeid","employeeid");

        $sql='SELECT shipperid,companyname
        from shippers';
        $combo2=$this->get_combo_box_all($sql,"companyname","shipperid","shipperid");


        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='eliminar_orders' enctype='multipart/form-data'
        action='handler_orders.php?pag=eliminar_orders'
        method='POST'>
		<fieldset>
		<legend>Eliminar Orden</legend>
    
    <div>
        <label for='order'>I.D ORDEN</label>
        <input type='text' class='form-control' value='$this->orderid' id='orderid' name='orderid'  required autofocus readonly='readonly' /> 
    </div>     
    <br/>                    
    <div>
        <input type='hidden' name='orderid' id='orderid' value='$this->orderid'/>
        <input type='submit' name='eliminar_orders' value='Eliminar Orden' />
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

    $sql="SELECT u.orderid,cus.companyname AS customerid,em.lastname AS employeeid,
    shi.companyname AS shipperid,
    u.orderdate ,
    u.requireddate,
    u.shippeddate ,
    u.shipvia ,
    u.freight ,
    u.shipname ,
    u.shipaddress ,
    u.shipcity ,
    u.shipregion ,
    u.shippostal_code ,
    u.shipcountry 
    FROM orders u
    INNER JOIN employees em
    ON(u.employeeid=em.employeeid)
    INNER JOIN shippers shi
    ON(u.shipperid=shi.shipperid)
    INNER JOIN customers cus
    ON(u.customerid=cus.customerid);";

    $cab="
    <h1>Administrador de Orden</h1>
    <a href='handler_orders.php?pag=form_nuevo_orders'
    class='btn btn-success'>
    <span class='glyphicon glyphicon-plus'
     aria-hidden='true'></span> Nueva Orden</a>
     <br/>
    <table class='table'>
           <tr><th>I.D Orden</th>
           <th>Cliente</th>
           <th>Empleado</th>
           <th>Cargador</th>
           <th>Fecha de Orden</th>
           <th>Fecha de Solicitud</th>
           <th>Fecha de Envio</th>
           <th>Enbarcar Via</th>
           <th>Carga</th>
           <th>Nombre del Barco</th>
           <th>Direccion de Barco</th>
           <th>Ciudad del Barco</th>
           <th>Region de Barco</th>
           <th>Codigo Postal del Barco</th>
           <th>Pais del barco</th>
           <th></th>
           <th></th></tr>
    ";
    
        $cuerpo="";
        
        $result=$this->get_results_from_query2($sql);
        while ($filas = $result->fetch_assoc()){

             $order_id=$filas['orderid'];
             $customerid=$filas['customerid'];
             $employeeid=$filas['employeeid'];
             $shipperid=$filas['shipperid'];
             $orderdate=$filas['orderdate'];
             $requiredate=$filas['requireddate'];
             $shippeddata=$filas['shippeddate'];
             $shivia=$filas['shipvia'];
             $freight=$filas['freight'];
             $shipname=$filas['shipname'];
             $shiaddress=$filas['shipaddress'];
             $shipcity=$filas['shipcity'];
             $shipregion=$filas['shipregion'];
             $shippostalcode=$filas['shippostal_code'];
             $shipcountry=$filas['shipcountry'];
            $cuerpo=$cuerpo."<tr>
                
    <td>$order_id</td>
    <td>$customerid</td>
    <td>$employeeid</td>
    <td>$shipperid</td>
    <td>$orderdate</td>
    <td>$requiredate</td>
    <td>$shippeddata</td>
    <td>$shivia</td>
    <td>$freight</td>
    <td>$shipname</td>

    <td>$shiaddress</td>
    <td>$shipcity</td>
    <td>$shipregion</td>
    <td>$shippostalcode</td>
    <td>$shipcountry</td>
       
       

    <td><a class='btn btn-warning'
    href='handler_orders.php?pag=form_modificar_orders&orderid=$order_id'>
    <span class='glyphicon glyphicon-pencil'
     aria-hidden='true'></span> 
    MODIFICAR</a></td>
    <td><a class='btn btn-danger'
    href='handler_orders.php?pag=form_eliminar_orders&orderid=$order_id'>
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