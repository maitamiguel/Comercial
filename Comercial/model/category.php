<?php

    require_once('DBAbstract.php');
    class categoria extends DBAbstract
    {
        private $category_id;
        private $categoryname;
        private $description;
        private $picture;

     
        public function __construct()
        {
            $this->category_id=0;
            $this->categoryname='';
            $this->description='';
            $this->picture='';
        }
        public function __destruct()
        {
            
        }
        public function get_category_id(){
            return $this->category_id;
        }
        public function set_category_id($category_id){
            $this->category_id=$category_id;
        }

        public function get_categoryname(){
            return $this->categoryname;
        }
        public function set_categoryname($categoryname){
            $this->categoryname=$categoryname;
        }
        public function get_description(){
            return $this->description;
        }
        public function set_description($description){
            $this->description=$description;
        }
        public function get_by_category_id($category_id=''){

            if($category_id!=''):
                $this->query="SELECT categoryid,
                categoryname ,description ,picture 
                FROM categories
                        where categoryid='$category_id';";
                $this->get_results_from_query();
            endif;
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
                endforeach;
            endif; 
    
        }
        public function insert(){

        
            $this->query="INSERT INTO categories(
            categoryname ,description,picture)
            VALUES('$this->categoryname','$this->description','$this->picture');";
            $this->execute_single_query();
    
        }
        public function get_datos_category($_P){

            $this->categoryname=$_P['categoryname'];
            $this->description=$_P['description'];
            $img =  file_get_contents($_FILES['picture']['tmp_name']);
            $this->picture=base64_encode($img);
            $this->insert();
    
        }
        public function form_nuevo_category(){
            $form="
            
        <div class='row'>
            <div class='col-xs-4 col-md-2'>.</div>
            <div class='col-xs-10 col-md-8'>
            <div class='form-group'>
        <form name='registrar_category' enctype='multipart/form-data'
            action='handler_category.php?pag=registrar_category'
            method='POST'>
            <fieldset>
            <legend>Registrar Categoria</legend>
        
        <div>
            <label for='category'>Nombre de Categoria</label>
            <input type='text' class='form-control' id='categoryname' name='categoryname'  required autofocus 
            placeholder='ingrese Categoria' /> 
        </div>
            <div>
            <label for='category'>Descripcion</label>
            <input type='text' class='form-control' id='description' name='description'  required autofocus 
            placeholder='ingrese Descripcion' /> 
        </div>
    
        <div>
            <label for='employ'>Imagen</label>
            <input type='file' class='form-control' id='picture' name='picture'  required autofocus  /> 
        </div>                       
    
        <div>
            <br/>
            <input type='submit' class='btn btn-success' name='registrar_category' value='Registrar Categoria' />
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
        $this->query="UPDATE categories set
            categoryname='$this->categoryname',
            description ='$this->description',
            picture ='$this->picture'
            where categoryid='$this->category_id';";
        $this->execute_single_query();
    }
    public function get_datos_modificar_category($_P){
   

        $this->category_id=$_P['categoryid'];
        $this->categoryname=$_P['categoryname'];
        $this->description=$_P['description'];
        $img = file_get_contents($_FILES['picture']['tmp_name']);
        $this->picture=base64_encode($img);
        $this->update();
    
    }
    public function form_modificar_category(){
        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='modificar_category' enctype='multipart/form-data'
        action='handler_category.php?pag=modificar_category'
        method='POST'>
        <fieldset>
        <legend>Modificar Categoria</legend>
    <div>
        <label for='employ'>I.D. Categoria</label>
        <input type='text' class='form-control' value='$this->categoryid' id='categoryid' name='categoryid'  required autofocus readonly='readonly'
        placeholder='ingrese Categoria' /> 
    </div>
    <div>
        <label for='category'>Nombre de Categoria</label>
        <input type='text' class='form-control' value='$this->categoryname' id='categoryname' name='categoryname'  required autofocus 
        placeholder='ingrese Categoria' /> 
    </div>
        <div>
        <label for='category'>Descripcion</label>
        <input type='text' class='form-control' value='$this->description' id='description' name='description'  required autofocus 
        placeholder='ingrese Descripcion' /> 
    </div>

    <div>
        <label for='employ'>Imagen</label>
        <input type='file' class='form-control'  value='$this->picture' id='picture' name='picture'  required autofocus  /> 
    </div>                       

    <div>
        <br/>
        <input type='submit' class='btn btn-success' name='modificar_category' value='Modificar Categoria' />
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
        $this->query="delete from categories
            where categoryid='$this->category_id';
        ";
        $this->execute_single_query();
    }
    public function get_datos_eliminar_category($_P){
        $this->category_id=$_P['categoryid'];
        $this->delete();
    }
    public function form_eliminar_category(){
        $form="
        
    <div class='row'>
        <div class='col-xs-4 col-md-2'>.</div>
        <div class='col-xs-10 col-md-8'>
        <div class='form-group'>
    <form name='eliminar_category' enctype='multipart/form-data'
        action='handler_category.php?pag=eliminar_category'
        method='POST'>
        <fieldset>
        <legend>Eliminar Categoria</legend>
    <div>
        <label for='category'>Nombre de Categoria</label>
        <input type='text' class='form-control' value='$this->categoryname' id='categoryname' name='categoryname'  required autofocus 
        placeholder='ingrese Categoria' /> 
    </div>  
    <br/>                    
    <div>
        <input type='hidden' name='categoryid' id='categoryid' value='$this->categoryid'/>
        <input type='submit' name='eliminar_category' value='Eliminar Categoria' />
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

        $sql="SELECT categoryid ,
        categoryname     ,
        description ,
        picture
        FROM categories;";
    
        $cab="
        <h1>Administrador de Categorias</h1>
        <a href='handler_category.php?pag=form_nuevo_category'
        class='btn btn-success'>
        <span class='glyphicon glyphicon-plus'
         aria-hidden='true'></span> Nuevo Categoria</a>
         <br/>
        <table class='table'>
               <tr><th>I.D categoria</th>
               <th>Nombre Categoria</th>
               <th>Descripcion</th>
               <th>Imagen</th>
               
               
               <th></th>
               <th></th></tr>
        ";
        
            $cuerpo="";
            
            $result=$this->get_results_from_query2($sql);
            while ($filas = $result->fetch_assoc()){
    
                 $category_id=$filas['categoryid'];
                 $categoryname=$filas['categoryname'];
                 $description=$filas['description'];
                 $picture=$filas['picture'];
                 
    
                $cuerpo=$cuerpo."<tr>
                    
        <td>$category_id</td>
        <td>$categoryname</td>
        <td>$description</td>
       

           
        <td><img src='data:image/jpg;base64,$picture'; style='width: 100px;heigh:100px'></td>
    
        <td><a class='btn btn-warning'
        href='handler_category.php?pag=form_modificar_category&categoryid=$category_id'>
        <span class='glyphicon glyphicon-pencil'
         aria-hidden='true'></span> 
        MODIFICAR</a></td>
        <td><a class='btn btn-danger'
        href='handler_category.php?pag=form_eliminar_category&categoryid=$category_id'>
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