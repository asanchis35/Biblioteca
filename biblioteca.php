<html lang="es">
<head>
	<meta charset="utf-8">
	<title>biblioteca</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

<?php




function conectaDb()
{
	
	$con = mysqli_connect("localhost","root",""); 
	
    if (!$con) 
    { 
		echo 'Could not connect: ' . mysqli_error(); 
		exit();
    } 
	
	
    mysqli_select_db($con,"biblioteca");
	
	
	return $con;
}
			


function escribir_editorial()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$editorial = '"'.$_POST["editorial"].'"';
	
	$direccion = '"'.$_POST["direccion"].'"';
	
	//$query = "INSERT INTO coleccion (coleccion, descripcion) VALUES($nombre,$apellidos)";
	$query = "INSERT INTO editorial (editorial, direccion) VALUES($editorial,$direccion)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}
function escribir_coleccion()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$coleccion = '"'.$_POST["coleccion"].'"';
	
	
	//$query = "INSERT INTO coleccion (coleccion, descripcion) VALUES($nombre,$apellidos)";
	$query = "INSERT INTO coleccion (coleccion) VALUES($coleccion)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}
function escribir_genero()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$nombre = '"'.$_POST["nombre2"].'"';
	
	$descripcion = '"'.$_POST["descripcion2"].'"';
	
	//$query = "INSERT INTO coleccion (coleccion, descripcion) VALUES($nombre,$apellidos)";
	$query = "INSERT INTO genero (nombre, descripcion) VALUES($nombre,$descripcion)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}
function escribir_formato()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$formato = '"'.$_POST["formato"].'"';
	
	
	
	//$query = "INSERT INTO coleccion (coleccion, descripcion) VALUES($nombre,$apellidos)";
	$query = "INSERT INTO formato (formato) VALUES($formato)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}
function escribir_encuadernacion()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$modelo = '"'.$_POST["modelo"].'"';
	
	
	
	//$query = "INSERT INTO coleccion (coleccion, descripcion) VALUES($nombre,$apellidos)";
	$query = "INSERT INTO encuadernacion (modelo) VALUES($modelo)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}
function escribir_autor()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$nombre = '"'.$_POST["nombre"].'"';
	
	$apellidos = '"'.$_POST["apellidos"].'"';
	
	$query = "INSERT INTO autor (nombre, apellidos) VALUES($nombre,$apellidos)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}
function escribir_ilustrador()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$nombre = '"'.$_POST["nombre1"].'"';
	
	$apellidos = '"'.$_POST["apellidos1"].'"';
	
	$query = "INSERT INTO ilustrador (nombre, apellidos) VALUES($nombre,$apellidos)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}
function escribir_tipologia()
{
	
	$db=conectaDb();
	print "<br> Conexion Realizada<br>";	
	
	$tipologia = '"'.$_POST["tipo"].'"';
	
	
	//$query = "INSERT INTO coleccion (coleccion, descripcion) VALUES($nombre,$apellidos)";
	$query = "INSERT INTO tipologia (tipo) VALUES($tipologia)";
	

	$consulta = mysqli_query($db,$query);
	
	
	$db=null;
}






//------------------- CUERPO PRINCIPAL --------------------

if (isset($_POST['escribir_registro'])) 
{
	escribir_editorial();
	escribir_coleccion();
	escribir_genero();
	escribir_formato();
	escribir_encuadernacion();
	escribir_autor();
	escribir_ilustrador();
	escribir_tipologia();
} 

//leer_datos();

//if (isset($_POST['borrar_registro'])) 
//{
	//borrar_registro();
//} 




?>


	
  <div class="container-fluid pt-5">

		<div class="jumbotron container">
		<h1 class="display-4 text-center mb-5">REGISTRO</h1>
			<div class="row">
				

				<div class="col-3">
					<ul class="nav flex-column mb-5">
						<li class="nav-item">
							<a class="nav-link" href="#">Registro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/3besones/biblioteca2.php">Libro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="/3besones/biblioteca3.php">Consulta</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="/3besones/ilustradores.php">ilustrador</a>
						</li>-->
					</ul>
				</div>

				<div class="col-9">

						<form action="" method="post" class="row">
							<div class="form-group col-4">
								<label><p><h2>editorial:</h2><p></label>
								<label>nombre:</label>
								<input class="form-control" type="text" name="editorial" value="">
								<label>direccion:</label>
								<input class="form-control" type="text" name="direccion" value="">
							</div>
							<div class="form-group mb-5 col-4">
								<label><p><h2>colección:</h2><p></label>
								<label>nombre:</label>
								<input class="form-control" type="text" name="coleccion" value="">
								<label>descripción:</label>
								<input class="form-control" type="text" name="descripcion" value="">
							</div>

							<div class="form-group mb-5 col-4">
								<label><p><h2>género:</h2><p></label>
								<label>nombre:</label>
								<input class="form-control" type="text" name="nombre2" value="">
								<label>descripción:</label>
								<input class="form-control" type="text" name="descripcion2" value="">
							</div>

							<div class="form-group mb-5 col-4">
								<label><p><h2>autor:</h2><p></label>
								<label>nombre:</label>
								<input class="form-control" type="text" name="nombre" value="">
								<label>apellidos:</label>
								<input class="form-control" type="text" name="apellidos" value="">
							</div>

							<div class="form-group mb-5 col-4">
								<label><p><h2>ilustrador:</h2><p></label>
								<label>nombre:</label>
								<input class="form-control" type="text" name="nombre1" value="">
								<label>apellidos:</label>
								<input class="form-control" type="text" name="apellidos1" value="">
							</div>

							<div class="form-group mb-5 col-4">
								<label><p><h2>formato:</h2><p></label>
								<label>formato:</label>
								<input class="form-control" type="text" name="formato" value="">
								
							</div>
							
							<div class="form-group mb-5 col-4">
								<label><p><h2>encuadernacion:</h2><p></label>
								<label>modelo:</label>
								<input class="form-control" type="text" name="modelo" value="">
								<!-- <label>descripcion:</label>
								<input class="form-control" type="text" name="descripcion" value="">-->
							</div>
							
							<div class="form-group mb-5 col-4">
								<label><p><h2>tipología:</h2><p></label>
								<label>tipo:</label>
								<input class="form-control" type="text" name="tipo" value="">
								
							</div>
															
							<div class="form-group mt-5 col-4 align-self-end">
								<button name="escribir_registro" type="submit" value="Enviar Datos" class="btn btn-success btn-lg mr-5 mt-2">Añadir</button>
								<button type="reset" class="btn btn-danger btn-lg mt-2">Reset</button>
							</div>
						</form>
					
				</div><!-- col-9 -->
			</div><!-- row -->

			<footer class="footer">
				BIBLIOTECA 2018 ©
			</footer>

		</div><!-- jumbotron -->
   </div><!-- container -->
	</body>
</html>  