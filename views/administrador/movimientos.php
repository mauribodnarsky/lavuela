
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
                        <h1 class="mt-4">MOVIMIENTOS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Panel de Administrador </li>
                            
                        </ol>
                        <div class="row">
                        <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4" style="background-color: #01a9b4 !important;">
                                <?php $totalultimomesefectivo=$balanceefectivo['ingreso']-$balanceefectivo['egreso'];?>
                                    <div class="card-body text-center"><?php echo " EFECTIVO ".$balanceefectivo['mes'];?> : <br><strong><?php echo  "ingresos: $ ".$balanceefectivo['ingreso']."<br> Egresos:$".$balanceefectivo['egreso']."<br> Total:$".$totalultimomesefectivo;?></strong></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4" style="background-color: #01a9b4 !important;">
                                <?php $totalultimomesposnet=$balanceposnet['ingreso']-$balanceposnet['egreso'];?>
                                    <div class="card-body text-center"><?php echo " POSNET ".$balanceposnet['mes'];?> : <br><strong><?php echo  "ingresos: $ ".$balanceposnet['ingreso']."<br>Egresos $".$balanceposnet['egreso']."<br> Total:$".$totalultimomesposnet;?></strong></div>
                                 </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4" style="background-color: #01a9b4 !important;">
                                    <div class="card-body text-center"><?php echo "CAJA POSNET:";?> <strong><?php echo  "$ ".$posnet;?></strong></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4" style="background-color: #01a9b4 !important;">
                                    <div class="card-body text-center"><?php echo "CAJA EFECTIVO:";?> <strong><?php echo "$ ".$efectivo;?></strong></div>
                                </div>
                            </div>
                          
                           
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-danger text-white mb-4" style="background-color: #fc8c04 !important;">
                                    <button data-toggle="modal" class="btn btn-success" data-target="#nuevopago" >+ PAGAR</button>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-danger text-white mb-4" style="background-color: #fc8c04 !important;">
                                    <button data-toggle="modal" class="btn btn-success" data-target="#nuevocobro" >+ COBRAR</button>
                                </div>
                            </div>
                        </div>
                       
                        <div id="layoutSidenav_content">
                     <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               <strong>MOVIMIENTOS</strong>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th class="p-2 text-center m-2">DETALLE</th>
                                             <th class="p-2 text-center m-2">INGRESO</th>
                                             <th class="p-2 text-center m-2">EGRESO</th>
                                             <th class="p-2 text-center m-2">PAGO</th>
                                             <th class="p-2 text-center m-2">FECHA</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th class="p-2 text-center m-2">DETALLE</th>
                                        <th class="p-2 text-center m-2">INGRESO</th>
                                             <th class="p-2 text-center m-2">EGRESO</th>
                                             <th class="p-2 text-center m-2">PAGO</th>
                                             <th class="p-2 text-center m-2">FECHA</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                
                <?php if(isset($movimientos)):?>
                    <?php foreach($movimientos as $movimiento):?>

                                        <tr class="my-2 text-center blockquote">
                                        <td>
                                            <?= $movimiento['descripcion'];?>
                                            </td>
                                            <td>
                                            <?= $movimiento['ingreso'];?>
                                            </td>
                                            <td>
                                            <?= $movimiento['egreso'];?>
                                            </td>
                                            <td>
                                            <?= $movimiento['moneda'];?>
                                            </td>
                                            <td>
                                            <?= $movimiento['fecha'];?>
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
        </div>
           
            <!-- modal nuevo pago -->
            <div class="modal fade" id="nuevopago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">NUEVO PAGO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                                 <form   action="<?=base_url?>caja/guardarpago" method="POST">

                                    <div class="modal-body">
                                        <label class="mt-3">MONTO</label>
                                        <input type="number" class="form-control my-1" required min="1" name="monto"  placeholder="Monto..." >
                                        <label class="mt-3">DESCRIPCION</label>
                                        <input type="text" class="form-control my-1" required min="1" name="descripcion" placeholder="ingrese el cobrador">
                                        <label class="mt-3">POSNET</label>
                                        <input type="checkbox" class="check-control" value="POSNET" name="POSNET">
                                    </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #fc8c04 !important;border: #fc8c04 !important;">Pagar</button>
                </div>
            </form>

            </div>
            </div>
            </div>   
                 <!-- modal nuevo cobro -->
                 <div class="modal fade" id="nuevocobro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">NUEVO COBRO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                                 <form   action="<?=base_url?>caja/guardarcobro" method="POST">

                                    <div class="modal-body">
                                        <label class="mt-3">MONTO</label>
                                        <input type="number" class="form-control my-1" required min="1" name="monto"  placeholder="Monto..." >
                                        <label class="mt-3">DESCRIPCION</label>
                                        <input type="text" class="form-control my-1" required min="1" name="descripcion" placeholder="ingrese el cobrador">
                                        <label class="mt-3">POSNET</label>
                                        <input type="checkbox" class="check-control" value="POSNET" name="POSNET">
                                    </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="background-color: #fc8c04 !important;border: #fc8c04 !important;">Cobrar</button>
                </div>
            </form>

            </div>
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