<?php

require_once('DBAbstract.php');

class order_details extends DBAbstract 
{
    private $order_id;
    private $productid;
    private $unitprice;
    private $quantity;
    private $discount;

    public function __construct()
    {
        $this->order_id=0;
        $this->productid=0;
        $this->unitprice=0;
        $this->quantity=0;
        $this->discount='';
    }
    public function __destruct()
    {
        
    }
    public function get_order_id(){
        return $this->order_id;
    }
    public function set_order_id($order_id)
    {
        $this->order_id=$order_id;
    }
    public function get_productid(){
        return $this->productid;
    }
    public function set_productid($productid)
    {
        $this->productid=$productid;
    }
    public function get_unitprice(){
        return $this->unitprice;
    }
    public function set_unitprice($unitprice)
    {
        $this->unitprice=$unitprice;
    }
    public function get_quantity(){
        return $this->quantity;
    }
    public function set_quantity($quantity)
    {
        $this->quantity=$quantity;
    }
    public function get_discount(){
        return $this->discount;
    }
    public function set_discount($discount)
    {
        $this->discount=$discount;
    }
    public function get_by_orderda_id($order_id=''){

        if($order_id!=''):
            $this->query="SELECT orderid,
            productid ,unit_price ,quantity ,
            discount
            FROM ORDERDETAILS
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

        
        $this->query="INSERT INTO orderdetails(orderid,
            productid ,unit_price ,quantity ,
            discount)
        VALUES('$this->orderid','$this->productid','$this->unit_price','$this->quantity','$this->discount');";
        $this->execute_single_query();

    }
    public function get_datos_order($_P){

        $this->orderid=$_P['orderid'];
        $this->productid=$_P['productid'];
        $this->unit_price=$_P['unit_price'];
        $this->quantity=$_P['quantity'];
        $this->discount=$_P['discount'];
      
        $this->insert();
    }
    public function form_nuevo_order(){

        $sql='SELECT productid,productname 
        FROM products;';

        $combo =$this->get_combo_box_all($sql,"productname","productid","productid");

        $sql='SELECT orderid,customerid
        FROM orders;';

        $combo1 =$this->get_combo_box_all($sql,"customerid","orderid","orderid");
        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='registrar_order' enctype='multipart/form-data'
        action='handler_orders_details.php?pag=registrar_order'
        method='POST'>

		<fieldset>
		<legend>Registrar Detalles de Pedido</legend>
    
    <div>
        <label for='employ'>I.D Pedido</label>
        $combo1
    </div>
    <div>
        <label for='employ'>I.D Producto</label>
        $combo
    </div>

    <div>
        <label for='employ'>Precio Unitario</label>
        <input type='text' class='form-control' id='unit_price' name='unit_price'  required autofocus 
        placeholder='ingrese precio Unitario' /> 
    </div>    
    <div>
        <label for='employ'>Cantidad</label>
        <input type='text' class='form-control' id='quantity' name='quantity'  required autofocus 
        placeholder='ingrese Cantidad'  /> 
    </div>
    <div>
        <label for='employ'>Descuento</label>
        <input type='text' class='form-control' id='discount' name='discount'  required autofocus 
        placeholder='ingrese Descuento' /> 
    </div>

    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='registrar_order' value='Registrar Pedido' />
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
        $this->query="UPDATE orderdetails set
            productid ='$this->productid',
            unit_price ='$this->unit_price',
            quantity='$this->quantity',
            discount ='$this->discount'
            where orderid='$this->order_id';";
        $this->execute_single_query();
    }
    public function get_datos_modificar_order($_P){
   

        $this->order_id=$_P['orderid'];
        $this->productid=$_P['productid'];
        $this->unit_price=$_P['unit_price'];
        $this->quantity=$_P['quantity'];
        $this->discount=$_P['discount'];
        $this->update();
    
    }
    public function form_modificar_order(){

        $sql='SELECT productid,productname 
        FROM products;';

        $combo =$this->get_combo_box_all($sql,"productname","productid","productid");

        $sql='SELECT orderid,customerid
        FROM orders;';

        $combo1 =$this->get_combo_box_all($sql,"customerid","orderid","orderid");
        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='modificar_order' enctype='multipart/form-data'
        action='handler_orders_details.php?pag=modificar_order'
        method='POST'>
		<fieldset>
        <legend>Modificar Detalles de Pedido</legend>
    <div>
        <input type='hidden' class='form-control' value='$this->order_id' id='order_id' name='order_id'  required autofocus readonly='readonly'
        placeholder='ingrese I.D Pedido' /> 
    </div>   
    
    <div>
        <label for='employ'>I.D Pedido</label>
        $combo1
    </div>
    <div>
        <label for='employ'>I.D Producto</label>
        $combo
    </div>

    <div>
        <label for='employ'>Precio Unitario</label>
        <input type='text' class='form-control'value='$this->unit_price' id='unit_price' name='unit_price'  required autofocus 
        placeholder='ingrese precio Unitario' /> 
    </div>     
    <div>
        <label for='employ'>Cantidad</label>
        <input type='text' class='form-control' value='$this->quantity' id='quantity' name='quantity'  required autofocus 
        placeholder='ingrese Cantidad'  /> 
    </div>
    <div>
        <label for='employ'>Descuento</label>
        <input type='text' class='form-control' value='$this->discount' id='discount' name='discount'  required autofocus 
        placeholder='ingrese Descuento' /> 
    </div>

    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='modificar_order' value='Modificar Pedido' />
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
    $this->query="delete from orderdetails 
    where orderid='$this->order_id';
    ";
    $this->execute_single_query();
    } 
