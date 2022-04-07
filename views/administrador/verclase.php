
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?=base_url?>"><img class="mt-4" src="<?=base_url?>assets/img/logolaavuela.png" width="100"></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 text-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end text-right" aria-labelledby="navbarDropdown">
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
                        <h1 class="mt-4">Alumnos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel de Administrador </li>
                            
                        </ol>
                        
                   
                        <div id="layoutSidenav_content">
                     <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               <strong> ALUMNOS</strong>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="p-2 m-2">ALUMNO</th>
                                            <th class="p-2 m-2">ULTIMO PAGO</th>
                                            <th class="p-2 m-2">FECHA INSCRIPCION</th>
                                            <th class="p-2 m-2">CUOTAS PAGADAS</th>
                                            <th class="p-2 m-2">ACCION</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th class="p-2 m-2">ALUMNO</th>
                                        <th class="p-2 m-2">ULTIMO PAGO</th>
                                        <th class="p-2 m-2">FECHA INSCRIPCION</th>
                                        <th class="p-2 m-2">CUOTAS PAGADAS</th>
                                        <th class="p-2 m-2">ACCION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                   
                <?php if(isset($alumnos)):?>
                    <?php foreach($alumnos as $alumno):?>
                        
                                        <tr class="my-2 text-center blockquote">
                                            <td><?php echo $alumno['nombre'];?></td>
                                            <td><?php echo $alumno['ultimo_pago'];?></td>
                                            <td><?php echo $alumno['fecha_inscripcion'];?></td>
                                            <td><?php echo $alumno['cuotas'];?></td>
                                            <td> <a class="btn btn-danger w-100" href="<?=base_url?>administrador/borraralumno&clase=<?=$alumno['claseid'];?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a> </td>


                                          
                                        </tr>
                     <?php endforeach;?>
            
                <?php endif;?>
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <button data-toggle="modal" data-target="#editarmodal" type="button" id="editarbtn" class="h4 mb-0 text-white btn text-uppercase d-inline-block"></button>

<!-- Modal  editar alumno-->
<div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
 <div class="modal-header">
   <h5 class="modal-title" id="exampleModalLabel">EDITAR ALUMNO</h5>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
 <form   action="<?=base_url?>alumno/editaralumno" method="POST">

 <div class="modal-body">
     <input type="hidden" id="editarid" name="editarid">
       <label for="nombre" >NOMBRE</label>
       <input type="text" class="form-control my-1" id="editarnombre" min="8" name="nombre" required placeholder="Nombre del alumno" >
       <label for="fecha_nacimiento">FECHA NACIMIENTO</label>
       <input type="date"  class="form-control my-1" name="fecha_nacimiento" id="editarfecha_nacimiento" required placeholder="Seleccione la fecha de nacimiento" >
       <label  >CORREO</label>
       <input type="email" class="form-control my-1" id="editaremail" min="8" name="email" required placeholder="Correo del alumno" >
       <label  >DNI</label>
       <input type="text" class="form-control my-1" id="editardni" min="8" name="dni" required placeholder="DNI del alumno" >
       
       <label  >TELEFONO</label>
       <input type="tel" class="form-control my-1" id="editartelefono" min="8" name="telefono" required placeholder="Telefono del alumno" >
       
     
       <label>ESTADO</label>
             <input class="form-check-input mt-1 ml-1 d-inline-block" type="radio" required  name="estado" id="alumnoactivo"  value="activo" >
             <label class="form-check-label ml-4 d-inline-block text-dark" >
             Activo
             </label>
       
            <input class="form-check-input mt-1 ml-1  d-inline-block " type="radio"  required name="estado" id="alumnodesactivo" value="desactivado">
             <label class="form-check-label ml-4 d-inline-block ml-1 text-dark" >
              Inactivo
             </label>
             <br>
             <label >FECHA INSCRIPCIÓN</label>
            <input type="date"  class="form-control my-1" name="fecha_inscripcion" id="editarfecha_inscripcion" required placeholder="Seleccione la fecha de inscripción" >
       
 </div>
 <div class="modal-footer">
   <button type="submit" class="btn btn-primary mr-1 mb-1" style="background-color: #fc8c04 !important;border-color: #fc8c04;">GUARDAR ALUMNO</button>
 </div>
</form>

</div>
        </div>
      </div>


      <!--SCRIPT PARA     EDITAR ALUMNO
                -->
                <script type="text/javascript">
					function editaralumno(id,nombre,ultimo_pago,estado,fecha_inscripcion,fecha_nacimiento,email,telefono,dni,estado){
                        document.getElementById("editarid").value=id 
                        document.getElementById("editarnombre").value=nombre
                        document.getElementById("editarfecha_nacimiento").value=fecha_nacimiento
                        document.getElementById("editarfecha_inscripcion").value=fecha_inscripcion
                        document.getElementById("editaremail").value=email
                        document.getElementById("editartelefono").value=telefono
                        document.getElementById("editardni").value=dni
                        if(estado=='activo'){
                            document.getElementById("alumnoactivo").checked=true;
                        }
                        else if(estado=='desactivado'){
                            document.getElementById("alumnodesactivo").checked=true;
                        }
        

                        document.getElementById("editarbtn").click()

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
            <label for="email" >CORREO</label>  
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <input type="email" class="form-control my-1" required  name="email"  placeholder="email del alumno" required>

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
            <label >DNI</label>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <input type="text"  class="form-control my-1" required   name="dni" pattern="[0-9]{8}"  placeholder="Ingrese el dni" >

            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-left">
            <label >TELEFONO</label>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <input type="tel"  class="form-control my-1" required   name="telefono"   placeholder="Ingrese telefono del alumno" >

            </div>
        </div>
        </div>
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" style="background-color: #fc8c04 !important;border: #fc8c04 !important;">Inscribir Alumno</button>
    </div>
</form>

  </div>
</div>

</div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>