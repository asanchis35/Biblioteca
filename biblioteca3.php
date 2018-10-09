<html lang="es">
<head>
	<meta charset="utf-8">
	<title>FICHA</title>
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
			


function leer_libro()
{
	
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";

	
	$query = "select nombre from libro";
	
	
	$consulta = mysqli_query($db,$query);
	
	
	
	
	
	$i=0;
	global $name;
	
	
	while($resultados = mysqli_fetch_array($consulta)) { 
		
        
		$titulo = $resultados['nombre'];
		
						
		$name[$i]=$titulo;
		$i=$i+1;		
				
		
    } 
	
	
	$db= null;
}


function consul()
{
	$db=conectaDb();
	//print "<br> Conexion Realizada<br>";
	
		
	global $titulo;	
	$query = "SELECT nombre FROM libro WHERE nombre = ".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			//$idisbn = $resultados['isbn']; 
			$titulo = $resultados['nombre'];
			//echo $idpelicula;
			//echo $anyi;

		}	
	
	global $idisbn;
	global $anyi;
	
	$query = "SELECT fecha FROM libro WHERE nombre = ".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			//$idisbn = $resultados['isbn']; 
			$anyi = $resultados['fecha'];
			//echo $idpelicula;
			//echo $anyi;

		}
	global $ISBN2;	
	$query = "SELECT ISBN FROM libro WHERE nombre = ".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			//$idisbn = $resultados['isbn']; 
			$ISBN2 = $resultados['ISBN'];
			//echo $idpelicula;
			//echo $anyi;

		}	
	

	
	global $genero;
	$query = "select g.nombre, g.descripcion, l.ISBN from libro l, genero g where g.id=l.idgenero and l.nombre=".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";                                                     
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			//$idisbn = $resultados['ISBN']; 
			$genero3 = $resultados['nombre'];
			$genero2 = $resultados['descripcion'];
			$genero = $resultados['nombre']. " " .$resultados['descripcion'];
			

		}
		
	global $editorial;
	$query = "select ed.id, ed.editorial, l.ISBN from libro l, editorial ed where ed.id=l.ideditorial and l.nombre=".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			 
			$editorial = $resultados['editorial'];
			

		}
	global $encuadernacion;
	$query = "select e.id, e.modelo, l.ISBN from libro l, encuadernacion e where e.id=l.idencuadernacion and l.nombre=".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			 
			$encuadernacion = $resultados['modelo'];
			

		}	
	global $formato;
	$query = "select f.id, f.formato, l.ISBN from libro l, formato f where f.id=l.idformato and l.nombre=".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			 
			$formato = $resultados['formato'];
			

		}	
	
	global $coleccion;
	$query = "select c.id, c.coleccion, l.ISBN from libro l, coleccion c where c.id=l.idcoleccion and l.nombre=".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			 
			$coleccion = $resultados['coleccion'];
			

		}	
		
		
	global $ilustrador;
	
	$query = "select i.nombre, i.apellidos from ilustrador i, ilustrador_x_libro il, libro l where i.id=il.idilustrador and il.idisbn=l.ISBN and l.nombre=".'"'. $_POST["lista-libro"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			
			
			$nombre = $resultados['nombre']; 
			$apellidos = $resultados['apellidos'];
			
			$ilustrador = $resultados['nombre']. " " .$resultados['apellidos'];
			

		}	
		
		global $fot;
		
		$query = "SELECT caratula FROM libro WHERE nombre = ".'"'. $_POST["lista-libro"].'"';
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			//$idisbn = $resultados['ISBN']; 
			$fot = $resultados['caratula'];
			//echo "<img src=$fot><br>";
			//echo $fot;

		}	
		
		global $aut;
		
		$query = "select a.nombre, a.apellidos from libro l, autor_x_libro al, autor a where a.id=al.idautor and al.idisbn=l.ISBN and l.nombre=".'"'. $_POST["lista-libro"].'"';
		
		//echo "<br>";
		//echo $query;
	
		//Se envia la Query a la Base de datos
		$consulta = mysqli_query($db,$query);


		while($resultados = mysqli_fetch_array($consulta)) { 

			//$idpelicula = $resultados['p.id'];
			
			$nombre = $resultados['nombre']; 
			$apellidos = $resultados['apellidos'];
			
			$aut = $resultados['nombre']. " " .$resultados['apellidos'];
			
			//echo $act;

		}	
		
}


if (isset($_POST['consul'])) 
{
	consul();
} 


//leer_libro();




//------------------- CUERPO PRINCIPAL --------------------



leer_libro();






?>


	
  <div class="container-fluid">

		<div class="jumbotron container">
		<h1 class="display-4 text-center mb-5">CONSULTA</h1>
			<div class="row">
				

				<div class="col-3">
					<ul class="nav flex-column mb-5">
						<li class="nav-item">
							<a class="nav-link" href="/3besones/biblioteca.php">Registro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/3besones/biblioteca2.php">Libro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Consulta</a>
						</li>
						
					</ul>
				</div>
    

				<div class="col-9">

					<div class="row">

						<div class="col-6">

							<div class="form-group mb-1">	
								<label class="h5">TÍTULO: </label>
								<?php
									
									echo $titulo;
									
								?>
							</div>

							<div class="form-group mb-1">	
								<label class="h5">ISBN: </label>
								<?php
									
									echo $ISBN2;
									
								?>
							</div>

							<div class="form-group mb-1">								
								<label class="h5">AÑO: </label>
								<?php
									
									echo $anyi;
									
								?>
							</div>

							<div class="form-group mb-1">	
								<label class="h5">ENCUADERNACION: </label>
								<?php
									
									echo $encuadernacion;
									
								?>
							</div>

							<div class="form-group mb-1">
								<label class="h5">FORMATO: </label>
								<?php
									
									echo $formato;
									
								?>
							</div>

							<div class="form-group mb-1">	
								<label class="h5">GÉNERO: </label>
								<?php
									
									echo $genero;
									
								?>
							</div>

							<div class="form-group mb-1">	
								<label class="h5">AUTOR</label>
								<?php
									
									echo $aut;
									
								?>
							</div>

							<div class="form-group mb-1">	
								<label class="h5">ILUSTRADOR</label>
								<?php
									
									echo $ilustrador;
									
								?>
							</div>
		  
							<div class="form-group mb-1">	
								<label class="h5">EDITORIAL</label>
								<?php
									
									echo $editorial;
									
								?>
							</div>
		  
							<div class="form-group mb-1">	
								<label class="h5">COLECCIÓN</label>
								<?php
									
									echo $coleccion;
									
								?>
							</div>
          
        		</div><!-- /col-6 -->

        		<div class="col-6">
				
					
						<img class="img-responsive mb-5" src='<?php echo $fot ?>'>
					

		  				<form action="" method="post">
						
								<select id="lista-libro" name="lista-libro" size="5" multiple="multiple" class="form-control mb-5">
							
									<?php
										foreach ($name as $valor)
										{
											echo '<option value="'.$valor.'">';
											echo $valor;
											echo '</option>';
										}
										
									?>
				
								</select>

								<button name="consul" type="submit" value="Enviar Datos" class="btn btn-info btn-lg">Consulta</button>
							</form>

						</div><!-- /col-6 -->
					</div><!--/row -->
        </div><!-- /col-9 -->
      </div><!-- /row -->
       
			<footer class="footer">
				BIBLIOTECA 2018 ©
			</footer>

		</div><!-- jumbotron -->
   </div><!-- container -->
	</body>
</html>  