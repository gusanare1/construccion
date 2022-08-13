<html>


<body>
      <h1>Editar</h1>
	  <form action = 'editarPlanta.php' method="post">
		  <?php
			require_once('../back/claseBase.php');
			
			$id = $_GET["id"];
			echo "<div> ID: ".$id."</div>";
			$claseBase = new claseBase();
			$planta = $claseBase->getPlantaById($id);
			//echo "<input type='date' name='fechaPlantacion' value='".$planta->getFechaPlantacion()."'></input>";
			echo "<div>Humedad: <input type='numeric' name='porcentajeHumedad' value='".$planta->getPorcentajeHumedad()."'></input></div>";
			echo "<input type='hidden' name='id' value=$id/>";
			echo "<input type='submit' value='Editar'/>";
		  ?>
	  </form>
      
</body>
</html>
