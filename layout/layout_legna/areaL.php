
<aside class="">
  
   <center><h4>BUSQUEDA FILTRADA</h4></center>
      <form id="form_filtrar" method="get" action=" <?php echo BASE_URL?>listar/lista_filtrada ">
                <label>Tipo</label>
                
                <select class="form-control" name="tipo" id="tipo">
                	<option value="">..Seleccione..</option>
                	<option value="casa" <?php  if(isset($this->dato)){if($this->dato['tipo']=='casa'){echo 'selected=""';}} ?>>Casa</option>
                	<option value="apartamento" <?php  if(isset($this->dato)){if($this->dato['tipo']=='apartamento'){echo 'selected=""';}} ?> >apartamento</option>
                	<option value="cabana" <?php  if(isset($this->dato)){if($this->dato['tipo']=='cabana'){echo 'selected=""';}} ?>>Cabaña</option>
                	<option value="quinta" <?php  if(isset($this->dato)){if($this->dato['tipo']=='quinta'){echo 'selected=""';}} ?>>Quinta</option>
                	<option value="hacienda" <?php  if(isset($this->dato)){if($this->dato['tipo']=='hacienda'){echo 'selected=""';}} ?>>Hacienda</option>
                	<option value="villa" <?php  if(isset($this->dato)){if($this->dato['tipo']=='villa'){echo 'selected=""';}} ?>>villa</option>
                	<option value="chalet" <?php  if(isset($this->dato)){if($this->dato['tipo']=='chalet'){echo 'selected=""';}} ?>>chalet</option>
                	<option value="penthouse" <?php  if(isset($this->dato)){if($this->dato['tipo']=='penthouse'){echo 'selected=""';}} ?>>penthouse</option>
                	<option value="townhouse" <?php  if(isset($this->dato)){if($this->dato['tipo']=='townhouse'){echo 'selected=""';}} ?>>townhouse</option>

                </select>
        
     
                <label>condición</label>
                <select class="form-control" id="condicion" name="condicion">
                	<option value="">..Seleccione..</option>
                	<option value="venta" <?php  if(isset($this->dato)){if($this->dato['condicion']=='venta'){echo 'selected=""';}} ?>>Venta</option>
                	<option value="alquiler" <?php  if(isset($this->dato)){if($this->dato['condicion']=='alquiler'){echo 'selected=""';}} ?>>alquiler</option>
                	
                </select>
       
                <label>ubicación</label>
                <input id="donde" name="donde" type="text" value="<?php  if(isset($this->dato)){echo $this->dato['donde'];} ?>" class="form-control" id="exampleInputAmount" placeholder="estado-ciudad-localidad">
           
       
        
               
                <center><button type="submit" id="buscar" class="btn btn-primary btn-sm">buscar</button></center>
           
         
           </form>
</aside>