<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
body {
  background-color: linen;
}

.css_absoluto {
  color: green;
  width: 100px;
  margin-left: 50px;
}
</style>

</head>
	<body>
		<h1> Historial de Riego </h1>
		
		<?php
			require_once('../back/claseBase.php');
			echo "<div><a href='index.php'> Nuevo historial de riego </a></div>";
			$claseBase = new claseBase();
			$listadoPlantas = $claseBase->getPlantas();
			foreach ($listadoPlantas as $planta) 
			{
				$id = $planta->getId();
				?>
				<div class = "">
					<?php
					
						echo "<span><b>Fe.Riego:</b></span> <span>".$planta->getFechaPlantacion()."</span>    <span><b>Planta:</b></span> <span>".$planta->getNombrePlanta()."</span>          <span ><b>Humedad:</b> ".$planta->getPorcentajeHumedad()."</span> <span class='css_absoluto'><a class='btn btn-primary' href=editar.php?id=$id>Editar</a>   <a class='btn btn-primary' href=borrarPlanta.php?id=$id>Borrar</a></span> ";
					?>
				</div>
				<?php
			}
				?>
	</body>
</html>
