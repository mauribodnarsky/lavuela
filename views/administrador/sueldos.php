
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?=base_url?>"><img class="mt-4" src="<?=base_url?>assets/img/logolaavuela.png" width="100"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?=base_url?>usuario/logout">CERRAR SESIÓN</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">PANEL</div>
							<a class="nav-link"  href="<?=base_url?>administrador/movimientos">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                                MOVIMIENTOS
                            </a>
                            <a class="nav-link"  href="<?=base_url?>administrador/alumnos">
                                <div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
                                ALUMNOS
                            </a>
                            <a class="nav-link"  href="<?=base_url?>administrador/clases">
                                <div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
                                CLASES
                            </a>
                            <a class="nav-link"  href="<?=base_url?>administrador/cuotas">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                CUOTAS
                            </a>
                            <a class="nav-link"  href="<?=base_url?>administrador/sueldos">
                                <div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
                                SUELDOS
                            </a>
                            <a class="nav-link" href="<?=base_url?>usuario/logout">
                                <div class="sb-nav-link-icon"><i class="fas fa-copyright"></i></div>
                                CERRAR SESIÓN
                            </a>
                           
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        LA VUELA  
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">SUELDOS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel de Administrador </li>
                            
                        </ol>
                        
                        <div class="row">

                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-danger text-white mb-4" style="background-color: #fc8c04 !important;">
                                <button data-toggle="modal" class="btn btn-success" data-target="#nuevoprofesor" >+  PROFESOR</button>
                                </div>
                            </div>
                          
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               <strong> ALUMNOS</strong>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="text-center p-2 mx-2">NOMBRE</th>
                                            <th class="text-center p-2 mx-2">INSTRUMENTO</th>
                                            <th class="text-center p-2 mx-2">SUELDO <br> PROFESOR</th >
                                            <th class="text-center p-2 mx-2">SUELDO <br> ESCUELA</th>
                                            <th class="text-center p-2 mx-2">TOTAL</th>
                                            <th class="text-center p-2 mx-2">ACCIÓN</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th class="text-center p-2 mx-2">NOMBRE</th>
                                            <th class="text-center p-2 mx-2">INSTRUMENTO</th>
                                            <th class="text-center p-2 mx-2">SUELDO <br> PROFESOR</th >
                                            <th class="text-center p-2 mx-2">SUELDO <br> ESCUELA</th>
                                            <th class="text-center p-2 mx-2">TOTAL</th>
                                            <th class="text-center p-2 mx-2">ACCIÓN</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                
                <?php if(isset($sueldos)):?>
                    <?php foreach($sueldos as $sueldo):?>

                                        <tr class="my-2 text-center blockquote">
                                            <td><?php echo $sueldo['nombre'];?></td>
                                            <td><?php echo $sueldo['instrumento'];?></td>
                                            <td><?php echo $sueldo['profesor'];?></td>
                                            <td><?php echo $sueldo['escuela'];?></td>
                                            <?php $total=$sueldo['escuela']+$sueldo['profesor'];?>
                                            <td><?php echo $total;?></td>   
                                            <td>
                                                <?php echo "<button onclick=\"pagar('".$sueldo['nombre']."',".$sueldo['profesor'].")\" data-toggle=\"modal\" data-target=\"#pagar\" class=\" btn btn-success px-2 py-1 my-3 \"  style=\"border-radius:4px !important;\">" ;?>
                                                   PAGAR
                                            </button> 
                                              </td>
                                        </tr>
                     <?php endforeach;?>
            
                <?php endif;?>
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<!-- Modal  pagar sueldo-->
<div class="modal fade" id="pagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
 <div class="modal-header">
   <h5 class="modal-title" id="exampleModalLabel">PAGAR SUELDO</h5>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
 <form   action="<?=base_url?>administrador/pagarsueldo" method="POST">

 <div class="modal-body">
     <input type="hidden" id="profesor" name="profesor">
       <label  >PAGAR:</label>
       <input type="number" class="form-control my-1" id="sueldo" min="1" name="pago" required  >
     
       <label>POSNET</label>
             <input class="form-check-input mt-1 ml-1 d-inline-block" type="checkbox"  name="posnet"  >
                
 </div>
 <div class="modal-footer">
   <button type="submit" class="btn btn-primary mr-1 mb-1" style="background-color: #fc8c04 !important;border-color: #fc8c04;">CONFIRMAR PAGO</button>
 </div>
</form>

</div>
        </div>
      </div>


      <!--SCRIPT PARA     EDITAR ALUMNO
                -->
                <script type="text/javascript" >
					function pagar(id,sueldo){
                        console.log(sueldo)
                        document.getElementById("profesor").value=id 
                        document.getElementById("sueldo").value=sueldo
                        document.getElementById("pagar").click()

                    }
                    
					</script>
 <!--SCRIPT PARA     EDITAR EVENTO



                -->
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;La Vuela 2022</div>
                            <div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
           
            <!-- modal nuevo profesor -->
            <div class="modal fade" id="nuevoprofesor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">NUEVO PROFESOR</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                                 <form   action="<?=base_url?>administrador/registrarprofesor" method="POST">

                                    <div class="modal-body">
                                        <label for="profesor" >PROFESOR</label>
                                        <input type="text" class="form-control my-1" required min="5" name="profesor"  placeholder="Nombre del profesor" >
                                        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #fc8c04 !important;border: #fc8c04 !important;">Guardar Profesor</button>
                </div>
            </form>

            </div>
            </div>

</div>   

        
<!-- modal nuevo alumno -->
<div class="modal fade" id="nuevoalumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">NUEVO ALUMNO</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form   action="<?=base_url?>alumno/registrar" method="POST">

    <div class="modal-body">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <label for="nombre" >NOMBRE</label>  
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <input type="text" class="form-control my-1" required  name="nombre"  placeholder="Nombre completo del alumno" required pattern="[a-z A-Z]{8,50}" >

            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <label for="fecha" >FECHA DE NACIMIENTO</label>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <input type="date" class="form-control my-1" required  name="fecha_nacimiento"  placeholder="Seleccione la fecha" >

            </div>
        </div>
        <div class="row">
            <div class="col-12 text-left">
            <label for="categoria">DNI</label>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <input type="text"  class="form-control my-1" required   name="dni" pattern="[0-9]{8}"  placeholder="Ingrese el dni" >

            </div>
        </div>
        <div class="row">
            <div class="col-12"> 
          <label for="publicado">INSTRUMENTO</label>
            </div>
        </div>
        <?php foreach($instrumentos as $instrumento):?>
        <div class="row">
            <div class="col-2 text-right">
                        <input type="checkbox" name="instrumentos[]" value="<?php echo $instrumento['id'];?>">
            </div>
            <div class="col-10 text-left">
            <LABEl><?php echo $instrumento['instrumento'];?></LABEl>
            </div>
          
        </div>       
           <?php endforeach;?>
        </div>
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" style="background-color: #fc8c04 !important;border: #fc8c04 !important;">Inscribir Alumno</button>
    </div>
</form>

  </div>
</div>

</div>