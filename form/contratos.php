<?php 
require('../mail/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Cotizaciones</title>
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/contact-form.css" type="text/css">
	<!-- Hoja de estilos interna para imagen de fondo -->
	<style>
		body {
			background: url('/img/Otros/people-fondo.jpg') no-repeat center center fixed;
			background-size: cover;
			
		}
	</style>
</head>
<body>
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap">
							<div class="row">
								<div class="col-sm-12">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="item-title text-center">Cotiza aquí</h2>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<form name="contactform" action="registrarContrato.php" method="POST" data-toggle="validator" class="popup-form">
										<div class="row">
											<div id="msgContactSubmit" class="hidden"></div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="fname" id="fname" placeholder="Nombre completo*" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}" class="form-control" type="text" required data-error="Por favor ingresa tu nombre">
												<div class="input-group-icon"><i class="fa fa-user"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="email" id="email" placeholder="Correo electronico*" pattern=".*@\w{2,}\.\w{2,}" class="form-control" type="email" required data-error="Por favor ingresa un correo electrónico válido">
												<div class="input-group-icon"><i class="fa fa-envelope"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="phone" id="phone" placeholder="Teléfono*" class="form-control" type="text" pattern="^[0-9]\d{9}$" required data-error="Por favor ingresa un numero válido" minlength="10" maxlength="10">
												<div class="input-group-icon"><i class="fa fa-phone"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<select name="tipoEvento" id="tipoEvento" class="form-control" required data-error="Por favor ingresa el tipo de evento">
													<option value="">Tipo de evento</option>
													<option>XV</option>
													<option>Boda</option>
													<option>Bautizo</option>
													<option>Cumpleaños</option>
													<option>Otro...</option>
												</select>
												<div class="input-group-icon"><i class="fa fa-user"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="numeroBanquetes" id="numeroBanquetes" placeholder="Cntidad a ordenar*" class="form-control" type="number" value="1" required data-error="Por favor ingresa el numero de banquetes" min="1">
												<div class="input-group-icon"><i class="fa fa-user"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="fechaEvento" id="fechaEvento" placeholder="Fecha del evento*" class="form-control" type="date" required data-error="Por favor ingresa la fecha del evento">
												<div class="input-group-icon"><i class="fa fa-book"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<select name="banquete" id="banquete" class="form-control" required data-error="Tipo de comidas">
													<option value="">¿Qué comida quieres?</option>
													<?php
														$extraer_categorias = "SELECT categoria FROM categorias";
														$extraer_datos = mysqli_query($conn, $extraer_categorias);
														if (mysqli_num_rows($extraer_datos) > 0) {
															while ($fila = mysqli_fetch_array($extraer_datos)) {
																echo '<option>' . $fila["categoria"] . '</option>';
															}
														}
													?>
												</select>
												<div class="input-group-icon"><i class="fa fa-book"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="direccionEnvio" id="direccionEnvio" placeholder="Dirección para entrega*" class="form-control" type="text" required data-error="Por favor ingresa la direccion de entrega">
												<div class="input-group-icon"><i class="fa fa-user"></i></div>
											</div>
											<div class="form-group col-sm-12">
												<div class="help-block with-errors"></div>
												<textarea rows="3" name="message" id="message" placeholder="Escribe tu comentario aquí*" class="form-control" required data-error="Por favor ingresa un mensaje"></textarea>
												<div class="textarea input-group-icon"><i class="fa fa-pencil"></i></div>
											</div>
											<div class="form-group last col-sm-12">
												<button type="submit" id="submit" class="btn btn-custom"><i class="fa fa-envelope"></i> Enviar</button>
											</div>
											<span class="sub-text">*Oye, no te preocupes, tus datos están seguros con nosotros.</span>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<br>

	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap">
							<div class="row">
								<div class="col-sm-12">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="item-title text-center">¡Suscribete!</h2>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<form name="contactform" action="suscripcion.php" method="POST" data-toggle="validator" class="popup-form">
										<div class="row">
											<div id="msgContactSubmit" class="hidden"></div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="nombreSus" id="nombreSus" placeholder="Nombre completo*" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}" class="form-control" type="text" required data-error="Por favor ingresa tu nombre">
												<div class="input-group-icon"><i class="fa fa-user"></i></div>
											</div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="emailSus" id="emailSus" placeholder="Correo electronico*" pattern=".*@\w{2,}\.\w{2,}" class="form-control" type="email" required data-error="Por favor ingresa un correo electrónico válido">
												<div class="input-group-icon"><i class="fa fa-envelope"></i></div>
											</div>
											<div class="form-group last col-sm-12">
												<button type="submit" id="submit" class="btn btn-custom"><i class="fa fa-envelope"></i> Suscribirse</button>
											</div>
											<span class="sub-text">* Campos requeridos</span>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="colBottomMargin">
		<div class="colBottomMargin">&nbsp;</div>
	</div>

	<div id="footer" class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-top col-sm-12">
					<p class="text-center copyright">&copy; Proyecto SENA - Hecho en Colombia con ♥.</p>
				</div>
			</div>
		</div>
	</div>
	
	<a href="../index.php" class="scrollup"><i class="fa fa-arrow-circle-up"></i></a>
		
	<script src="js/jquery-3.2.1.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validator.min.js"></script>
</body>
</html>
