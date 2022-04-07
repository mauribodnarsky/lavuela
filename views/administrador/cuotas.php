
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
                        <h1 class="mt-4">Cuotas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel de Administrador </li>
                            
                        </ol>
                        
                        <div id="layoutSidenav_content">
                     <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               <strong> CUOTAS POR ALUMNO</strong>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                             <th class="p-2 m-2">CUOTAS</th>
                                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="p-2 m-2">CUOTAS</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                
                <?php if(isset($alumnos)):?>
                    <?php $vencidos=0;$aldia=0;$debenmesactual=0;?>
                    <?php foreach($alumnos as $alumno):?>

                                        <tr class="my-2 text-center blockquote">
                                            <td>
	<div class="row">
		<div class="col-sm-12">
		    <div class="coupon bg-white rounded mb-3 d-flex justify-content-between">
                <div class="kiri p-3">
                    <div class="icon-container ">
                        <div class="icon-container_box">
                        <h5 style="margin-top: 65% !important;margin-right:1rem; display: inline-block !important;color:#333132 !important;"><?= $alumno['instrumento'];?></h5>
                        </div>
                    </div>
                </div>
                <div class="tengah py-3 d-flex row w-100 justify-content-start">
                    <div>
                        <!--verificar estado -->
                        <?php 
                        $fechaactual=getdate();
                        $mesactual=$fechaactual['mon'];
                        $anoactual=$fechaactual['year'];
                        $diaactual=$fechaactual['mday'];
                        if($anoactual>$alumno['anovencimiento']){
                            $recargo=(($alumno['cuota']*20)/100);
                            $total=$recargo+$alumno['cuota'];
                            $estado="vencido";
                            $cuota=$alumno['cuota'];
                            $vencidos=$vencidos+1;
                            $detalle="<h3 class=\" text-bold\" >Valor cuota: $ ".$cuota."</h3>";
                            $detalle=$detalle."<h3 class=\" text-bold\" >Recargo(20%): $ ".$recargo."</h3>";
                            $detalle=$detalle."<h3 class=\" text-bold\" >Total: $ ".$total."</h3>";
                            
                        }
                        elseif($mesactual>$alumno['mesvencimiento'] && $anoactual==$alumno['anovencimiento']){
                            $recargo=(($alumno['cuota']*20)/100);
                            $total=$recargo+$alumno['cuota'];
                            $estado="vencido";
                            $cuota=$alumno['cuota'];
                            $vencidos=$vencidos+1;
                            $detalle="<h3 class=\" text-bold\" >Valor cuota: $ ".$cuota."</h3>";
                            $detalle=$detalle."<h3 class=\" text-bold\" >Recargo(20%): $ ".$recargo."</h3>";
                            $detalle=$detalle."<h3 class=\" text-bold\" >Total: $ ".$total."</h3>";
                        }
                        elseif($mesactual==$alumno['mesvencimiento'] && $anoactual==$alumno['anovencimiento'] && $diaactual>20){
                            $recargo=(($alumno['cuota']*20)/100);
                            $total=$recargo+$alumno['cuota'];
                            $estado="vencido";
                            $cuota=$alumno['cuota'];
                            $vencidos=$vencidos+1;
                            $detalle="<h3 class=\" text-bold\" >Valor cuota: $ ".$cuota."</h3>";
                            $detalle=$detalle."<h3 class=\" text-bold\" >Recargo(20%): $ ".$recargo."</h3>";
                            $detalle=$detalle."<h3 class=\" text-bold\" >Total: $ ".$total."</h3>";
                        }
                        
                        elseif($mesactual==$alumno['mesvencimiento'] && $anoactual==$alumno['anovencimiento'] && $diaactual<21){
                            $total=$alumno['cuota'];    
                            $estado="debe mes actual";
                            $debenmesactual=$debenmesactual+1;
                            $cuota=$alumno['cuota'];
                            $detalle="<h3 class=\" text-bold\" >Valor cuota: $ ".$cuota."</h3>";
                            $detalle=$detalle."<h3 class=\" text-bold\" >Total: $ ".$total."</h3>";
                        }
                        else{
                            $estado="al dia";
                            $aldia=$aldia+1;
                            $total=$alumno['cuota'];
                            $cuota=$alumno['cuota'];
                            $detalle="<h3 class=\" text-bold\" >Valor cuota: $ ".$cuota."</h3>";
                            $contador=0;
                            foreach($alumnos as $objeto){
                                if($alumno['idalumno']==$objeto['idalumno']){
                                    $contador=$contador+1;
                                }
                            }
                            if($contador>1){
                                $descuento=$total*0.10;
                                $detalle=$detalle."<h3 class=\" text-bold\" >Descuento(10%): $ ".$descuento."</h3>";
                               $total=$total-$descuento;
                                $detalle=$detalle."<h3 class=\" text-bold\" >Total: $ ".$total."</h3>";

                            }else{
                                $detalle=$detalle."<h3 class=\" text-bold\" >Total: $ ".$total."</h3>";

                            }
                            
                        }
                        ;?>
                        <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                            <h4 style="color: #01a9b4 !important;" class="text-center mb-0" id="alumno"><?= $alumno['nombre'];?></h4>

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                            <?php if($estado=="al dia"):?>
                            <span class="badge badge-success" id="estado"><?= $estado;?></span>
                            <?php endif;?>
                            <?php if($estado=="vencido"):?>
                            <span class="badge badge-danger " id="estado"><?= $estado;?></span>
                            <?php endif;?>
                            <?php if($estado=="debe mes actual"):?>
                            <span class="badge badge-warning" id="estado"><?= $estado;?></span>
                            <?php endif;?>
                            <h3 class="lead" id="clase"> <?= $detalle?> </h3>
                            </div>
                            
                        </div>
                     
                    </div>
                    </div>
                </div>
                <div class="kanan">
                    <div class="info m-3 d-flex align-items-center">
                        <div class="w-100">
                            <div class="block">
                            <?php if($alumno['cuotas_pagadas']==null){
                                $alumno['proximo_pago']=$alumno['mesinscripcion'];
                            }
                            ;?>
                                <span class="time font-weight-light">Ticket <?= $alumno['proximo_pago'];?></span>
                               <br> <span class="time font-weight-light"><?= "$".$total;?></span>
                            </div>
                            <form action="<?=base_url;?>alumno/pagarcuota" method="POST">
                            <input type="hidden" name="total" value="<?=$total;?>">
                            <input type="hidden" name="detalle" value="<?= ' '.$alumno['nombre'].' pagó '.$alumno['proximo_pago'].' de clase de '.$alumno['instrumento'];?>">
                            <input type="hidden" name="instrumento" value="<?=$alumno['idinstrumento'];?>">
                            <input type="hidden" name="alumno" value="<?=$alumno['idalumno'];?>">
                            <label>POSNET</label>
                            <input type="checkbox" name="posnet" class="check-form" >
                            <label>DESCUENTO(%)</label>
                            <input type="number" name="descuento" class="form-control" value="0" min="0" max="100" >
                            <button type="submit" class="mt-3 btn btn-sm btn-outline-danger btn-block" style="background-color: #fe2e31 !important;color:white">
                                PAGAR
                    </button>
                        </form>
                            
                        </div>
                    </div>
                </div>
            </div>
		</div>

	</div>
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
                <div style="width:25%;">
                <div class="row">
                            <div class="text-center col-12 text-white py-4 bg-success"> 
                                <th class="my-4"><?php echo "Alumnos al día: ".$aldia;?></th>

                            </div>
                            <div class="text-center col-12 text-white py-4 bg-danger ">
                                <th class="my-4"><?php echo "Alumnos adeudados: ".$vencidos;?></th>

                            </div>
                            <div class="text-center col-12 text-white py-4 bg-warning">
                                <th class="my-4"><?php echo "Alumnos que deben solo el mes actual: ".$debenmesactual;?></th>

                            </div>
                </div>
                           
            </div>
        </div>
           
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