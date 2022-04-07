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
                        <h1 class="mt-4">Clases</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel de Administrador </li>
                            
                        </ol>
                        
                        <div class="row">

                           
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-danger text-white mb-4" style="background-color: #fc8c04 !important;">
                                    <button data-toggle="modal" class="btn btn-success" data-target="#nuevoinstrumento" >+ CLASE</button>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-danger text-white mb-4" style="background-color: #ffcd00 !important;">
                                    <button data-toggle="modal" class="btn btn-success" style="background-color: #ffcd00 !important;border-color: #ffcd00 !important;" data-target="#nuevainscripcion">+ INSCRIBIR</button>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($mensaje)):?>
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-danger text-center h4"><?php echo $mensaje;?> </h1>
                            </div>
                        </div>
                        <?php endif;?>
                        <div id="layoutSidenav_content">
                     <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               <strong> CLASES</strong>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th class="text-center p-2 mx-2">INSTRUMENTO</th>
                                        <th class="text-center p-2 mx-2">PROFESOR</th>
                                            <th class="text-center p-2 mx-2">ALUMNOS</th>
                                            <th class="text-center p-2 mx-2">ACCION</th>
                                                                              
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th class="text-center p-2 mx-2">INSTRUMENTO</th>
                                        <th class="text-center p-2 mx-2">PROFESOR</th>
                                            <th class="text-center p-2 mx-2">ALUMNOS</th>
                                            <th class="text-center p-2 mx-2">ACCION</th>
                                            </tr>
                                    </tfoot>
                                    <tbody>
                
                <?php if(isset($clases)):?>
                    <?php foreach($clases as $clase):?>

                                        <tr class="my-2 text-center blockquote">
                                            <td><?= $clase['instrumento'];?> </td>
                                            <td><?= $clase['profesor'];?> </td>
                                            <td><?= $clase['alumnos'];?> </td>
                                            <td> <button onclick="editarcuota(<?= $clase['instrumentoid'].','.$clase['valorcuota'];?>)"  data-toggle="modal" class="btn w-100 btn-danger" data-target="#editarcuota" >ACTUALIZAR <br> CUOTA</button> <br> <a target="_blank" class="w-100 btn btn-success px-2 my-1" href="<?= base_url."administrador/verclase&profesor=".$clase['idprofesor']."&clase=".$clase['idinstrumento'];?>">VER ALUMNOS</a> </td>

                                        </tr>
                     <?php endforeach;?>
            
                <?php endif;?>
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
                   <!-- modal editar cuota -->
                   <div class="modal fade" id="editarcuota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR VALOR DE CUOTA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                                 <form   action="<?=base_url?>administrador/editarcuota" method="POST">

                                    <div class="modal-body">
                                        <input type="hidden" name="instrumento" id="cuotaeditar" >
                                        <label class="mt-3">VALOR CUOTA </label>
                                        <input type="number" class="form-control my-1" required id="cuotaeditarmonto" min="1" name="cuota"  placeholder="valor cuota..." >
                                        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #fc8c04 !important;border: #fc8c04 !important;">Cobrar</button>
                </div>
            </form>

            </div>
            </div>
            </div>   
<script type="text/javascript">
    function editarcuota(id,monto){
        document.getElementById("cuotaeditarmonto").value=monto
        document.getElementById("cuotaeditar").value=id
    }
</script>
            <!-- modal nuevo instrumento -->
            <div class="modal fade" id="nuevoinstrumento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">NUEVO INSTRUMENTO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                                 <form   action="<?=base_url?>administrador/crearinstrumento" method="POST">

                                    <div class="modal-body">
                                        <label for="instrumento" >INSTRUMENTO</label>
                                        <input type="text" class="form-control my-1" required min="5" name="instrumento"  placeholder="Nombre del instrumento" >
                                        <label for="cuota">CUOTA</label>
                                        <input type="number" class="form-control my-1" required min="1" name="cuota" placeholder="Valor cuota">
                                    </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #fc8c04 !important;border: #fc8c04 !important;">Guardar Instrumento</button>
                </div>
            </form>

            </div>
            </div>
            </div>   

            
          
        <style>
            .coupon .kanan {
    border-left: 1px dashed #ddd;
    width: 40% !important;
    position:relative;
}

.coupon .kanan .info::after, .coupon .kanan .info::before {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background: #dedede;
    border-radius: 100%;
}
.coupon .kanan .info::before {
    top: -10px;
    left: -10px;
}

.coupon .kanan .info::after {
    bottom: -10px;
    left: -10px;
}
.coupon .time {
    font-size: 1.6rem;
}
.kiri{
    background-color: #02abb0 !important;
}

.tengah{
    background-color: white !important;
    
}
.kanan{
    background-color: #fcca04 !important;
}
        </style>
<!-- modal nueva inscripcion -->
<div class="modal fade" id="nuevainscripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">NUEVA INSCRIPCIÓN A CLASE</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form   action="<?=base_url?>alumno/inscribir" method="POST">

    <div class="modal-body">
        
      
        <div class="row">
            <div class="col-12">
            <label >SELECCIONAR ALUMNO</label>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <select name="alumno"  class="form-select">
                    <?php foreach($alumnosformulario as $alumno):?>
                    <option value="<?=$alumno['id'];?>">
                        <?php echo$alumno['nombre'];?>
                    </option>
                    <?php endforeach;?>
                </select>
          
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-left">
            <label>SELECCIONE LA CLASE</label>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
        </div>
        <div class="row">
            <div class="col-12 text-left">
            <label>SELECCIONE EL PROFESOR</label>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <select name="profesor" class="form-select">
                <?php foreach($profesores as $profesor):?>
                    <option value="<?= $profesor['id'];?>"><?php echo $profesor['nombre'];?></option>
                <?php endforeach;?>
                </select>
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