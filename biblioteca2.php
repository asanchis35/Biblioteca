
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Libro</title>
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
			

function leer_autor()
{
	
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select apellidos,nombre from autor";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$i=0;
	global $nomap1;
	while($resultados = mysqli_fetch_array($consulta)) { 

		
		$apellidos = $resultados['apellidos']; 
		$nombre = $resultados['nombre'];
		$total = $resultados['nombre']. " " .$resultados['apellidos'];
		
		
		
		$nomap1[$i]=$total;
		$i=$i+1;
    } 
	
	
	$db= null;
}



function leer_ilustrador()
{
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select apellidos,nombre from ilustrador";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$ii=0;
	global $nomap2;
	
	while($resultados = mysqli_fetch_array($consulta)) { 

		
		$apellidos = $resultados['apellidos']; 
		$nombre = $resultados['nombre'];
		$total = $resultados['nombre']. " " .$resultados['apellidos'];
		
		
		
		$nomap2[$ii]=$total;
		$ii=$ii+1;
    } 
	
	
	$db= null;
}			

function leer_encuadernacion()
{
	
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select modelo from encuadernacion";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$i=0;
	global $nomap5;
	while($resultados = mysqli_fetch_array($consulta)) { 

		
		$modelo = $resultados['modelo']; 
		
		
		$nomap5[$i]=$modelo;
		$i=$i+1;
    } 
	
	
	$db= null;
}



function leer_coleccion()
{
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select coleccion from coleccion";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$ii=0;
	global $nomap3;
	while($resultados = mysqli_fetch_array($consulta)) { 

		
		$coleccion = $resultados['coleccion']; 
		
		
		$nomap3[$ii]=$coleccion;
		$ii=$ii+1;
    } 
	
	
	$db= null;
}

function leer_editorial()
{
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select editorial from editorial";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$ii=0;
	global $nomap4;
	while($resultados = mysqli_fetch_array($consulta)) { 

		
		$editorial = $resultados['editorial']; 
		
		
		$nomap4[$ii]=$editorial;
		$ii=$ii+1;
    } 
	
	
	$db= null;
}			

function leer_genero()
{
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select nombre, descripcion from genero";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$ii=0;
	global $nomap7;
	while($resultados = mysqli_fetch_array($consulta)) { 

		$nombre = $resultados['nombre']; 
		$descripcion = $resultados['descripcion'];
		
		$total = $resultados['nombre']. " " .$resultados['descripcion'];
		
		
		$nomap7[$ii]=$total;
		$ii=$ii+1;
    } 
	
	
	$db= null;
}			

function leer_formato()
{
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select formato from formato";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$ii=0;
	global $nomap6;
	while($resultados = mysqli_fetch_array($consulta)) { 

		
		$formato = $resultados['formato']; 
		
		
		$nomap6[$ii]=$formato;
		$ii=$ii+1;
    } 
	
	
	$db= null;
}

function leer_tipologia()
{
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select tipo from tipologia";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	$ii=0;
	global $nomap8;
	while($resultados = mysqli_fetch_array($consulta)) { 

		
		$tipologia = $resultados['tipo']; 
		
		
		$nomap8[$ii]=$tipologia;
		$ii=$ii+1;
    } 
	
	
	$db= null;
}												




