<?php require_once 'views/layout/header.php';?>

<div class="container-fluid">
    <div class="limiter " >
	<div class="container-login100" >

			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				
			<form class="login100-form validate-form flex-sb flex-w"  action="<?=base_url?>usuario/save" method="POST">				
			<span class="login100-form-title p-b-53  ">
                        <div class="row">
                            <div class="col-4 ">

                            </div>
                            <div class="col-4 text-center" id="amarillo">
                                <img src="<?=base_url?>assets/img/avatars.png" class="w-100">

                            </div>
                            <div class="col-4 " id="verde">

                            </div>
                        </div>
					</span>	
			<div class="p-t-31 p-b-9">
                        
						<span class="txt1">
							USUARIO
						</span>
					</div>
					<div class="wrap-input100 validate-input" >
                        <input type="text" class="form-control input100" minlength="8" name="usuario" placeholder="NOMBRE Y APELLIDO"  />
									
						</div>
					<div class="mt-2 mb-1 p-t-13 p-b-9">
						<span class="txt1">
							CORREO
						</span>

						
					</div>
					<div class="wrap-input100 validate-input" >	
                    <input type="email" email="true" class="form-control input100" placeholder="TU EMAIL" name="email"   >
					</div>
					<div class="mt-2 mb-1 p-t-13 p-b-9">
						<span class="txt1">
							DNI
						</span>	
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100 form-control" type="text" pattern="[0-9]{8}" placeholder="TU DNI" name="dni" placeholder="TU DNI" >
							
								</div>
					<?php if(isset($mensaje)):?>
					<span class="form_error ml-1" >
						<?php echo $mensaje ;?>
					</span>	

					<?php endif;?>
					
					
					<div class="mt-2 container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">
							REGISTRARME
						</button>
					</div>
					
					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Ya tienes una cuenta?
						</span>

						<a href="<?=base_url?>usuario/iniciarsesion" class="text-dark">
							INGRESAR
						</a>
					</div>
				</form>
			</div>
		</div>
	
    </div>

       

</div>