public function get_datos_eliminar_order($_P)
{
    $this->order_id=$_P['orderid'];
    $this->delete();
}    
public function form_eliminar_order(){

    $sql='SELECT productid,productname 
    FROM products;';

    $combo =$this->get_combo_box_all($sql,"productname","productid","productid");

    $sql='SELECT orderid,customerid
    FROM ORDERS;';

    $combo1 =$this->get_combo_box_all($sql,"customerid","orderid","orderid");
    $form="
    
<div class='row'>
    <div class='col-xs-4 col-md-2'>.</div>
    <div class='col-xs-10 col-md-8'>
    <div class='form-group'>
<form name='eliminar_order' enctype='multipart/form-data'
    action='handler_orders_details.php?pag=eliminar_order'
    method='POST'>
    <fieldset>
    <legend>Eliminar Detalles de Pedido</legend>

<div>
    <label for='employ'>I.D Pedido</label>
    $combo
</div>
<div>
    <label for='employ'>I.D Producto</label>
    $combo1
</div>

<br/>
<div>
        <input type='hidden' name='orderid' id='order_id' value='$this->orderid'/>
        <input type='submit' name='eliminar_order' value='Eliminar Pedido' />
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

    $sql="SELECT o.orderid,
    p.productname AS productid ,
    u.unit_price, 
    u.quantity,
    u.discount 
    FROM ORDERDETAILS u
    INNER JOIN products p
    ON (u.productid=p.productid)
    INNER JOIN ORDERS o
    ON(u.orderid=o.orderid);";

    $cab="
    <h1>Administrador de Pedidos</h1>
    <a href='handler_orders_details.php?pag=form_nuevo_order'
    class='btn btn-success'>
    <span class='glyphicon glyphicon-plus'
     aria-hidden='true'></span> Nuevo Pedido</a>
     <br/>
    <table class='table'>
           <tr><th>I.D Pedido</th>
           <th>I.D Producto</th>
           <th>Precio Unitario</th>
           <th>Cantidad</th>
           <th>Descuento</th>
           <th></th>
           <th></th></tr>
    ";
    
        $cuerpo="";
        
        $result=$this->get_results_from_query2($sql);
        while ($filas = $result->fetch_assoc()){

             $order_id=$filas['orderid'];
             $product_id=$filas['productid'];
             $unitprice=$filas['unit_price'];
             $quantity=$filas['quantity'];
             $discount=$filas['discount'];
            $cuerpo=$cuerpo."<tr>
          
     <td>$order_id</td>
    <td>$product_id</td>
    <td>$quantity</td>
    <td>$unitprice</td>
    <td>$discount</td>
       

    <td><a class='btn btn-warning'
    href='handler_orders_details.php?pag=form_modificar_order&orderid=$order_id'>
    <span class='glyphicon glyphicon-pencil'
     aria-hidden='true'></span> 
    MODIFICAR</a></td>
    <td><a class='btn btn-danger'
    href='handler_orders_details.php?pag=form_eliminar_order&orderid=$order_id'>
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