function escribir_libro()
{
		global $idautor;
		global $idilustrador;
		global $idisbn;
		global $ideditorial;
		global $idgenero;
		global $idcoleccion;
		global $idformato;
		global $idencuadernacion;
		global $idtipologia;
		
		
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";	
	
	
	
	$titulo = '"'.$_POST["nombre"].'"';
	$isbn= '"'.$_POST["ISBN"].'"';
	$fecha = '"'.$_POST["anyo"].'"';
	$deposito_legal = '"'.$_POST["deposito_legal"].'"';
	$caratula = '"'.$_POST["foto"].'"';
	$unidades = '"'.$_POST["unidades"].'"';
	$num_impresion = '"'.$_POST["num_impresion"].'"';
	$edicion = '"'.$_POST["edicion"].'"';
	$idioma = '"'.$_POST["idioma"].'"';
	
	
	
	
	$query = "SELECT ID FROM genero WHERE concat (nombre,' ',descripcion) = ". '"'. $_POST["lista-genero"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idgenero = $resultados['ID']; 
			//echo $idgenero;

		}
	$query = "SELECT ID FROM encuadernacion WHERE modelo = ". '"'. $_POST["lista-encuadernacion"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idencuadernacion = $resultados['ID']; 
			//echo $idgenero;

		} 
	$query = "SELECT ID FROM tipologia WHERE tipo = ". '"'. $_POST["lista-tipologia"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idtipologia = $resultados['ID']; 
			//echo $idgenero;

		} 
	$query = "SELECT ID FROM formato WHERE formato = ". '"'. $_POST["lista-formato"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idformato = $resultados['ID']; 
			

		} 
	$query = "SELECT ID FROM editorial WHERE editorial = ". '"'. $_POST["lista-editorial"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$ideditorial = $resultados['ID']; 
			

		} 
	$query = "SELECT ID FROM coleccion WHERE coleccion = ". '"'. $_POST["lista-coleccion"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idcoleccion = $resultados['ID']; 
			//echo $idgenero;

		} 
	
	
	$query = "INSERT INTO libro (nombre, fecha, deposito_legal, caratula, unidades, num_impresion, edicion, idioma, ISBN, idencuadernacion, ideditorial, idtipologia, idcoleccion, idgenero, idformato) VALUES($titulo, $fecha, $deposito_legal, $caratula, $unidades, $num_impresion, $edicion, $idioma,  $isbn, $idencuadernacion, $ideditorial, $idtipologia, $idcoleccion, $idgenero, $idformato)";
	

	$consulta = mysqli_query($db,$query);
	
	
	
	$query = "SELECT ISBN FROM libro WHERE nombre= ". '"'. $_POST["nombre"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idisbn = $resultados['ISBN']; 
			

		} 
	
	$query = "SELECT ID FROM autor WHERE concat (nombre,' ',apellidos) = ". '"'. $_POST["lista-autor"].'"';
	
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idautor = $resultados['ID']; 
			//echo $idsoporte;

		} 
	
		
	
	$query = "INSERT INTO autor_x_libro( idautor, idisbn) VALUES ($idautor, $idisbn)";
	
	$consulta = mysqli_query($db,$query);
	
		
	
	$query = "SELECT ID FROM ilustrador WHERE concat (nombre,' ',apellidos) = ". '"'. $_POST["lista-ilustrador"].'"';
	
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idilustrador = $resultados['ID']; 
			//echo $idsoporte;

		} 
	
		
	
	$query = "INSERT INTO ilustrador_x_libro( idilustrador, idisbn) VALUES ($idilustrador, $idisbn)";
	
	$consulta = mysqli_query($db,$query);
	
	$db=null;
}

	
	


//------------------- CUERPO PRINCIPAL --------------------


if (isset($_POST['escribir_libro']))
{
		
					
		$db=conectaDb();
				

		$query = "SELECT ID FROM autor WHERE concat (nombre,' ',apellidos) = ". '"'. $_POST["lista-autor"].'"';
		//echo "<br>";
		echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			$idautor = $resultados['ID']; 
			echo $idautor;

		} 
	
	
		$query = "SELECT ID FROM ilustrador WHERE concat (nombre,' ',apellidos) = ". '"'. $_POST["lista-ilustrador"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			$idilustrador = $resultados['ID']; 
			//echo $idilustrador;

		}
		
		$query = "SELECT ID FROM editorial WHERE editorial= ". '"'. $_POST["lista-editorial"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$ideditorial = $resultados['ID']; 
			

		} 
		
		$query = "SELECT ID FROM genero WHERE nombre= ". '"'. $_POST["lista-genero"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idgenero = $resultados['ID']; 
			

		} 

					
		
		$query = "SELECT ID FROM formato WHERE formato= ". '"'. $_POST["lista-formato"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idformato = $resultados['ID']; 
			
		}
		
		$query = "SELECT ID FROM tipologia WHERE tipo= ". '"'. $_POST["lista-tipologia"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idtipologia = $resultados['ID']; 
			
		}
		
		$query = "SELECT ID FROM encuadernacion WHERE modelo= ". '"'. $_POST["lista-encuadernacion"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idencuadernacion = $resultados['ID']; 
			
		
		}
		
		$query = "SELECT ID FROM coleccion WHERE coleccion= ". '"'. $_POST["lista-coleccion"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);
		
		while($resultados = mysqli_fetch_array($consulta)) { 

			$idcoleccion = $resultados['ID']; 
			
				

		} 
			
	escribir_libro();
		
	//desconexion de la base de datos
	$db= null;		
	
}

leer_autor();
leer_ilustrador();
leer_encuadernacion();
leer_coleccion();
leer_editorial();
leer_genero();
leer_formato();
leer_tipologia();
 

