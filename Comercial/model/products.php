<?php

require_once('DBAbstract.php');
class productos extends DBAbstract
{
    private $product_id;
    private $productname;
    private $supplierid;
    private $categoryid;
    private $quantityperunit;
    private $unitprice;
    private $unitsinstock;
    private $unitsonorder;
    private $reorderlevel;
    private $discontinued;

    public function __construct()
    {
        $this->product_id=0;
        $this->productname='';
        $this->supplierid=0;
        $this->categoryid=0;
        $this->quantityperunit=0;
        $this->unitprice=0;
        $this->unitsinstock=0;
        $this->unitsonorder=0;
        $this->reorderlevel=0;
        $this->discontinued='';
        
    }
    public function __destruct()
    {
        
    }

    public function get_product_id(){
        return $this->product_id;
    }
    public function set_product_id($product_id){
            $this->product_id=$product_id;
    }
    public function get_productname(){
        return $this->productname;
    }
    public function set_productname($productname){
            $this->productname=$productname;
    }
    public function get_supplierid(){
        return $this->supplierid;
    }
    public function set_supplierid($supplierid){
            $this->supplierid=$supplierid;
    }
    public function get_categoryid(){
        return $this->categoryid;
    }
    public function set_categoryid($categoryid){
            $this->categoryid=$categoryid;
    }
    public function get_quantityperunit(){
        return $this->quantityperunit;
    }
    public function set_quantityperunit($quantityperunit){
            $this->quantityperunit=$quantityperunit;
    }
    public function get_unitprice(){
        return $this->unitprice;
    }
    public function set_unitprice($unitprice){
            $this->unitprice=$unitprice;
    }
    public function get_unitsinstock(){
        return $this->unitsinstock;
    }
    public function set_unitsinstock($unitsinstock){
            $this->unitsinstock=$unitsinstock;
    }
    public function get_unitsonorder(){
        return $this->unitsonorder;
    }
    public function set_unitsonorder($unitsonorder){
            $this->unitsonorder=$unitsonorder;
    }
    public function get_reorderlevel(){
        return $this->reorderlevel;
    }
    public function set_reorderlevel($reorderlevel){
            $this->reorderlevel=$reorderlevel;
    }
    public function get_discontinued(){
        return $this->discontinued;
    }
    public function set_discontinued($discontinued){
            $this->discontinued=$discontinued;
    }
    public function get_by_product_id($product_id=''){

        if($product_id!=''):
            $this->query="SELECT productid,
            productname ,suplierid ,categoryid ,
            quantityperunit ,unitprice ,
            unitsinstock,unitsinorder ,reorderlevel ,
            discontinued
            FROM products
                    where productid='$product_id';";
            $this->get_results_from_query();
        endif;
		if(count($this->rows) == 1):
			foreach ($this->rows[0] as $propiedad=>$valor):
			$this->$propiedad = $valor;
			endforeach;
		endif; 

    }
    public function insert(){

        
        $this->query="INSERT INTO products(
        productname ,suplierid ,categoryid ,
        quantityperunit ,unitprice ,
        unitsinstock,unitsinorder ,reorderlevel ,
        discontinued)
        VALUES('$this->productname','$this->supplierid','$this->categoryid','$this->quantityperunit','$this->unitprice','$this->unitsinstock','$this->unitsinorder','$this->reorderlevel','$this->discontinued');";
        $this->execute_single_query();

    }
    public function get_datos_products($_P){

        $this->productname=$_P['productname'];
        $this->supplierid=$_P['suppliersid'];
        $this->categoryid=$_P['categoryid'];
        $this->quantityperunit=$_P['quantityperunit'];
        $this->unitprice=$_P['unitprice'];
        $this->unitsinstock=$_P['unitsinstock'];
        $this->unitsinorder=$_P['unitsinorder'];
        $this->reorderlevel=$_P['reorderlevel'];
        $this->discontinued=$_P['discontinued'];
      
        $this->insert();

    }
    public function form_nuevo_products(){

        $sql='SELECT suppliersid,companyname 
        FROM SUPPLIERS;';

        $combo =$this->get_combo_box_all($sql,"companyname","suppliersid","suppliersid");

        $sql='SELECT categoryid,categoryname
        FROM categories;';

        $combo1 =$this->get_combo_box_all($sql,"categoryname","categoryid","categoryid");
        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='registrar_products' enctype='multipart/form-data'
        action='handler_products.php?pag=registrar_products'
        method='POST'>
		<fieldset>
		<legend>Registrar Producto</legend>
    
    <div>
        <label for='employ'>Nombre de Producto</label>
        <input type='text' class='form-control' id='productname' name='productname'  required autofocus 
        placeholder='ingrese Producto' /> 
    </div>
    <div>
        <label for='employ'>I.D Proveedor</label>
        $combo
    </div>
    <div>
        <label for='employ'>I.D Categoria</label>
        $combo1
    </div>   
    <div>
        <label for='employ'>Cantidad por unidad</label>
        <input type='text' class='form-control' id='quantityperunit' name='quantityperunit'  required autofocus 
        placeholder='ingrese Cantidad por unidad' /> 
    </div>    
    <div>
        <label for='employ'>Precio Unitario</label>
        <input type='text' class='form-control' id='unitprice' name='unitprice'  required autofocus 
        placeholder='ingrese Precio Unitario'  /> 
    </div>
    <div>
        <label for='employ'>Unidades en stock</label>
        <input type='text' class='form-control' id='unitsinstock' name='unitsinstock'  required autofocus 
        placeholder='ingrese Unidades en stock' /> 
    </div>
    <div>
        <label for='employ'>Unidades en Orden</label>
        <input type='text' class='form-control' id='unitsinorder' name='unitsinorder'  required autofocus 
        placeholder='ingrese Unidades en Orden' /> 
    </div>
    <div>
        <label for='employ'>Reordenar Nivel</label>
        <input type='text' class='form-control' id='reorderlevel' name='reorderlevel'  required autofocus 
        placeholder='ingrese Reordenar Nivel' /> 
    </div>
    <div>
        <label for='supli'>Interrumpida</label>
        <input type='text' class='form-control' id='discontinued' name='discontinued' 
            required autofocus 
                placeholder='ingrese Interrumpida' /> 
    </div>

    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='registrar_products' value='Registrar Producto' />
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
        $this->query="UPDATE products set
            productname='$this->productname',
            suplierid ='$this->suplierid',
            categoryid ='$this->categoryid',
            quantityperunit='$this->quantityperunit',
            unitprice ='$this->unitprice',
            unitsinstock ='$this->unitsinstock',
            unitsinorder ='$this->unitsinorder',
            reorderlevel ='$this->reorderlevel',
            discontinued='$this->discontinued'
            where productid='$this->product_id';";
        $this->execute_single_query();
    }
    public function get_datos_modificar_products($_P){
   

        $this->product_id=$_P['productid'];
        $this->productname=$_P['productname'];
        $this->suplierid=$_P['suplierid'];
        $this->categoryid=$_P['categoryid'];
        $this->quantityperunit=$_P['quantityperunit'];
        $this->unitprice=$_P['unitprice'];
        $this->unitsinstock=$_P['unitsinstock'];
        $this->unitsinorder=$_P['unitsinorder'];
        $this->reorderlevel=$_P['reorderlevel'];
        $this->discontinued=$_P['discontinued'];
        $this->update();
    
    }
    public function form_modificar_products(){

        $sql='SELECT suppliersid ,companyname  as suplierid
        FROM SUPPLIERS;';

        $combo =$this->get_combo_box_all($sql,"suplierid","suppliersid","suplierid");

        $sql='SELECT categoryid,categoryname 
        FROM categories;';

        $combo1 =$this->get_combo_box_all($sql,"categoryname","categoryid","categoryid");
        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='modificar_products' enctype='multipart/form-data'
        action='handler_products.php?pag=modificar_products'
        method='POST'>
		<fieldset>
		<legend>Modificar Producto</legend>
    <div>
        <label for='employ'>I.D de Producto</label>
        <input type='text' class='form-control'  readonlu='readonly' value='$this->productid' id='productid' name='productid'  required autofocus 
        placeholder='ingrese Producto' /> 
    </div>
    <div>
        <label for='employ'>Nombre de Producto</label>
        <input type='text' class='form-control' value='$this->productname'  id='productname' name='productname'  required autofocus 
        placeholder='ingrese Producto' /> 
    </div>
    <div>
        <label for='employ'>I.D Proveedor</label>
        $combo
    </div>
    <div>
        <label for='employ'>I.D Categoria</label>
        $combo1
    </div>   
    <div>
        <label for='employ'>Cantidad por unidad</label>
        <input type='text' class='form-control'  value='$this->quantityperunit' id='quantityperunit' name='quantityperunit'  required autofocus 
        placeholder='ingrese Cantidad por unidad' /> 
    </div>    
    <div>
        <label for='employ'>Precio Unitario</label>
        <input type='text' class='form-control'    value='$this->unitprice'  id='unitprice' name='unitprice'  required autofocus 
        placeholder='ingrese Precio Unitario'  /> 
    </div>
    <div>
        <label for='employ'>Unidades en stock</label>
        <input type='text' class='form-control'  value='$this->unitsinstock'  id='unitsinstock' name='unitsinstock'  required autofocus 
        placeholder='ingrese Unidades en stock' /> 
    </div>
    <div>
        <label for='employ'>Unidades en Orden</label>
        <input type='text' class='form-control' value='$this->unitsinorder'  id='unitsinorder' name='unitsinorder'  required autofocus 
        placeholder='ingrese Unidades en Orden' /> 
    </div>
    <div>
        <label for='employ'>Reordenar Nivel</label>
        <input type='text' class='form-control'  value='$this->reorderlevel'   id='reorderlevel' name='reorderlevel'  required autofocus 
        placeholder='ingrese Reordenar Nivel' /> 
    </div>
    <div>
        <label for='supli'>Interrumpida</label>
        <input type='text' class='form-control'value='$this->discontinued' id='discontinued' name='discontinued' 
            required autofocus 
                placeholder='ingrese Interrumpida' /> 
    </div>

    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='modificar_products' value='Modificar Producto' />
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
        $this->query="delete from products 
        where productid='$this->product_id';
        ";
        $this->execute_single_query();
        } 
    public function get_datos_eliminar_products($_P)
    {
        $this->product_id=$_P['productid'];
        $this->delete();
    }    
    public function form_eliminar_products(){

        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='eliminar_products' enctype='multipart/form-data'
        action='handler_products.php?pag=eliminar_products'
        method='POST'>
		<fieldset>
		<legend>Eliminar Producto</legend>
   
    <div>
        <label for='employ'>Nombre de Producto</label>
        <input type='text' class='form-control' value='$this->productname'  id='productname' name='productname'  required autofocus 
        placeholder='ingrese Producto' /> 
    </div>
    <br/>
    <div>
        <input type='hidden' name='productid' id='productid' value='$this->productid'/>
        <input type='submit' name='eliminar_products' value='Eliminar Producto' />
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

        $sql="SELECT u.productid ,
        u.productname ,
        sp.companyname AS suplierid,
        ca.categoryname AS categoryid,
        u.quantityperunit ,
        u.unitprice ,
        u.unitsinstock,
        u.unitsinorder ,
        u.reorderlevel ,
        u.discontinued
        FROM products u
        INNER JOIN suppliers sp
        ON (u.suplierid=sp.suppliersid)
        INNER JOIN categories ca
        ON (u.categoryid=ca.categoryid);";
    
        $cab="
        <h1>Administrador de Productos</h1>
        <a href='handler_products.php?pag=form_nuevo_products'
        class='btn btn-success'>
        <span class='glyphicon glyphicon-plus'
         aria-hidden='true'></span> Nuevo Producto</a>
         <br/>
        <table class='table'>
               <tr><th>I.D Producto</th>
               <th>Nombre de Producto</th>
               <th>Proveedor</th>
               <th>Categoria</th>
               <th>Precio Por Unitario</th>
               <th>Precio Unitario</th>
               <th>Unidades en Stock</th>
               <th>Unidades en Orden</th>
               <th>Reordenar Nivel</th>
               <th>Interrumpida</th>
               <th></th>
               <th></th></tr>
        ";
        
            $cuerpo="";
            
            $result=$this->get_results_from_query2($sql);
            while ($filas = $result->fetch_assoc()){
    
                 $product_id=$filas['productid'];
                 $productname=$filas['productname'];
                 $supplierid=$filas['suplierid'];
                 $categoryid=$filas['categoryid'];
                 $quantityperunit=$filas['quantityperunit'];
                 $unitprice=$filas['unitprice'];
                 $unitsinstock=$filas['unitsinstock'];
                 $unitsonorder=$filas['unitsinorder'];
                 $reorderlevel=$filas['reorderlevel'];
                 $discontinued=$filas['discontinued'];
                $cuerpo=$cuerpo."<tr>
                    
        <td>$product_id</td>
        <td>$productname</td>
        <td>$supplierid</td>
        <td>$categoryid</td>
        <td>$quantityperunit</td>
        <td>$unitprice</td>
        <td>$unitsinstock</td>
        <td>$unitsonorder</td>
        <td>$reorderlevel</td>
        <td>$discontinued</td>
           
    
        <td><a class='btn btn-warning'
        href='handler_products.php?pag=form_modificar_products&productid=$product_id'>
        <span class='glyphicon glyphicon-pencil'
         aria-hidden='true'></span> 
        MODIFICAR</a></td>
        <td><a class='btn btn-danger'
        href='handler_products.php?pag=form_eliminar_products&productid=$product_id'>
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