?>


	
  <div class="container-fluid">

		<div class="jumbotron container">
		<h1 class="display-4 text-center mb-5">LIBRO</h1>
			<div class="row">
				

				<div class="col-3">
					<ul class="nav flex-column mb-5">
						<li class="nav-item">
							<a class="nav-link" href="/3besones/biblioteca.php">Registro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Libro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="/3besones/biblioteca3.php">Consulta</a>
						</li>
						
					</ul>
				</div>

				<div class="col-9">

					<form action="" method="post" class="row">
						
						<div class="form-group col-4">
							<label class="h3">Título:</label>
							<input class="form-control" type="text" name="nombre" value="">
						</div>

						<div class="form-group mb-5 col-4">
							<label class="h3">ISBN:</label>
							<input class="form-control" type="text" name="ISBN" value="">
						</div>

						<div class="form-group mb-5 col-4">
							<label class="h3">Año:</label>
							<input class="form-control" type="text" name="anyo" value="">							
						</div>

						<div class="form-group col-4">							
							<label class="h3">Depósito legal:</label>
							<input class="form-control" type="text" name="deposito_legal" value="">							
						</div>
					
						<div class="form-group mb-5 col-4">							
							<label class="h3">Carátula:</label>
							<div class="form-group">
								<input class="form-control-file" type="file" name='foto' value=''>
							</div>													
						</div>

						<div class="form-group mb-5 col-4">							
							<label class="h3">Unidades:</label>
							<input class="form-control" type="text" name="unidades" value="">							
						</div>
					
						<div class="form-group mb-5 col-4">							
							<label class="h3">Número de impresión:</label>
							<input class="form-control" type="text" name="num_impresion" value="">							
						</div>

						<div class="form-group mb-5 col-4">							
							<label class="h3">Edición:</label>
							<input class="form-control" type="text" name="edicion" value="">							
						</div>

						<div class="form-group mb-5 col-4">							
							<label class="h3">Idioma:</label>
							<input class="form-control" type="text" name="idioma" value="">							
						</div>
							
					
						<div class="form-group mb-5 col-6">	
							<label class="h4">Autor:</label>
							<select id="lista-autor" name="lista-autor" size="5" multiple="multiple" class="form-control">
										
								<?php
									foreach ($nomap1 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
									
								?>
							
							</select>
						</div>

						<div class="form-group mb-5 col-6">	
							<label class="h4">Ilustrador:</label>		
							<select id="lista-ilustrador" name="lista-ilustrador" size="5" multiple="multiple" class="form-control">

								<?php
									foreach ($nomap2 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
								?>

							</select>
						</div>

						<div class="form-group mb-5 col-6">	
						<label class="h4">Colección:</label>
							<select id="lista-coleccion" name="lista-coleccion" size="5" multiple="multiple" class="form-control">

								<?php
									foreach ($nomap3 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
								?>
							</select>
						</div>

						<div class="form-group mb-5 col-6">	
							<label class="h4">Editorial:</label>
							<select id="lista-editorial" name="lista-editorial" size="5" multiple="multiple" class="form-control">

								<?php
									foreach ($nomap4 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
								?>

							</select>
						</div>
						
						<div class="form-group mb-5 col-6">	
						<label class="h4">Encuadernación:</label>
							<select id="lista-encuadernacion" name="lista-encuadernacion" size="5" multiple="multiple" class="form-control">

								<?php
									foreach ($nomap5 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
								?>

							</select>
						</div>

						<div class="form-group mb-5 col-6">	
							<label class="h4">Formato:</label>
							<select id="lista-formato" name="lista-formato" size="5" multiple="multiple" class="form-control">

								<?php
									foreach ($nomap6 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
								?>

							</select>
						</div>

						<div class="form-group mb-5 col-6">	
							<label class="h4">Género:</label>
							<select id="lista-genero" name="lista-genero" size="5" multiple="multiple" class="form-control">

								<?php
									foreach ($nomap7 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
								?>

							</select>
						</div>

						<div class="form-group mb-5 col-6">	
							<label class="h4">Tipología:</label>
							<select id="lista-tipologia" name="lista-tipologia" size="5" multiple="multiple" class="form-control">

								<?php
									foreach ($nomap8 as $valor)
									{
										echo '<option value="'.$valor.'">';
										echo $valor;
										echo '</option>';
									}
								?>

							</select>
						</div>

						<div class="form-group col-6 ml-auto">
							<button name="escribir_libro" type="submit" value="Enviar Datos" class="btn btn-success btn-lg mr-5 mt-2">Registrar</button>
							<button type="reset" class="btn btn-danger btn-lg mt-2">Reset</button>
						</div>
						
					</form>

				</div><!-- /col-9 -->
			
			</div><!--/row -->

			<footer class="footer">
				BIBLIOTECA 2018 ©
			</footer>

		</div><!-- jumbotron -->
   </div><!-- container -->
	</body>
</html>  
